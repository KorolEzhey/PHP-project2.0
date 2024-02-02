<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // Выход пользователя
        $request->session()->invalidate(); // Очистка сессии
        $request->session()->regenerateToken(); // Генерация нового CSRF-токена

        return redirect('/login')->with('message', 'You have successfully logged out.'); // Перенаправление на страницу входа
    }

}
