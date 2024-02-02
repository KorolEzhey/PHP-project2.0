<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Получаем текущего аутентифицированного пользователя
        return view('profile');
    }
}