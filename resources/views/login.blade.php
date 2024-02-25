<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Вход</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/login.css">
</head>
<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="login-container">
            <h2>Вход</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf 
                <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Почта" required>
                <input type="password" class="input" id="password" name="password" autocomplete="current-password" placeholder="Пароль" required>
                <input type="submit" class="button" value="Войти">
            </form>
            <p class="error-message">{{ $errors->first('email') }}</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</body>
</html>
