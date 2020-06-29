@extends ('layouts.master')

@section('title', 'Promosi')

@section('header')

@section('slidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promosi Objek Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                   
                </div>
                <div class="card-body">
                    <a href="/promosi/export_excel" class="btn btn-primary">Download File</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Rating</th>
                                <th>Jumlah Pengunjung</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promosi as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->rating }}</td>
                                <td>{{ $p->jumlah_pengunjung }}</td>
                                <td>{{ $p->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')