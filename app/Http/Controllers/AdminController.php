<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;

class AdminController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('admin.userList', compact('users') );
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit(Produk $produk)
    {
        return view('admin.edit', compact('produk'));
    }

    public function userDestroy(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.userList')->with('success', 'User deleted successfully!');
        } else {
            return redirect()->route('admin.userList')->with('error', 'User not found!');
        }
    }
}
