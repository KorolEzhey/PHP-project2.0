@if (auth()->check())
    <p>Добро пожаловать, {{ auth()->user()->name }}</p>
    <p>Ваш email: {{ auth()->user()->email }}</p>
@else
    <p>Пожалуйста, войдите в систему.</p>
@endif