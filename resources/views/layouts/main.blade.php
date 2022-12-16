<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css')}}">
    @livewireStyles
    <title>@yield('titulo')</title>
</head>
<body>
    <main class="container">
        @yield('content')
    </main>

    @livewireScripts
    @yield('scripts')
</body>
</html>