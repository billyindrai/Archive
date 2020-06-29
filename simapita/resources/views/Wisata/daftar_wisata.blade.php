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
        Daftar Tempat Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>

    <div class="container">
      <div class="card mt-5">
        <div class="card-body">
          <a href="/daftar_wisata/tambah" class="btn btn-primary">Input Objek Wisata Baru</a>
          <br/>
          <br/>
          <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
              <th >Gambar Wisata</th>
              <th>Nama Wisata</th>
              <th>Harga Wisata</th>
              <th>Rating Wisata</th>      
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($wisata as $w)
            <tr>
              <td><img src="<?=$w->gambar_wisata?>" width=300px height=200px obejct-fit=cover></td>
              <td><a href="/daftar_wisata/{{$w->nama_wisata}}">{{$w->nama_wisata}}</a></td>
              <td>{{ $w->harga_wisata }}</td>
              <td>{{ $w->rating_wisata }} <span class="fa fa-star"></span> </td>
              <td>
                <a href="/daftar_wisata/edit/{{ $w->id_wisata }}" class="btn btn-warning">Edit</a>
                <a href="/daftar_wisata/hapus/{{ $w->id_wisata }}" class="btn btn-danger">Hapus</a>
              </td>
		        </tr>
            @endforeach
            </tbody>
	        </table>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
@section('aside')
