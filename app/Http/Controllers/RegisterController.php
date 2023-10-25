<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class RegisterController extends Controller
{
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