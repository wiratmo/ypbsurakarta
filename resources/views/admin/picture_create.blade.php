@extends('layouts.admin.head')
@push('style')
  <link href="/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
@if(Auth::user()->role ==1)
  <center>
  <h4>Halaman Contributor <small>Manage Picture</small></h4>
  <hr>
  </center>
  <form method="post" action="{{url('contributor/picture/baru')}}" enctype="multipart/form-data">
@elseif(Auth::user()->role == 2)
  @if($category == 1)
  <center>
  <h4>Halaman Admin <small>Manage Picture</small></h4>
  <hr>
  </center>
  <form method="post" action="{{url('admin/picture/baru')}}" enctype="multipart/form-data">
  @elseif($category == 2)
  <center>
  <h4>Halaman Admin <small>Manage Slider</small></h4>
  <hr>
  </center>
	<form method="post" action="{{url('admin/slider/baru')}}" enctype="multipart/form-data">
  @endif
@endif
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
              @if($category == 1)
                <div class="form-group">
                  <select id="categorypicture_tag" multiple="multiple" class="form-control" name="categorypicture[]">
                  </select>
                </div>
              @endif
              <div class="form-group">
              	<input type="file" name="picture">
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
            	<input type="submit" class="btn btn-sm btn-success" value="simpan">
            </div>
            </center>
         </div>
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