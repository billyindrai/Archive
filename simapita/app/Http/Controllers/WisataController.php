<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
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
}
