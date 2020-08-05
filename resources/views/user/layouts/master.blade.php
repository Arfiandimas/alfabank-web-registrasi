<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') | User Alfabank</title>
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
</head>

<body>
    @include('user.layouts.sidebar')
    
    <div id="main">
        @yield('contents')
        {{-- @include('layouts.user.alert') --}}
    </div>
    
    

    <script src="{{ asset('/js/dashboard.js') }}"></script>
</body>

</html>