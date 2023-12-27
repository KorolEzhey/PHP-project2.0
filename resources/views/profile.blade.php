<!-- resources/views/user/profile.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Профиль пользователя</h2>
        <p>Имя: {{ $user->username }}</p>
        <p>Почта: {{ $user->email }}</p>
    </div>
@endsection
