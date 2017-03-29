@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Articles</small></h2>
	@if(Auth::user()->role == 2)
		<a href="{{url('/admin/agenda/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	@elseif(Auth::user()->role == 1)
		<a href="{{url('/contributor/agenda/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	@endif
</center>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Place</th>
                <th>Time</th>
                <th>Created_at</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($agendas as $a)
	        <tr>
	        	<td>{{$a->name}}</td>
	        	<td>{{$a->place}}</td>
	        	<td>{{$a->implementation}}</td>
	        	<td>{{$a->created_at}}</td>
	        	<td>
	        		@if(Auth::user()->role == 1)
	        			<ul style="list-style: none; display: inline-flex;">
		        			<li>
			        			<a href="{{url('/contributor/agenda/'.$a->id)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
		        			</li>
		        			<li>
		        				<form action="{{url('/contributor/agenda/delete')}}" method="post">
				        			{{ method_field('DELETE') }}
			        				{{ csrf_field() }}
				        			<input type="hidden" name="id" value="{{$a->id}}">
				        			<button type="submit" value="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
				        		</form>	
		        			</li>
		        		</ul>
	        		@elseif(Auth::user()->role == 2)
	        		<ul style="list-style: none; display: inline-flex;">
	        			<li>
		        			<a href="{{url('/admin/agenda/'.$a->id)}}"><button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
	        			</li>
	        			<li>
	        				<form action="{{url('/admin/agenda/delete')}}" method="post">
			        			{{ method_field('DELETE') }}
		        				{{ csrf_field() }}
			        			<input type="hidden" name="id" value="{{$a->id}}">
			        			<button type="submit" value="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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