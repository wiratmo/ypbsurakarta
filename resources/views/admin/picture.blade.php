@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Picture</small></h2>
	<a href="{{url('/contributor/picture/baru')}}"><button class="btn btn-sm btn-danger">Buat Baru</button></a>
	<hr>
</center>
<div class="row">
	@foreach($pictures as $p)
	<div class="col-md-3 col-xs-3">
		<div class="thumbnail">
			<h5>{{$p->title}}</h5>
			<hr>
			<img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive">
			<center class="space">
				<a href="{{url('/contributor/picture/'.$p->id)}}"><button class="btn btn-sm btn-primary"> ubah </button></a> <button class="btn btn-sm btn-danger"> hapus </button>
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