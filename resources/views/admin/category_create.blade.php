@extends('layouts.admin.head')
@section('content')

@if(Auth::user()->role === 1)
<center>
  <h2>Halaman Contributor <small>Create Category</small></h2>
</center>
  <form method="POST" action="{{url('contributor/category/baru')}}" >
@elseif(Auth::user()->role === 2)
<center>
	<h2>Halaman Admin <small>Create Category</small></h2>
</center>
  <form method="POST" action="{{url('admin/category/baru')}}" >
@endif
          {{ csrf_field() }}
     
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#category">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
            <div id="category" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="name" class="form-control"  id="name" placeholder="Name of the Tag">
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <textarea name="description"  class="form-control" placeholder="fill it with description of article"></textarea>
              </div>
              <div class="form-group">
                <textarea name="keyword"  class="form-control" placeholder="fill it with keyword of article"></textarea>
              </div>
            </div>  
            <center>
              
             <div class="form-group">
            	<input type="submit" class="btn btn-success" value="simpan">
            </div>
            </center>
            </div>
      </form>

@endsection