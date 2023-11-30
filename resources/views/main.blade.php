<!-- resources/views/layouts/main.blade.php -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Net')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles') <!-- Динамический блок для подключения дополнительных стилей из дочерних шаблонов -->
</head>
<body>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
   
     @yield('scripts') <!-- Динамический блок для подключения дополнительных скриптов из дочерних шаблонов -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>