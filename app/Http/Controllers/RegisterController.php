<?php

// PersonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Person;

use Illuminate\Support\Str;
class RegisterController extends Controller
{
    public function enter(Request $request)
    {
        // Генерация уникального пароля с использованием bcrypt
        $password = Hash::make(Str::random(12));

        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:person',
            'passport' => 'required|unique:person',
        ]);

        // Добавление валидированного пароля в массив
        $validatedData['password'] = $password;

        // Создание записи в модели Person
        $person = Person::create($validatedData);

        // Возвращаем ответ клиенту (например, JSON-ответ)
        return response()->json(['message' => 'Успешно зарегистрирован', 'person' => $person], 201);
    }
    public function index(Request $request) {
        // Создайте новую запись
        // $person = new Person;
        // $person->name = 'KorolEzhey'; // Замените на реальное имя
        // $person->email = 'yegortrukan@mail.ru'; // Замените на реальный email
        // $person->password = bcrypt('1245'); // Замените на реальный пароль
        // $person->passport = '88005553535'; // Замените на реальный номер паспорта

        // Сохраните запись в базе данных
       // $person->save();

        $person = Person::where('name', 'KorolEzhey')->first();
        $personName = $person->name;
        
        // auth()->login($person);
        // return redirect('/');

        // echo $person;

        return view('register');
    }
}