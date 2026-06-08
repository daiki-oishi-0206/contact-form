<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/admin/contacts');
        }
        return back()->withErrors([
            'login' => 'ログイン情報が登録されていません'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
