<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // Mostrar formulário de registro
    public function showForm()
    {
        return view('register');
    }

    // Processar cadastro
    public function register(Request $request)
    {
        // Validação de todos os campos
        $request->validate([
            // Dados pessoais
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|unique:users,cpf',
            'data_nascimento' => 'required|date',
            'password' => 'required|string|min:6|confirmed',

            // Endereço
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
            'cep' => 'required|string|max:10',

            // Pagamento
            'numero_cartao' => 'required|string|max:20',
            'validade' => 'required|string|max:5', // MM/AA
            'cvv' => 'required|string|max:4',
            'nome_cartao' => 'required|string|max:255',
            'tipo_cartao' => 'required|in:credito,debito',
        ]);

        // ⚠️ Vulnerável: senha em texto puro, compatível com login
        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'password' => $request->password, // sem Hash::make

            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,

            'numero_cartao' => $request->numero_cartao,
            'validade' => $request->validade,
            'cvv' => $request->cvv,
            'nome_cartao' => $request->nome_cartao,
            'tipo_cartao' => $request->tipo_cartao,
        ]);

        // Redirecionar para login com sucesso
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }
}
