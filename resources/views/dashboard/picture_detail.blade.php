@extends('layouts.head')
@section('content')
	<center>
		<img src="{{url('/storage/image/'.$pictures->location)}}">
		<h4>{{$pictures->name}}</h4>
		<h5>{{$pictures->description}}</h5>
	</center>
@endsection
