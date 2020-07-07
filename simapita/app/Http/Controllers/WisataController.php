<?php

namespace App\Http\Controllers;

use App\Exports\WisataExcel;
use App\Wisata;
use App\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class WisataController extends Controller
{
	public function export_excel()
	{
		return Excel::download(new WisataExcel, 'Daftar_wisata.xlsx');
	}

	public function dashboard(){
		$avg_pendapatan = DB::table('pendapatan')->avg('hasil_pendapatan');
		$avg_pengunjung = DB::table('pendapatan')->avg('hasil_pengunjung');
		$count_wisata =  DB::table('wisata')->count('id_wisata');

		$pendapatan = DB::table('pendapatan')->get();
        // $bulan = [];
        // $hasil_pendapatan = [];
        // $hasil_pengunjung = [];
        foreach($pendapatan as $p){
			$bulan[] =  date('F', strtotime($p->bulan));
			$hasil_pendapatan[] = DB::table('pendapatan')->where('bulan','=',$p->bulan)->avg('hasil_pendapatan');
			$hasil_pengunjung[] = DB::table('pendapatan')->where('bulan','=',$p->bulan)->avg('hasil_pengunjung');
            // $hasil_pendapatan[] = $p->hasil_pendapatan;
            // $hasil_pengunjung[] = $p->hasil_pengunjung;
		}

		// return view('dashboard',['pendapatan' => $pendapatan, 'bulan' => $bulan, 'hasil_pendapatan' => $hasil_pendapatan, 
		// 'hasil_pengunjung' => $hasil_pengunjung, 'avg_pendapatan' => $avg_pendapatan, 
		// 'avg_pengunjung' => $avg_pengunjung, 'count_wisata' => $count_wisata ]);
		dd($hasil_pendapatan);
	}

    public function cari(Request $request)
	{
		$cari = $request->cari;
		$wisata = DB::table('wisata')->where('nama_wisata','like',"%".$cari."%")->paginate();
		return view('wisata.tampilanwisata',['wisata' => $wisata]);
 
	}

    public function tambah()
    {
		return view('wisata.tambah_data_wisata');
    }
    
    public function store(Request $request){
		if ($request->hasFile('gambar_wisata')){

			$file = $request->file('gambar_wisata');
			$nama_file = $file->getClientOriginalName();
			$file->move('images',$nama_file);
			
			DB::table('wisata')->insert([
				'nama_wisata' => $request->nama_wisata,
				'harga_wisata' => $request->harga_wisata,
				'rating_wisata' => $request->rating_wisata,
				'jumlah_pengunjung' => $request->jumlah_pengunjung,
				'gambar_wisata' => '/images/'.$file->getClientOriginalName(),
			]);
		}
		return redirect('/daftar_wisata');
    }
    
    public function update(Request $request){
		if ($request->hasFile('gambar_wisata')){

			$file = $request->file('gambar_wisata');
			$nama_file = $file->getClientOriginalName();
			$file->move('images',$nama_file);
			
			DB::table('wisata')->where('id_wisata',$request->id)->update([
				'nama_wisata' => $request->nama_wisata,
				'harga_wisata' => $request->harga_wisata,
				'rating_wisata' => $request->rating_wisata,
				'jumlah_pengunjung' => $request->jumlah_pengunjung,
				'gambar_wisata' => '/images/'.$file->getClientOriginalName(),
			]);
		}

		return redirect('/daftar_wisata');
    }

    public function edit($id){
	    $wisata = DB::table('wisata')->where('id_wisata',$id)->get();
	    return view('wisata.edit_data_wisata',['wisata' => $wisata]);
    }

    public function hapus($id){
	    DB::table('wisata')->where('id_wisata',$id)->delete();
	    return redirect('/daftar_wisata');
    }

    public function tampilan_data(Request $request)
    {
		$cari = $request->cari;
		$wisata = DB::table('wisata')->where('nama_wisata','like',"%".$cari."%")->paginate();
    	return view('wisata.daftar_wisata',['wisata' => $wisata]);
	}
	
    
    public function wisata($nama)
    {
		$wisata = DB::table('wisata')->where('nama_wisata',$nama)->get();

		
		
        foreach($wisata as $w){
			$pendapatan = DB::table('pendapatan')->where('id_wisata','=',$w->id_wisata)->get();
			$avg_pendapatan = DB::table('pendapatan')->where('id_wisata','=',$w->id_wisata)->avg('hasil_pendapatan');
			$avg_pengunjung = DB::table('pendapatan')->where('id_wisata','=',$w->id_wisata)->avg('hasil_pengunjung');
		}
		
        $bulan = [];
        $hasil_pendapatan = [];
        $hasil_pengunjung = [];
        foreach($pendapatan as $p){
            $bulan[] =  date('F', strtotime($p->bulan));
            $hasil_pendapatan[] = $p->hasil_pendapatan;
            $hasil_pengunjung[] = $p->hasil_pengunjung;
        }
		return view('wisata.wisata',['wisata' => $wisata, 'pendapatan' => $pendapatan, 'bulan' => $bulan,  'hasil_pendapatan' => $hasil_pendapatan, 'hasil_pengunjung' => $hasil_pengunjung,
		'avg_pendapatan' => $avg_pendapatan, 'avg_pengunjung' => $avg_pengunjung]);        
	}
}
