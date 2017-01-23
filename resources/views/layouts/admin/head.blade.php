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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link href="/css/style.css" rel="stylesheet">


    @stack('style')
    
</head>

@include('layouts.admin.navbar')
@include('layouts.admin.lsidebar')
@include('layouts.admin.notif_flash')
@yield('content')
@include('layouts.admin.footer')
@stack('scripts')

</html>
