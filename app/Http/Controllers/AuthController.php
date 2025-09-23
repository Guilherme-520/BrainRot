<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // ⚠️ Vulnerável a SQL Injection de propósito
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $user = DB::select($sql);

        if ($user && count($user) > 0) {
            // Armazenar usuário na sessão
            $request->session()->put('user_id', $user[0]->id);
            $request->session()->put('user_nome', $user[0]->nome);

            // Redireciona para dashboard vulnerável
            return redirect()->route('dashboard', ['id' => $user[0]->id]);
        }

        return back()->withErrors([
            'login' => 'Email ou senha inválidos.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('welcome');
    }
}
