<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Brainrot Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .register-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 { font-weight: bold; }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-center mb-4">Cadastro - Brainrot Company</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <!-- Dados pessoais -->
            <h4 class="mb-3">Dados Pessoais</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autocomplete="name">
                </div>
                <div class="col-md-6">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="(xx) xxxxx-xxxx" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="000.000.000-00" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="password" required autocomplete="new-password">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirme a Senha</label>
                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <hr class="my-4">

            <!-- Endereço -->
            <h4 class="mb-3">Endereço</h4>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Rua</label>
                    <input type="text" class="form-control" name="rua" value="{{ old('rua') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Estado</label>
                    <input type="text" class="form-control" name="estado" value="{{ old('estado') }}" placeholder="SP" maxlength="2" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" placeholder="00000-000" required>
                </div>
            </div>

            <hr class="my-4">

            <!-- Pagamento -->
            <h4 class="mb-3">Pagamento</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Número do Cartão</label>
                    <input type="text" class="form-control" name="numero_cartao" value="{{ old('numero_cartao') }}" placeholder="0000 0000 0000 0000" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Validade</label>
                    <input type="text" class="form-control" name="validade" value="{{ old('validade') }}" placeholder="MM/AA" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">CVV</label>
                    <input type="text" class="form-control" name="cvv" value="{{ old('cvv') }}" placeholder="123" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nome no Cartão</label>
                    <input type="text" class="form-control" name="nome_cartao" value="{{ old('nome_cartao') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipo de Cartão</label>
                    <select class="form-select" name="tipo_cartao" required>
                        <option selected disabled>Selecione</option>
                        <option value="credito" {{ old('tipo_cartao')=='credito' ? 'selected' : '' }}>Crédito</option>
                        <option value="debito" {{ old('tipo_cartao')=='debito' ? 'selected' : '' }}>Débito</option>
                    </select>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Finalizar Cadastro</button>
            </div>
        </form>
    </div>
</body>
</html>
