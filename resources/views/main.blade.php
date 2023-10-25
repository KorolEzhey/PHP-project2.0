<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles') <!-- Динамический блок для подключения дополнительных стилей из дочерних шаблонов -->
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts') <!-- Динамический блок для подключения дополнительных скриптов из дочерних шаблонов -->
</body>
</html>