@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Picture</small></h2>
	<hr>
</center>
<div class="row">
	<form method="post" action="{{url('contributor/picture/baru')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
     
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#picture">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
          
            <div id="picture" class="tab-pane fade in active">
              <input type="hidden" name="category" value="{{$category}}">
              <div class="form-group">
                <input type="text" name="name" class="form-control"  id="name" placeholder="Picture Name">
              </div>
              <div class="form-group">
                <input type="text" name="url_picture" class="form-control"  id="url_picture" placeholder="Category of picture">
              </div>
              <div class="form-group">
              	<input type="file" name="picture">
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article">
              </div>
              <div class="form-group">
                <textarea name="description"  class="form-control" placeholder="fill it with description of article"></textarea>
              </div>
              <div class="form-group">
                <textarea name="keyword"  class="form-control" placeholder="fill it with keyword of article"></textarea>
              </div>
            </div>  
            <center>
              
             <div class="form-group">
            	<input type="submit" class="btn btn-sm btn-success" value="simpan">
            </div>
            </center>
         </div>
      </form>
</div>
@endsection