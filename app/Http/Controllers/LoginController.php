<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect()->intended('/user.profile');
        } else {
            // Аутентификация не удалась
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
