@extends('layouts.admin.head')
@push('style')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<center>
  <h2>Halaman User Contributor <small>Tambah Agenda</small></h2>
</center>
      
     <form method="POST" action="{{url('admin/agenda/baru')}}" >
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
                <input type="date" name="implementation"  class="form-control"  placeholder="Date">
              </div>
            <center>
              
             <div class="form-group">
              <input type="submit" class="btn btn-success" value="simpan">
            </div>
            </center>
            </div>
      </form>

@endsection