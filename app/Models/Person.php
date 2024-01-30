<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'person';
    protected $fillable = ['name', 'email', 'password', 'passport'];
}