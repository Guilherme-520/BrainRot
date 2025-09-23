<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Recebe ID da URL sem validação
        $id = $request->query('id');

        // ⚠️ Vulnerável: concatenação direta, permite SQL Injection
        $user = DB::select("SELECT * FROM users WHERE id = $id");

        // Dados mockados de políticas do usuário
        $polices = [
            [
                'numero' => 'POL123456',
                'tipo' => 'Automóvel',
                'status' => 'Ativo',
                'vigencia' => '2025-01-01',
                'valor' => 1200.00,
                'detalhes' => [
                    'modelo' => 'Honda Civic',
                    'placa' => 'ABC-1234',
                    'assistencia' => ['Guincho', 'Reboque 24h']
                ]
            ],
            [
                'numero' => 'POL654321',
                'tipo' => 'Residencial',
                'status' => 'Ativo',
                'vigencia' => '2024-06-15',
                'valor' => 850.00,
                'detalhes' => [
                    'endereco' => 'Rua Exemplo, 123, São Paulo - SP',
                    'servicos' => ['Vazamento', 'Vidros', 'Chaveiro']
                ]
            ],
        ];

        // Dados mockados de pagamentos do usuário
        $pagamentos = [
            [
                'mes' => 'Fevereiro/2025',
                'valor' => 600.00,
                'status' => 'Pago',
                'tipo' => 'Cartão de Crédito'
            ],
            [
                'mes' => 'Março/2025',
                'valor' => 1200.00,
                'status' => 'Pendente',
                'tipo' => 'Boleto'
            ],
        ];

        // Exibe dados na view
        return view('dashboard', [
            'user' => $user,
            'polices' => $polices,
            'pagamentos' => $pagamentos,
        ]);
    }
}
