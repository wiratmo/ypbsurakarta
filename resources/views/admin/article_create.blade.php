@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Create Articles</small></h2>
</center>

 <form method="POST" action="{{url('contributor/article/baru')}}" >
          {{ csrf_field() }}
     
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#article">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
          
            <div id="article" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article" required>
              </div>
              <div class="form-group">
                <input type="text" name="tag" class="form-control"  id="tag" placeholder="Tag of the article">
              </div>
              <div class="form-group">
                <input type="text" name="category" class="form-control"  id="category" placeholder="Category of the article">
              </div>
              <div class="form-group">
                <textarea name="content" id="article-content" id="" class="form-control" placeholder="content of article"></textarea>
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
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#article-content').summernote({
  height: 300
});
	});
</script>
@endpush