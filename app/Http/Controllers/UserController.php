<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credetials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('admin');
        }

        return back()->with('error', 'Error Username or Password');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
