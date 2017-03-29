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

    <title>Administaror Yayasan Batik Surakarta</title>

    <!-- include summernote css/js-->

    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <link href="/css/summernote.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">


    @stack('style')
    
</head>

<body>
@include('layouts.admin.navbar')
@include('layouts.admin.lsidebar')
@include('layouts.admin.notif_flash')
@yield('content')
</body>
@include('layouts.admin.footer')
@stack('scripts')

</html>
