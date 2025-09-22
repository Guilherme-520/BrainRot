<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock de dados - no real usaria models e BD
        $polices = [
            [
                'tipo' => 'Automóvel',
                'numero' => 'AUTO123456',
                'status' => 'Ativo',
                'vigencia' => '2025-12-31',
                'valor' => 350.00,
                'detalhes' => [
                    'placa' => 'ABC-1234',
                    'modelo' => 'Toyota Corolla 2022',
                    'assistencia' => ['Guincho', 'Chaveiro'],
                ]
            ],
            [
                'tipo' => 'Residencial',
                'numero' => 'RES987654',
                'status' => 'Ativo',
                'vigencia' => '2025-08-15',
                'valor' => 150.00,
                'detalhes' => [
                    'endereco' => 'Rua das Flores, 123 - São Paulo',
                    'servicos' => ['Encanador', 'Eletricista'],
                ]
            ],
            [
                'tipo' => 'Vida',
                'numero' => 'VID789321',
                'status' => 'Ativo',
                'vigencia' => '2030-01-01',
                'valor' => 200.00,
                'detalhes' => [
                    'beneficiarios' => ['Maria Silva', 'João Souza'],
                    'cobertura' => 'R$ 500.000,00',
                ]
            ]
        ];

        $pagamentos = [
            ['mes' => 'Setembro/2025', 'valor' => 700.00, 'status' => 'Pago'],
            ['mes' => 'Agosto/2025', 'valor' => 700.00, 'status' => 'Pago'],
        ];

        return view('dashboard', compact('polices', 'pagamentos'));
    }
}