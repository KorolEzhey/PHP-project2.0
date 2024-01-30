<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Person;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function enter(Request $request)
    {
        // Хэширование уникального пароля с использованием bcrypt
        $password = Hash::make(Str::random(12));

        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:people',
            'passport' => 'required|unique:people',
        ]);

        // Добавление валидированного пароля в массив
        $validatedData['password'] = $password;

        // Создание записи в модели Person
        $person = Person::create($validatedData);

        // Автоматический вход пользователя после успешной регистрации
        Auth::login($person);

        // Перенаправление на страницу профиля пользователя
        return redirect()->route('user.profile');
    }

}
