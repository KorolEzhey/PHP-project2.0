@extends('main')

@section('title', 'Webleb - Регистрация')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="registration-container">
            <h2>Регистрация</h2>
            <form action="#" method="post" id="registrationForm">
                @csrf 
                <input type="text" class="input" id="username" name="username" autocomplete="off" placeholder="ФИО">
                <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Почта">
                <input type="text" class="input" id="passport" name="passport" autocomplete="off" placeholder="Паспорт">
                <input type="text" class="input" id="password" name="password" autocomplete="new-password" placeholder="Пароль" readonly>
                <button type="button" id="generatePassword" class="button generate-button">Сгенерировать пароль</button>
                <input type="submit" class="button" value="Зарегистрироваться">
                <button type="button" id="loginButton" class="loginButton">Уже Вас есть аккаунт? Войти</button>
            </form>
        </div>
    </div>
@endsection
