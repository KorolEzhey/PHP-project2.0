<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Person;
class LoginController extends Controller
{
    public function index(Request $request) {
        return view('login');
    }

    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        // Проверяем наличие пользователя с указанным email
        $user = Person::where('email', $email)->first();

        if (!$user) {
            // Если пользователя с таким email нет, возвращаем ошибку 404 (Not Found)
            return response()->json(['error' => 'User not found'], 404);
        }

        // Сравниваем зашифрованные пароли
        if (password_verify($password, $user->password)) {
            // Пароль совпадает, аутентифицируем пользователя
            Auth::login($user);
            return redirect('/profile');
            //return response()->json(['message' => 'Login successful'], 200);
            
        } else {
            // Пароль неправильный, возвращаем ошибку 401 (Unauthorized)
            return response()->json(['error' => 'Incorrect password'], 401);
        }
    }
}