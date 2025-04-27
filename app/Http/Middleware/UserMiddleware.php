<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    public static function isAdmin()
    {
        return Auth::user()->role === 'admin'; // Sesuaikan dengan kolom di database
    }

    public static function isUser(): bool
    {
        return Auth::user()->role === 'user';
    }

}
