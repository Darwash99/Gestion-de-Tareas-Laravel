<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/css/util.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('recursos/login_nuevo/css/main.css')}}">
        <!--===============================================================================================-->

    </head>
    <body class="bg-light text-dark">
        <div class="limiter">
            <div class="container-login100" style="background-image: url('{{asset('/img/imagendegradadofactureenlinea.jpg')}}');">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-15" style="width: 541px !important;">
                    {{ $slot }}
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>
	
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/bootstrap/js/popper.js')}}"></script>
            <script src="{{asset('recursos/login_nuevo/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/daterangepicker/moment.min.js')}}"></script>
            <script src="{{asset('recursos/login_nuevo/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/vendor/countdowntime/countdowntime.js')}}"></script>
        <!--===============================================================================================-->
            <script src="{{asset('recursos/login_nuevo/js/main.js')}}"></script>
    </body>
</html>
