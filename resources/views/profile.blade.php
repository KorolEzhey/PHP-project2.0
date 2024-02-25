@extends('main')

@section('title', 'Профиль пользователя')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Профиль пользователя</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ route('user.update') }}">
            @csrf
            @method('put')

            <label for="name">Имя</label>
            <input type="text" name="name" value="{{ $user->name }}" required>

            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <label for="passport">Паспорт</label>
            <input type="text" name="passport" value="{{ $user->passport }}" required>

            <button type="submit">Обновить профиль</button>
        </form>

        <form method="post" action="{{ route('logout') }}">
            @csrf
            <div class="logout-container">
                <button type="submit">Выход</button>
            </div>
        </form>
    </div>
@endsection