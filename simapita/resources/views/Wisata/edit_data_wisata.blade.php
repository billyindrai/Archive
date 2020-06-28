@extends ('layouts.master')

@section('title', 'Daftar Wisata')

@section('header')

@section('slidebar')

@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Objek Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
	@foreach($wisata as $w)
	<section class="content">
	<form action="/daftar_wisata/update" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $w->id_wisata}}">
		<table style="margin:20px auto;">		
			<tr>
				<td>Nama Wisata</td>
				<td><input type="varchar", name="nama_wisata" required="required" value="{{ $w->nama_wisata }}" size="30" maxlength="30"></td>
            </tr>
            <tr>
				<td>Harga Wisata</td>
				<td><input type="integer" name="harga_wisata" required="required" value="{{ $w->harga_wisata }}" size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Rating Wisata</td>
				<td><input type="doubel" name="rating_wisata" required="required" value="{{ $w->rating_wisata }}" size="3" maxlength="3"></td>
			</tr>
			<tr>
				<td>Jumlah Pengunjung</td>
				<td><input type="integer" name="jumlah_pengunjung" required="required" value="{{ $w->jumlah_pengunjung }}" size="5" maxlength="5"></td>
			</tr>
				<td>Gambar Wisata</td>
                <td><input type="file" name="gambar_wisata" required="required" value="{{ $w->gambar_wisata }}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Edit Data"></td>
			</tr>
		</table>
	</form>
	@endforeach
	</section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')