@extends('layouts.admin.head')
@section('content')
	@foreach($foundation as $f)
		<form action="{{url('/admin/yayasan')}}" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<center>
				<input type="submit" class="btn btn-md btn-primary" value="Perbaharui">
			</center>
			<hr>
			<div class="row">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#identity">Identitas</a></li>
					<li><a data-toggle="tab" href="#picture">Picture</a></li>
					<li><a data-toggle="tab" href="#pengurus">Pengurus</a></li>
					<li><a data-toggle="tab" href="#profil">Profil Yayasan</a></li>
					<li><a data-toggle="tab" href="#moto">Moto</a></li>
					<li><a data-toggle="tab" href="#visi">Visi</a></li>
					<li><a data-toggle="tab" href="#misi">Misi</a></li>
				</ul>
				 <div class="tab-content">
          			<div id="identity" class="tab-pane fade in active">
          			<div class="row">
          				<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Nama Yayasan
								</div>
								<div class="card-block">					
									<input type="text" class="form-control"   name="title" value="{{$f->title}}">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Keyword Yayasan
								</div>
								<div class="card-block">					
									<input type="text"  class="form-control"  name="keyword" value="{{$f->keyword}}">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Description Yayasan
								</div>
								<div class="card-block">					
									<textarea name="description" class="article-content"  class="form-control">{{$f->description}}</textarea>
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
									<img src="{{url('storage/image/logo/'.$f->logo_location)}}" class="img img-responsive">			
									<input type="file" name="logo">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									Foto Pengurus Yayasan
								</div>
								<div class="card-block">		
									<img src="{{url('storage/image/logo/'.$f->founder_image)}}" class="img img-responsive">			
									<input type="file" name="founder_image">
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          			<div id="pengurus" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Tentang Pengurus
								</div>
								<div class="card-block">		
									<textarea name="founder" class="article-content"  class="form-control">{{$f->founder}}</textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          			<div id="profil" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Profil Yayasan
								</div>
								<div class="card-block">
									<textarea name="profil" class="article-content"  class="form-control">{{$f->profil}}</textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          			<div id="moto" class="tab-pane fade ">
          			<div class="row">
          				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									Moto Yayasan
								</div>
								<div class="card-block">
									<textarea name="motto" class="article-content"  class="form-control">{{$f->motto}}</textarea>
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
									<textarea name="visions" class="article-content"  class="form-control">{{$f->visions}}</textarea>
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
									<textarea name="missions" class="article-content"  class="form-control">{{$f->missions}}</textarea>
								</div>
							</div>
						</div>
          			</div>
	          			
          			</div>
          		</div>
			</div>
		</form>
	@endforeach
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