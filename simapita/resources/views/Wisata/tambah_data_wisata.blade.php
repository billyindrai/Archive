
@extends ('layouts.master')

@section('title', 'Daftar Wisata')

@section('header')

@section('slidebar')

@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<br> 
      <h3>
	  <center>
        Tambah Objek Wisata
      </center>
	  </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">	
	<form action="/daftar_wisata/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="card-body">
                    <table id="tabels">
			            <thead>
            				<tr>
              					
              					<th>Nama Wisata</th>
             					<th>Harga Tiket</th>
              					<th>Rating Wisata</th>      
              					<th>Jumlah Pengunjung</th>
								<th>Upload</th>
            				</tr>
            			</thead>
	
						<tbody>
            				<tr>
							
								<td><input type="varchar", name="nama_wisata" placeholder="Masukan Nama" maxlength="30"></td>
								<td><input type="integer" name="harga_wisata" placeholder="Masukan Harga Tiket " maxlength="6"></td>
								<td><input type="doubel" name="rating_wisata" placeholder="Masukan Rating" maxlength="3"></td>
								<td><input type="integer" name="jumlah_pengunjung "placeholder="Masukan Jumlah pengunjung" maxlength="5"></td>
								<td><input type="file" name="gambar_wisata" ></td>
							</tr>
						</tbody>
					</table>
					<button class=" button button2"   type="submit" name="submit" > Tambah 
					</button>
		</div>
	</form>

	</section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')