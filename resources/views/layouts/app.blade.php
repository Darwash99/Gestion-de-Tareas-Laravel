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

        <!-- USANDO -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/funciones.js') }}"></script>
        <script src="{{ asset('js/peticionesajax.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/noty@3.1.4/lib/noty.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/noty@3.1.4/lib/noty.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-vh-100 bg-light"> <!-- Cambiar a min-vh-100 para altura mínima -->
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow" style="background-color:#fbc42a !important">
                    <div class="container py-4"> <!-- Usar .container para centrado -->
                        <h1 class="h2 " >{{ $header }}</h1> <!-- Agregar un encabezado -->
                    </div>
                </header>
            @endisset
            
            <main class="container my-4"> <!-- Usar .container para contenido -->
                {{ $slot }}
            </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        @if(session('successlogin'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new Noty({
                        text: `<div class="alert alert-success" role="alert"> Bienvenido: {{ Auth::user()->name }}! </div>`,
                        type: '',
                        layout: 'topRight',
                        timeout: 6000
                    }).show();
                });
            </script>
        @endif
        
    </body>
</html>
