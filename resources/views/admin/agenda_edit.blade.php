@extends('layouts.admin.head')
@section('content')
<center>
  <h2>Halaman User Contributor <small>Tambah Agenda</small></h2>
</center>
      @if(Auth::user()->role == 1)
     <form method="POST" action="{{url('contributor/agenda/'.$id)}}" >
      @elseif(Auth::user()->role == 2)
     <form method="POST" action="{{url('admin/agenda/'.$id)}}" >
      @endif
          {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$id}}">
              <div class="form-group">
                <input type="text" name="name"  class="form-control" placeholder="Name" value="{{$agenda->name}}">
              </div>
              <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Description">{{$agenda->description}}</textarea>
              </div>      
              <div class="form-group">
                <input type="text" name="place"  class="form-control"  placeholder="Place" value="{{$agenda->place}}">
              </div>
              <div class="form-group">
                <input type="date" name="implementation"  class="form-control"  placeholder="Date" value="{{$agenda->implementation}}">
              </div>
            <center>
              
             <div class="form-group">
              <input type="submit" class="btn btn-success" value="simpan">
            </div>
            </center>
            </div>
      </form>

@endsection