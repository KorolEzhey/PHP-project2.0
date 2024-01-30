<!-- resources/views/user/profile.blade.php -->


@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@endsection

@section('content')
    <h1>User Profile</h1>

    <p>Welcome, {{ $user->name }}!</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('logout') }}">Logout</a>
@endsection
