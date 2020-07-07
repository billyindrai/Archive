<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pendapatan;

class WisataController extends Controller
{
	public function dashboard(){
		$avg_pendapatan = DB::table('pendapatan')->avg('hasil_pendapatan');
		$avg_pengunjung = DB::table('pendapatan')->avg('hasil_pengunjung');
		$count_wisata =  DB::table('wisata')->count('id_wisata');

		$pendapatan = DB::table('pendapatan')->get();
        
		$nama_bulan[1]='Januari';
		$nama_bulan[2]='Februari';
		$nama_bulan[3]='Maret';
		$nama_bulan[4]='April';
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
		$jumlah['Januari'] = DB::table('pendapatan')->where('bulan', '=',"2020-01-01")->count();
		$jumlah['Februari'] = DB::table('pendapatan')->where('bulan', '=','2020-02-01')->count();
		$jumlah['Maret'] = DB::table('pendapatan')->where('bulan', '=','2020-03-01')->count();
		$jumlah['April'] = DB::table('pendapatan')->where('bulan', '=','2020-04-01')->count();
		

        	foreach($pendapatan as $p){
				if($p->bulan >= '2020-01-01' && $p->bulan <= '2020-01-31') {
					$hasil_pendapatan['Januari'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Januari'] += $p->hasil_pengunjung;

				}
				if($p->bulan >= '2020-02-01' && $p->bulan <= '2020-02-31') {
					$hasil_pendapatan['Februari'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Februari'] += $p->hasil_pengunjung;
				}
				if($p->bulan >= '2020-03-01' && $p->bulan <= '2020-03-31') {
					$hasil_pendapatan['Maret'] += $p->hasil_pendapatan;
					$hasil_pengunjung['Maret'] += $p->hasil_pengunjung;
				}
				if($p->bulan >= '2020-04-01' && $p->bulan <= '2020-04-31') {
					$hasil_pendapatan['April'] += $p->hasil_pendapatan;
					$hasil_pengunjung['April'] += $p->hasil_pengunjung;
				}
			}

		$rata_pendapatan['Januari'] = $hasil_pendapatan['Januari'] / $jumlah['Januari'];
		$rata_pendapatan['Februari'] = $hasil_pendapatan['Februari'] / $jumlah['Februari'];
		$rata_pendapatan['Maret'] = $hasil_pendapatan['Maret'] / $jumlah['Maret'];
		$rata_pendapatan['April'] = $hasil_pendapatan['April'] / $jumlah['April'];
		$rata_pengunjung['Januari'] = $hasil_pengunjung['Januari'] / $jumlah['Januari'];
		$rata_pengunjung['Februari'] = $hasil_pengunjung['Februari'] / $jumlah['Februari'];
		$rata_pengunjung['Maret'] = $hasil_pengunjung['Maret'] / $jumlah['Maret'];
		$rata_pengunjung['April'] = $hasil_pengunjung['April'] / $jumlah['April'];

		return view('dashboard',['pendapatan' => $pendapatan, 'hasil_pendapatan' => $hasil_pendapatan, 
		'hasil_pengunjung' => $hasil_pengunjung, 'avg_pendapatan' => $avg_pendapatan, 
		'avg_pengunjung' => $avg_pengunjung, 'count_wisata' => $count_wisata, 'rata_pendapatan' => $rata_pendapatan, 'rata_pengunjung' => $rata_pengunjung,
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
		
        // $bulan = [];
        // $hasil_pendapatan = [];
        // $hasil_pengunjung = [];
        foreach($pendapatan as $p){
            $bulan[] =  date('F', strtotime($p->bulan));
            $hasil_pendapatan[] = $p->hasil_pendapatan;
            $hasil_pengunjung[] = $p->hasil_pengunjung;
        }
		return view('wisata.wisata',['wisata' => $wisata, 'pendapatan' => $pendapatan, 'bulan' => $bulan,  'hasil_pendapatan' => $hasil_pendapatan, 'hasil_pengunjung' => $hasil_pengunjung,
		'avg_pendapatan' => $avg_pendapatan, 'avg_pengunjung' => $avg_pengunjung]);        
	}
}
