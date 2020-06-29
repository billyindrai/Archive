@extends ('layouts.master')

@section('title', 'promosi')

@section('header')

@section('slidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br> 
      <center>
      <h3> 
        Promosi Objek Wisata
      </h3>
      </center>
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
                    <table id="tabels">
                    <thead >
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
                                <td><form action="/action_page.php">
    
                                    <select class="form-control" id="sel5" name="sellist5">
                                        <option>Belum Diproses</option>
                                        <option>Sedang Diproses</option>
                                        <option>Promosi Selesai</option>
                                    </select>
                                        <br>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
        <br>
        <a href="/promosi/export_excel"  class="btn btn-primary pull-right" style="width:15%"><i class="fa fa-download"></i> Download File</a>
        </section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')