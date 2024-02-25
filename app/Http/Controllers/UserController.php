<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:person,email,' . $user->id,
            'passport' => 'required|unique:person,passport,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('user.profile')->with('status', 'Профиль пользователя успешно обновлен!');
    }
}