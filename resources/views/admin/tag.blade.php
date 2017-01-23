@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Tag</small></h2>
	<a href="{{url('/contributor/tag/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
</center>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Keyword</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($tags as $t)
	        <tr>
	        	<td>{{$t->name}}</td>
	        	<td>{{$t->title}}</td>
	        	<td>{{$t->description}}</td>
	        	<td>{{$t->keyword}}</td>
	        	<td>
	        		@if(Auth::user()->role === 1)
	        		<a href="{{url('/contributor/tag/'.$t->id)}}"><button class="btn btn-sm btn-warning"> Edit</button></a>
		        	@elseif(Auth::user()->role === 2)
	        		<a href="{{url('/contributor/tag/'.$t->id)}}"><button class="btn btn-sm btn-warning"> Edit</button></a>
	        			<form action="{{url('admin/tag/delete')}}" method="POST">
	        				{{ method_field('DELETE') }}
	        				{{ csrf_field() }}
	        				<input type="hidden" name="id" value="{{$t->id}}">
	        				<input type="submit" class="btn btn-sm btn-danger" value="Hapus">
	        			</form>
					@endif
	        	</td>
	        </tr>
	        @endforeach
        </tbody>
     </table>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endpush