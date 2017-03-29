@extends('layouts.admin.head')
@section('content')

<center>
	@if(Auth::user()->role == 1)
	<h2>Halaman Contributor <small>Manage Tag</small></h2>
		<a href="{{url('/contributor/tag/baru')}}"><button class="btn btn-sm btn-success">Buat Baru</button></a>
	@elseif(Auth::user()->role == 2)
	<h2>Halaman Admin <small>Manage Tag</small></h2>
		<a href="{{url('/admin/tag/baru')}}"><button class="btn btn-sm btn-success">Buat Baru</button></a>
	@endif
</center>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Keyword</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($tags as $t)
	        <tr>
	        	<td>{{$t->name}}</td>
	        	<td>{{$t->description}}</td>
	        	<td>{{$t->keyword}}</td>
	        	<td>
	        		
	        		@if(Auth::user()->role == 1)
	        		<ul style="list-style: none;display: inline-flex;">
	        			<li>
	        				<a href="{{url('/contributor/tag/'.$t->id)}}"><button class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i></button></a>
	        			</li>
	        		</ul>
		        	@elseif(Auth::user()->role == 2)
		        	<ul style="list-style: none;display: inline-flex;">
	        			<li>
	        				<a href="{{url('/admin/tag/'.$t->id)}}"><button class="btn btn-sm btn-primary">  <i class="fa fa-edit"></i></button></a>
	        			</li>
	        			<li>
	        				<form action="{{url('admin/tag/delete')}}" method="POST">
		        				{{ method_field('DELETE') }}
		        				{{ csrf_field() }}
		        				<input type="hidden" name="id" value="{{$t->id}}">
		        				<input type="submit" class="btn btn-sm btn-danger" value="hapus">
		        			</form>	
	        			</li>
	        		</ul>
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