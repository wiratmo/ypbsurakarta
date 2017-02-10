@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Picture</small></h2>
	@if(Auth::user()->role === 1)
		<a href="{{url('/contributor/picture/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	@elseif($category === 2)
		<a href="{{url('/admin/slider/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	@endif
	<hr>
</center>
<div class="row">
	@foreach($pictures as $p)
	<div class="col-md-3 col-xs-3">
		@if($p->accept == 1)
				<div class="thumbnail">
	       	@else
	   			<div class="thumbnail" style="background: orange">
			@endif 
		
			<h5>{{str_limit($p->title, 25)}}</h5>
			<b>Status</b>:
			@if($p->accept == 1)
				On <i class="fa fa-2x fa-toggle-on" aria-hidden="true"></i>
	       	@else
	   			<i class="fa fa-2x fa-toggle-off" aria-hidden="true"></i> Off
			@endif 
			<b>Posted at : </b><i class="fa fa-clock">{{$p->created_at->diffForHumans()}}</i>
			<img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive">
			<center class="space">
					@if(Auth::user()->role === 1)
				<a href="{{url('/contributor/picture/'.$p->id)}}"><button class="btn btn-sm btn-primary"> ubah </button></a> 
		        	@elseif(Auth::user()->role === 2)
				<a href="{{url('/admin/picture/'.$p->id)}}"><button class="btn btn-sm btn-primary"> ubah </button></a> 
				<form action="{{url('admin/picture/delete')}}" method="POST">
					{{ method_field('DELETE') }}
	        				{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$p->id}}">
					<input type="submit" class="btn btn-sm btn-danger" value="hapus">
				</form>
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