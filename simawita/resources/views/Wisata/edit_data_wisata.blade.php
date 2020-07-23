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
        Edit Data Tempat Wisata
      </center>
	  </h3>
	  @foreach($wisata as $w)
      <ol class="breadcrumb">
      <h4>
        <li><a href="/daftar_wisata"><i class="fa fa-home"></i> </a> <  <a href="#"> {{$w->nama_wisata}} </a></li>
        </h4>
      </ol>
    </section>
	
	<section class="content">
	<form action="/daftar_wisata/update" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $w->id_wisata}}">
		<div class="card-body"> 
                    <table id="tabels">
			            <thead> 
            				<tr>
              					<th>Nama Wisata</th>
             					<th>Harga Tiket</th>
              					<th>Rating Wisata</th>     
								<th>Upload</th>
            				</tr>
            			</thead>
	
						<tbody>
            				<tr>
							
								
				<td><input type="varchar", name="nama_wisata" required="required" value="{{ $w->nama_wisata }}" size="30" maxlength="30"></td>
				<td><input type="integer" name="harga_wisata" required="required" value="{{ $w->harga_wisata }}" size="6" maxlength="6"></td>
				<td><input type="doubel" name="rating_wisata" required="required" value="{{ $w->rating_wisata }}" size="3" maxlength="3"></td>
								<td><input type="file" name="gambar_wisata" ></td>
							</tr>
						</tbody>
					</table>
					<button class= "button button2" type="submit" name="submit" > Edit </button>
		</table>
		
	</form>
	@endforeach
	</section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')
@section('aside')
