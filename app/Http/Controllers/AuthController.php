<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        // Placeholder for authentication logic
        return redirect('/');
    }

    public function store(Request $request)
    {
        // Placeholder for registration logic
        return redirect('/');
    }
}
