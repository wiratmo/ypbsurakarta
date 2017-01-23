@extends('layouts.admin.head')
@section('content')
		<form action="{{url('/admin/sekolah/baru')}}" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<center>
				<input type="submit" class="btn btn-md btn-primary" value="Perbaharui">
			</center>
			<hr>
			<div class="row">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#sekolah">Sekolah</a></li>
					<li><a data-toggle="tab" href="#picture">Picture</a></li>
					<li><a data-toggle="tab" href="#visi">Visi</a></li>
					<li><a data-toggle="tab" href="#misi">Misi</a></li>
					<li><a data-toggle="tab" href="#meta">Meta</a></li>
				</ul>
				 <div class="tab-content">
          			<div id="sekolah" class="tab-pane fade in active">
          			<div class="row">
          				<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Nama Sekolah
								</div>
								<div class="card-block">					
									<select name="grade"  class="form-control" >
										<option value="0">PLAY GROUP</option>
										<option value="1">SD</option>
										<option value="7">SMP</option>
										<option value="10">SMA</option>
										<option value="13">PERGURUAN TINGGI</option>
									</select>
									<br>
									<input type="text" class="form-control"   name="name" placeholder="Nama Sekolah">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Website
								</div>
								<div class="card-block">					
									<input type="text"  class="form-control"  name="website" placeholder="Alamat Website">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Alamat
								</div>
								<div class="card-block">					
									<textarea name="address" class="article-content"  class="form-control" placeholder="Alamat Sekolah"></textarea>
								</div>
							</div>
						</div>
          			</div>
          				
          			</div>
          			<div id="picture" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Logo
								</div>
								<div class="card-block">				
									<input type="file" name="logo">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Foto Sekolah
								</div>
								<div class="card-block">				
									<input type="file" name="picture">
								</div>
							</div>
						</div>
          			</div>
          			</div>          			
          			<div id="visi" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Visi Yayasan
								</div>
								<div class="card-block">
									<textarea name="visions" class="article-content"  class="form-control" placeholder="visi sekolah"></textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          			<div id="misi" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Misi Yayasan
								</div>
								<div class="card-block">
									<textarea name="missions" class="article-content"  class="form-control" placeholder="misi sekolah"></textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          			<div id="meta" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Title
								</div>
								<div class="card-block">					
									<input type="text" class="form-control"   name="title" placeholder="title sekolah">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Keyword
								</div>
								<div class="card-block">					
									<input type="text"  class="form-control"  name="keyword" placeholder="keyword sekolah">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Description
								</div>
								<div class="card-block">					
									<textarea name="description" class="article-content"  class="form-control" placeholder="description sekoalh"></textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          		</div>
			</div>
		</form>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.article-content').summernote({
          height: 300
        });
    });
</script>
@endpush