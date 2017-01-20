<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="shortcut icon" href="/img/favicon.png">

    <title>Ommaya</title>

    <!-- include summernote css/js-->

    <script src="/js/all.js"></script> 
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <link href="/css/all.css" rel="stylesheet">
    <link href="/css/dataTables.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">

    @stack('style')
    
</head>

@include('layouts.admin.navbar')
@include('layouts.admin.lsidebar')
@include('layouts.admin.notif_flash')
@yield('content')
@include('layouts.admin.footer')
@stack('scripts')