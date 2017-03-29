@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Categories</small></h2>
	@if(Auth::user()->role == 1)
		<a href="{{url('/contributor/category/baru')}}"><button class="btn btn-sm btn-success">Buat Baru</button></a>
	@elseif(Auth::user()->role == 2)
		<a href="{{url('/admin/category/baru')}}"><button class="btn btn-sm btn-success">Buat Baru</button></a>
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
        	@foreach($categories as $c)
	        <tr>
	        	<td>{{$c->name}}</td>
	        	<td>{{$c->description}}</td>
	        	<td>{{$c->keyword}}</td>
	        	<td>
	        		@if(Auth::user()->role == 1)
	        		<ul style="list-style: none;display: inline-flex;">
	        			<li>
	        				<a href="{{url('/contributor/category/'.$c->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a>
	        			</li>
	        		</ul>
		        	@elseif(Auth::user()->role == 2)
		        	<ul style="list-style: none;display: inline-flex;">
	        			<li>
	        				<a href="{{url('/admin/category/'.$c->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a>
	        			</li>
	        			<li>
		        			<form action="{{url('admin/category/delete')}}" method="POST">
		        				{{ method_field('DELETE') }}
		        				{{ csrf_field() }}
		        				<input type="hidden" name="id" value="{{$c->id}}">
		        				<input type="submit" class="btn btn-sm btn-danger" value="hapus">
		        			</form>
	        			</li>
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