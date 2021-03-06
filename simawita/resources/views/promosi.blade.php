@extends ('layouts.master')

@section('title', 'Promosi')

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
      <h4>
        <li><a href="#"><i class="fa fa-line-chart"></i> </a></li>
      </h4>
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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wisata as $w)
                            <tr>
                                <td>{{ $w->nama_wisata }}</td>
                                <td>{{ $w->rating_wisata }}</td>
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
        </section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')