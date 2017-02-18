@extends('layouts.admin.head')
@section('content')

<center>
	
	@if($category === 1)
		@if(Auth::user()->role === 1)
			<h4>Halaman Contributor <small>Manage Picture</small></h4>
			<a href="{{url('/contributor/picture/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
		@elseif(Auth::user()->role === 2)
			<h4>Halaman Admin <small>Manage Picture</small></h4>
			<a href="{{url('/admin/picture/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
		@endif
	@elseif($category === 2)
		@if(Auth::user()->role === 2)
			<h4>Halaman Admin <small>Manage Slider</small></h4>
			<a href="{{url('/admin/slider/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
		@endif
	@endif
	<hr>
</center>
<div class="row">
	@foreach($pictures as $p)
	<div class="col-md-3 col-xs-3">
		@if($p->accept == 1)
				<div class="thumbnail">
	       	@else
	   			<div class="thumbnail" style="background: #babaff;">
			@endif 
		
			<h6 style="text-align: center;text-transform: uppercase;">{{str_limit($p->name, 25)}}</h6>
			<b>Status</b>:
			@if($p->accept == 1)
				On <i class="fa fa-toggle-on" aria-hidden="true"></i>
	       	@else
	   			<i class="fa fa-toggle-off" aria-hidden="true"></i> Off
			@endif 
			<b> date: </b><i class="fa fa-clock-o">{{$p->created_at->diffForHumans()}}</i>
			@if($category == 1)
				<img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive">
			@elseif($category == 2)
				<img src="{{url('storage/image/slider/'.$p->location)}}" class="img img-responsive">
			@endif
			<br>
			<center>
					@if(Auth::user()->role === 1)
					<ul style="list-style: none;display: inline-flex;">
	        			<li>
							<a href="{{url('/contributor/picture/'.$p->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a> 
						</li>
					</ul>
		        	@elseif(Auth::user()->role === 2)
		        	<ul style="list-style: none;display: inline-flex; padding: 0">
		        		<li>
		        			@if($category == 1)
		        				<form action="{{url('admin/picture/accept')}}" method="POST">
		        			@elseif($category == 2)
			        			<form action="{{url('admin/slider/accept')}}" method="POST">
		        			@endif
					        		{{ csrf_field() }}
									<input type="hidden" name="id" value="{{$p->id}}">
									<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></button>
								</form>			
						</li>
	        			<li>
	        				@if($category == 1)
								<a href="{{url('/admin/picture/'.$p->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a> 
		        			@elseif($category == 2)
		        				<a href="{{url('/admin/slider/'.$p->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a> 
		        			@endif
						</li>
						<li>
							@if($category == 1)
								<form action="{{url('admin/picture/delete')}}" method="POST">
		        			@elseif($category == 2)
								<form action="{{url('admin/slider/delete')}}" method="POST">
		        			@endif
								{{ method_field('DELETE') }}
				        		{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$p->id}}">
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							</form>			
						</li>
					@endif
			</center>
		</div>
	</div>
	@endforeach
</div>
<center>
	{{$pictures->links()}}
</center>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endpush