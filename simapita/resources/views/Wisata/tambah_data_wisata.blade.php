
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
        Tambah Objek Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">	
	<form action="/daftar_wisata/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<table style="margin:20px auto;">
			<tr>
				<td>Nama Wisata</td>
				<td><input type="varchar", name="nama_wisata" size="30" maxlength="30"></td>
            </tr>
            <tr>
				<td>Harga Wisata</td>
				<td><input type="integer" name="harga_wisata"size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Rating Wisata</td>
				<td><input type="doubel" name="rating_wisata" size="3" maxlength="3"></td>
			</tr>
			<tr>
				<td>Jumlah Pengunjung</td>
				<td><input type="integer" name="jumlah_pengunjung" size="5" maxlength="5"></td>
			</tr>
				<td>Gambar Wisata</td>
                <td><input type="file" name="gambar_wisata" ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Tambah Data"></td>
			</tr>
		</table>
	</form>

	</section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')