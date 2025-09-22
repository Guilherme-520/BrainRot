<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Brainrot Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background: #f5f5f5;
        }
        .login-row {
            height: 100vh;
        }
        .login-left {
            background: url('https://www.shutterstock.com/image-vector/insurance-concept-illustration-male-agent-600nw-2468716257.jpg') no-repeat center center;
            background-size: cover;
        }
        .login-right {
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
        }
        .login-box {
            width: 90%;
            max-width: 600px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }
        .google-btn {
            color: black;
            border: none;
        }
        .google-btn:hover {
            color: blue;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row login-row">

        <!-- Lado esquerdo: Imagem -->
        <div class="col-md-6 login-left d-none d-md-block"></div>

        <!-- Lado direito: Formulário -->
        <div class="col-md-6 login-right">
            <div class="login-box">
                <h3 class="text-center mb-4">Entrar na Brainrot Company</h3>

                <!-- Exibir erros -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seuemail@exemplo.com" required>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <!-- Lembrar-me -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Lembrar-me</label>
                    </div>

                    <!-- Botão -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                </form>

                <!-- Login com Google (não funcional ainda) -->
                <div class="d-grid mb-3">
                    <button class="btn google-btn w-100">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" class="me-2"/> Entrar com Google
                    </button>
                </div>

                <!-- Links -->
                <div class="text-center">
                    <a href="{{ route('register') }}">Criar conta</a> |
