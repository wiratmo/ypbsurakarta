@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Articles</small></h2>
	@if(Auth::user()->role === 1)
		<a href="{{url('/contributor/article/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	@endif
</center>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Tag</th>
                <th>Status</th>
                <th>Date Create</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($articles as $a)
	        <tr>
	        	<td>{{$a->title}}</td>
	        	<td>{{$a->description}}</td>
	        	<td>
	        		@foreach($a->categories as $c)
	        			<button class="btn btn-sm btn-success space">{{$c->name}}</button>
	        		@endforeach
	        	</td>
	        	<td>
	        		@foreach($a->tags as $t)
	        			<button class="btn btn-sm btn-primary space">{{$t->name}}</button>
	        		@endforeach
	        	</td>
	        	<td>
	        		@if($a->status == 1)
	        			On <i class="fa fa-2x fa-toggle-on" aria-hidden="true"></i>
	        		@else
	        			<i class="fa fa-2x fa-toggle-off" aria-hidden="true"></i> Off
	        		@endif
	        	</td>
	        	<td>{{$a->created_at}}</td>
	        	<td>
		        	@if(Auth::user()->role === 1)
		        		<a href="{{url('/contributor/article/'.$a->id)}}"><button class="btn btn-sm btn-warning"> Edit</button></a>
		        	@elseif(Auth::user()->role === 2)
		        		<a href="{{url('/admin/article/'.$a->id)}}"><button class="btn btn-sm btn-warning"> Edit</button></a>
		        		<form action="{{url('/admin/article/delete')}}" method="post">
		        			{{ method_field('DELETE') }}
	        				{{ csrf_field() }}
		        			<input type="hidden" name="id" value="{{$a->id}}">
		        			<input type="submit" value="hapus" class="btn btn-sm btn-danger">
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