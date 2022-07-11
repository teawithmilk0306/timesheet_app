<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::All();
        return view('admin.user', ['users' => $users]);
    }
  
}
