@extends('layouts.admin.head')
@push('style')
  <link href="/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<div class="row">
  @if(Auth::user()->role == 1)
    <center>
    <h4>Halaman Contributor <small>Manage Picture</small></h4>
    <hr>
  </center>
     <form method="post" action="{{url('contributor/picture/'.$id)}}" enctype="multipart/form-data">
    @elseif(Auth::user()->role == 2)
      @if($category == 1)
        <center>
          <h4>Halaman Admin <small>Manage Picture</small></h4>
          <hr>
        </center>
        <form method="post" action="{{url('admin/picture/'.$id)}}" enctype="multipart/form-data">
      @elseif($category == 2)
        <center>
          <h4>Halaman Admin <small>Manage Slider</small></h4>
          <hr>
        </center>
	       <form method="post" action="{{url('admin/slider/'.$id)}}" enctype="multipart/form-data">
      @endif
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
                <select id="categorypicture_tag" multiple="multiple" class="form-control" name="categorypicture[]">
                    @foreach($p->picturecategories as $pc)
                      <option selected="{{$pc->id}}" value="{{$pc->id}}">{{$pc->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                @if($category == 1)
                <img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive" width="20%">
                @elseif($category == 2)
                <img src="{{url('storage/image/slider/'.$p->location)}}" class="img img-responsive" width="40%">
                @endif
              	<input type="file" name="picture">
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
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
@push('scripts')
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/select2.min.js"></script>
  @if(Auth::user()->role == 1)
    <script type="text/javascript">
    $('#categorypicture_tag').select2({
        placeholder: 'Enter a tag',
        ajax: {
            dataType: 'json',
            url: '{{ url("contributor/picture/api") }}',
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
  @elseif(Auth::user()->role == 2)
  <script type="text/javascript">
    $('#categorypicture_tag').select2({
        placeholder: 'Enter a tag',
        ajax: {
            dataType: 'json',
            url: '{{ url("admin/picture/api") }}',
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
  @endif
@endpush