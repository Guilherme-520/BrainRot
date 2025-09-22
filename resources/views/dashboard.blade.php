<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguradora - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar simples -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BRAINROT</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>

                    <!-- Botão sair -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container my-4">
        <h2 class="mb-4">Meu Dashboard</h2>

        <!-- Resumo das Apólices -->
        <div class="row">
            @foreach ($polices as $policy)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $policy['tipo'] }}</h5>
                            <p><strong>Nº Apólice:</strong> {{ $policy['numero'] }}</p>
                            <p><strong>Status:</strong> {{ $policy['status'] }}</p>
                            <p><strong>Vigência:</strong> {{ $policy['vigencia'] }}</p>
                            <p><strong>Valor:</strong> R$ {{ number_format($policy['valor'], 2, ',', '.') }}</p>

                            @if ($policy['tipo'] === 'Automóvel')
                                <p><strong>Veículo:</strong> {{ $policy['detalhes']['modelo'] }} ({{ $policy['detalhes']['placa'] }})</p>
                                <p><strong>Assistências:</strong> {{ implode(', ', $policy['detalhes']['assistencia']) }}</p>
                            @elseif ($policy['tipo'] === 'Residencial')
                                <p><strong>Endereço:</strong> {{ $policy['detalhes']['endereco'] }}</p>
                                <p><strong>Serviços:</strong> {{ implode(', ', $policy['detalhes']['servicos']) }}</p>
                            @elseif ($policy['tipo'] === 'Vida')
                                <p><strong>Cobertura:</strong> {{ $policy['detalhes']['cobertura'] }}</p>
                                <p><strong>Beneficiários:</strong> {{ implode(', ', $policy['detalhes']['beneficiarios']) }}</p>
                            @endif
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary btn-sm">Ver Detalhes</a>
                            <a href="#" class="btn btn-success btn-sm">Renovar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Área Financeira -->
        <h3 class="mt-5">Meus Pagamentos</h3>
        <table class="table table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Mês</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagamentos as $p)
                    <tr>
                        <td>{{ $p['mes'] }}</td>
                        <td>R$ {{ number_format($p['valor'], 2, ',', '.') }}</td>
                        <td>{{ $p['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Ações rápidas -->
        <div class="mt-4 d-flex gap-3">
            <a href="#" class="btn btn-outline-primary">Acionar Sinistro</a>
            <a href="#" class="btn btn-outline-secondary">Solicitar Assistência</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
