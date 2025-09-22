<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
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
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_nascimento' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
