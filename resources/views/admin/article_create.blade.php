@extends('layouts.admin.head')
@push('style')
  <link href="/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<center>
	<h2>Halaman User Contributor <small>Create Articles</small></h2>
</center>

 <form method="POST" action="{{url('contributor/article/baru')}}" >
          {{ csrf_field() }}
            <center> 
             <div class="form-group">
             <ul style="list-style: none;display: inline-flex;">
               <li>
                  <input type="submit" class="btn btn-success" value="kirim" name="aksi">
               </li>
               <li>
                  <input type="submit" class="btn btn-danger" value="cancle" name="aksi">
               </li>
             </ul>
            </div>
            </center>
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
                <select id="tag_list" multiple="multiple" class="form-control" name="tag[]">
                </select>
              </div>
              <div class="form-group">
                <select id="category_list" multiple="multiple" class="form-control" name="category[]">
                </select>
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
            </div>
      </form>

@endsection
@push('scripts')
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#article-content').summernote({
          height: 300
        });
    });

    $('#tag_list').select2({
        placeholder: 'Enter a tag',
        ajax: {
            dataType: 'json',
            url: '{{ url("contributor/tag/api") }}',
            delay: 400,
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {
              return {
                results: data
              };
            },
        }
    });

    $('#category_list').select2({
        placeholder: 'Enter a category',
        ajax: {
            dataType: 'json',
            url: '{{ url("contributor/category/api") }}',
            delay: 400,
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {
              return {
                results: data
              };
            },
        }
    });
</script>
@endpush
