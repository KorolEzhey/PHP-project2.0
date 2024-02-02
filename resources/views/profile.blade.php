<!-- resources/views/user/profile.blade.php -->


@extends('main')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@endsection

@section('content')
    <h1>User Profile</h1>

    <p>Welcome, {{Auth::user() ->name}}!</p>
    <p>Email: {{ Auth::user()->email }}</p>

    <a href="{{ route('logout') }}">Logout</a>
@endsection
