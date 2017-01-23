@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Create Articles</small></h2>
</center>

 <form method="POST" action="{{url('contributor/tag/baru')}}" >
          {{ csrf_field() }}
     
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tag">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
            <div id="tag" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="name" class="form-control"  id="name" placeholder="Name of the Tag">
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article" required>
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
            	<input type="submit" class="btn btn-success" value="simpan">
            </div>
            </center>
            </div>
      </form>

@endsection