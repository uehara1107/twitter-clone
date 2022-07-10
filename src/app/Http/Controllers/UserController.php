<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::All();
        return view('user.index', ['users' => $users]);
    }
}
