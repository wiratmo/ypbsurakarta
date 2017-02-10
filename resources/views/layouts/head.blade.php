<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
            <!-- OR -->
    {!! SEO::generate() !!}

      <!-- MINIFIED -->
    {!! SEO::generate(true) !!}

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">

    <!-- Theme CSS -->
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