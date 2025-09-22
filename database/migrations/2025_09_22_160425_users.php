<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Dados pessoais
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('cpf', 14)->unique(); // formato 000.000.000-00
            $table->date('data_nascimento');
            $table->string('password'); // criptografar ao salvar

            // Endereço
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado', 2); // usar sigla
            $table->string('cep', 9); // formato 00000-000

            // Pagamento
            $table->string('numero_cartao', 19); // 0000 0000 0000 0000
            $table->string('validade', 5); // MM/AA
            $table->string('cvv', 4);
            $table->string('nome_cartao');
            $table->enum('tipo_cartao', ['credito', 'debito']);

            $table->rememberToken(); // útil para autenticação futura
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
