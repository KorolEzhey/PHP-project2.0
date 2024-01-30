<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка аутентификации
        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect()->intended('/');
        } else {
            // Аутентификация не удалась
            return back()->withErrors(['email' => 'Неверные учетные данные']);
        }
    }
}