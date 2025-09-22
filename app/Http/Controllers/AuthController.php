<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Exibir formulário de login
    public function showLoginForm()
    {
        return view('login'); // cria a view resources/views/login.blade.php
    }

    // Processar login
    public function login(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentar autenticar
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // segurança
            return redirect()->intended(route('dashboard'));
        }

        // Falha no login
        return back()->withErrors([
            'login' => 'Email ou senha inválidos.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
