<!-- resources/views/registration.blade.php -->

@extends('main')

@section('title', 'Webleb - Регистрация')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

@endsection
@section('content')
    <div class="container">
        <div class="registration-container">
            <h2>Регистрация</h2>
            <form action="#" method="post">
                <input type="text" class="input" id="username" name="username" autocomplete="off" placeholder="Имя пользователя">
                <input type="password" class="input" id="password" name="password" autocomplete="off" placeholder="Пароль">
                <input type="submit" class="button" value="Зарегистрироваться">
            </form>
        </div>
    </div>
@endsection
