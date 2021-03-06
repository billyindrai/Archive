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
		$avg_tiket = DB::table('pendapatan')->avg('tiket');
		$count_wisata =  DB::table('wisata')->count('id_wisata');

		$pendapatan = DB::table('pendapatan')->get();
        
		$nama_bulan[]='Januari';
		$nama_bulan[]='Februari';
		$nama_bulan[]='Maret';
		$nama_bulan[]='April';
		$hasil_pendapatan = [];
		$jumlah = [];
		$hasil_pendapatan['Januari'] = 0;
		$hasil_pendapatan['Februari'] = 0;
		$hasil_pendapatan['Maret'] = 0;
		$hasil_pendapatan['April'] = 0;
		$hasil_pengunjung['Januari'] = 0;
		$hasil_pengunjung['Februari'] = 0;
		$hasil_pengunjung['Maret'] = 0;
		$hasil_pengunjung['April'] = 0;
		$tiket['Januari'] = 0;
		$tiket['Februari'] = 0;
		$tiket['Maret'] = 0;
		$tiket['April'] = 0;
		$jumlah['Januari'] = DB::table('pendapatan')->where('bulan', '=',"2020-01-01")->count();
		$jumlah['Februari'] = DB::table('pendapatan')->where('bulan', '=','2020-02-01')->count();
		$jumlah['Maret'] = DB::table('pendapatan')->where('bulan', '=','2020-03-01')->count();
		$jumlah['April'] = DB::table('pendapatan')->where('bulan', '=','2020-04-01')->count();
		

        	foreach($pendapatan as $p){
				if($p->bulan >= '2020-01-01' && $p->bulan <= '2020-01-31') {
					$hasil_pendapatan['Januari'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Januari'] += $p->hasil_pengunjung;
					$tiket['Januari'] += $p->tiket;

				}
				if($p->bulan >= '2020-02-01' && $p->bulan <= '2020-02-31') {
					$hasil_pendapatan['Februari'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Februari'] += $p->hasil_pengunjung;
					$tiket['Februari'] += $p->tiket;
				}
				if($p->bulan >= '2020-03-01' && $p->bulan <= '2020-03-31') {
					$hasil_pendapatan['Maret'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Maret'] += $p->hasil_pengunjung;
					$tiket['Maret'] += $p->tiket;
				}
				if($p->bulan >= '2020-04-01' && $p->bulan <= '2020-04-31') {
					$hasil_pendapatan['April'] += $p->hasil_pendapatan;
					$hasil_pengunjung['April'] += $p->hasil_pengunjung;
					$tiket['April'] += $p->tiket;
				}
			}

		$rata_pendapatan[] = $hasil_pendapatan['Januari'] / $jumlah['Januari'];
		$rata_pendapatan[] = $hasil_pendapatan['Februari'] / $jumlah['Februari'];
		$rata_pendapatan[] = $hasil_pendapatan['Maret'] / $jumlah['Maret'];
		$rata_pendapatan[] = $hasil_pendapatan['April'] / $jumlah['April'];
		$rata_pengunjung[] = $hasil_pengunjung['Januari'] / $jumlah['Januari'];
		$rata_pengunjung[] = $hasil_pengunjung['Februari'] / $jumlah['Februari'];
		$rata_pengunjung[] = $hasil_pengunjung['Maret'] / $jumlah['Maret'];
		$rata_pengunjung[] = $hasil_pengunjung['April'] / $jumlah['April'];
		$rata_tiket[] = $tiket['Januari'] / $jumlah['Januari'];
		$rata_tiket[] = $tiket['Februari'] / $jumlah['Februari'];
		$rata_tiket[] = $tiket['Maret'] / $jumlah['Maret'];
		$rata_tiket[] = $tiket['April'] / $jumlah['April'];

		return view('dashboard',['pendapatan' => $pendapatan, 'hasil_pendapatan' => $hasil_pendapatan, 
		'hasil_pengunjung' => $hasil_pengunjung, 'tiket' => $tiket, 'avg_pendapatan' => $avg_pendapatan, 'avg_tiket' => $avg_tiket,
		'avg_pengunjung' => $avg_pengunjung, 'count_wisata' => $count_wisata, 'rata_pendapatan' => $rata_pendapatan, 'rata_pengunjung' => $rata_pengunjung, 'rata_tiket' => $rata_tiket,
		'nama_bulan' => $nama_bulan]);

		// dd($nama_bulan);
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
            $avg_tiket = DB::table('pendapatan')->where('id_wisata','=',$w->id_wisata)->avg('tiket');
        }

        $bulan = [];
        $hasil_pendapatan = [];
        $hasil_pengunjung = [];
        $tiket = [];
        foreach($pendapatan as $p){
            $bulan[] =  date('F', strtotime($p->bulan));
            $hasil_pendapatan[] = $p->hasil_pendapatan;
            $hasil_pengunjung[] = $p->hasil_pengunjung;
            $tiket[] = $p->tiket;
        }
        return view('wisata.wisata',['wisata' => $wisata, 'pendapatan' => $pendapatan, 'bulan' => $bulan,  'hasil_pendapatan' => $hasil_pendapatan, 'hasil_pengunjung' => $hasil_pengunjung, 'tiket' => $tiket,
        'avg_pendapatan' => $avg_pendapatan, 'avg_pengunjung' => $avg_pengunjung, 'avg_tiket' => $avg_tiket]);
    }
}
