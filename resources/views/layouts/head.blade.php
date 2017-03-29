<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="yayasan pendidikan batik surakarta">

    <link rel="shortcut icon" href="{{url('/storage/image/icon/favicon.ico')}}">
        {!! SEOMeta::generate() !!}
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link href="/css/kaatas.css" rel="stylesheet">

</head>
<body id="page-top">
@include('layouts.navbar')
<div class="container">
    <div class="main-content">
@yield('content')
    </div>
</div>
@include('layouts.footer')