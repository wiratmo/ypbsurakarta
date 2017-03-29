@extends('layouts.admin.head')
@section('content')

<center>
	<h2>Halaman User Contributor <small>Manage Articles</small></h2>
	<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#myModal">Buat Baru</button>
@include('admin.model.article_create')
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
	        			<i class="fa fa-toggle-on" aria-hidden="true"></i>
	        		@else
	        			<i class="fa fa-toggle-off" aria-hidden="true"></i>
	        		@endif
	        	</td>
	        	<td>{{$a->created_at}}</td>
	        	<td>
	        		<a href="{{url('/contributor/article/'.$a->id)}}"><button class="btn btn-sm btn-warning"> Edit</button></a>
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
	$(document).ready(function() {
	    $('#article-content').summernote();
	});
</script>
@endpush