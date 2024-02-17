<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('admin.userList');
    }

    public function create()
    {
        return view('admin.create');
    }
}
