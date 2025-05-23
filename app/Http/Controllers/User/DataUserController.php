<?php

// DataUserController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DataUserController extends Controller
{
    public function index()
    {
        return view('user.datauser');
    }
}

