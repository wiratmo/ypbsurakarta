@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Picture</small></h2>
	<hr>
</center>
<div class="row">
  @if(Auth::user()->role === 1)
     <form method="post" action="{{url('contributor/picture/'.$id)}}" enctype="multipart/form-data">
    @elseif(Auth::user()->role === 2)
	   <form method="post" action="{{url('admin/picture/'.$id)}}" enctype="multipart/form-data">
  @endif
          {{ csrf_field() }}
      @foreach($pictures as $p)
        <input type="hidden" name="id" value="{{$p->id}}">
        <input type="hidden" name="category" value="{{$p->category}}">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#picture">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
          
            <div id="picture" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="name" class="form-control"  id="name" placeholder="Picture Name" value="{{$p->name}}">
              </div>
              <div class="form-group">
                <input type="text" name="url_picture" class="form-control"  id="url_picture" placeholder="Picture By Url" value="{{$p->url}}">
              </div>
              <div class="form-group">
                <img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive">
              	<input type="file" name="picture">
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article" value="{{$p->title}}">
              </div>
              <div class="form-group">
                <textarea name="description"  class="form-control" placeholder="fill it with description of article">{{$p->description}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="keyword"  class="form-control" placeholder="fill it with keyword of article">{{$p->keyword}}</textarea>
              </div>
            </div>  
            <center>
              
             <div class="form-group">
            	<input type="submit" class="btn btn-sm btn-success" value="simpan">
            </div>
            </center>
         </div>
         @endforeach
      </form>
</div>
@endsection