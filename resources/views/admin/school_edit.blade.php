@extends('layouts.admin.head')
@section('content')
		<form action="{{url('/admin/sekolah/'.$id)}}" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<center>
				<input type="submit" class="btn btn-md btn-primary" value="Perbaharui">
				<input type="hidden" name="id" value="{{$id}}">
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
									
									<br>
									<input type="text" class="form-control" name="name" value="{{$school->name}}">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Website
								</div>
								<div class="card-block">					
									<input type="text"  class="form-control"  name="website" value="{{$school->website}}">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Alamat
								</div>
								<div class="card-block">					
									<textarea name="address" class="article-content"  class="form-control">{{$school->address}}</textarea>
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
									<img src="{{url('storage/image/logo/'.$school->logo)}}" class="img img-responsive">
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
									<img src="{{url('storage/image/'.$school->picture)}}" class="img img-responsive">	
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
									<textarea name="visions" class="article-content"  class="form-control">{{$school->visions}}</textarea>
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
									<textarea name="missions" class="article-content"  class="form-control">{{$school->missions}}</textarea>
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
									<input type="text" class="form-control"   name="title" value="{{$school->title}}">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Keyword
								</div>
								<div class="card-block">					
									<input type="text"  class="form-control"  name="keyword" value="{{$school->keyword}}">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Description
								</div>
								<div class="card-block">					
									<textarea name="description" class="article-content"  class="form-control">{{$school->description}}</textarea>
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