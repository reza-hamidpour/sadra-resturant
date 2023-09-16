<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sadra Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('client-side/dist/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('client-side/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/owl.carousel.min.js') }}"></script>
</head>
<body>
@include('client-side.layouts.header')
@yield('content')
@include('client-side.layouts.footer')
</body>
</html>
