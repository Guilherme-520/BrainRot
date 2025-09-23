<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Dados pessoais
        'nome',
        'email',
        'telefone',
        'cpf',
        'data_nascimento',
        'password',

        // Endereço
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',

        // Pagamento
        'numero_cartao',
        'validade',
        'cvv',
        'nome_cartao',
        'tipo_cartao',
    ];

    /**
     * Atributos ocultos na serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token', // remover 'password' daqui
    ];

    /**
     * Conversões de atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_nascimento' => 'date',
        'email_verified_at' => 'datetime',
        // ❌ Removido 'password' => 'hashed' para salvar em texto puro
    ];
}
