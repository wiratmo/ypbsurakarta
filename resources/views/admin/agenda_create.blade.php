@extends('layouts.admin.head')
@push('style')
  <link href="/css/select2.min.css" rel="stylesheet" />
  <link href="/datepicker.css" rel="stylesheet" />
@endpush
@push('scripts')
  <script type="text/javascript" src="/datepicker.js"></script>
  <script type="text/javascript">
    $('.docs-date').datepicker({
    });
  </script>
@endpush
@section('content')

<center>
  <h2>Halaman User Contributor <small>Tambah Agenda</small></h2>
</center>
      @if(Auth::user()->role == 1)
        <form method="POST" action="{{url('contributor/agenda/baru')}}" >
      @elseif(Auth::user()->role == 2)
        <form method="POST" action="{{url('admin/agenda/baru')}}" >
      @endif
          {{ csrf_field() }}
        
              <div class="form-group">
                <input type="text" name="name"  class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
              </div>      
              <div class="form-group">
                <input type="text" name="place"  class="form-control"  placeholder="Place">
              </div>
              <div class="form-group">
                <input type="text" name="implementation"  class="form-control docs-date"  placeholder="Date">
              </div>
            <center>
              
             <div class="form-group">
              <input type="submit" class="btn btn-success" value="simpan">
            </div>
            </center>
            </div>
      </form>

@endsection