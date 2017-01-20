@extends('layouts.admin.head')
@section('content')

<center>
  <h2>Halaman User Contributor <small>Edit Articles</small></h2>
</center>

 <form method="POST" action="{{url('contributor/article/'.$id)}}" >
          {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$id}}">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#article">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
          @foreach($articles as $a)
            <div id="article" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article" value="{{$a->title}}" required>
              </div>
              <div class="form-group">
                <input type="text" name="tag" class="form-control"  id="tag" placeholder="Tag of the article">
              </div>
              <div class="form-group">
                <input type="text" name="category" class="form-control"  id="category" placeholder="Category of the article">
              </div>
              <div class="form-group">
                <textarea name="content" id="article-content" id="" class="form-control" placeholder="content of article">{{$a->content}}</textarea>
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <textarea name="description"  class="form-control" placeholder="fill it with description of article">{{$a->description}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="keyword"  class="form-control" placeholder="fill it with keyword of article">{{$a->keyword}}</textarea>
              </div>
            </div>  
            @endforeach
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