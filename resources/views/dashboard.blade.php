<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seguradora - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Pequenos ajustes visuais */
        .card-title {
            font-weight: 600;
        }
        .policy-value {
            font-size: .95rem;
        }
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .small-muted {
            font-size: .85rem;
            color: #6c757d;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar simples -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BRAINROT</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
                    aria-controls="navMain" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-2">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>

                    <!-- Botão sair -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>

                        <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           title="Sair da conta">
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container my-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-0">Meu Dashboard</h2>
               @if(isset($user[0]))
    <div class="small-muted">Bem-vindo, <strong>{{ $user[0]->nome }}</strong></div>
@endif



            </div>

            <div class="d-flex gap-2">
                <a href="#" class="btn btn-outline-primary btn-sm">Novo Pedido</a>
                <a href="#" class="btn btn-outline-secondary btn-sm">Central de Ajuda</a>
            </div>
        </div>

        {{-- Resumo das Apólices --}}
        <h4 class="mb-3">Minhas Apólices</h4>

        @if(count($polices) === 0)
            <div class="alert alert-info">Nenhuma apólice encontrada.</div>
        @else
            <div class="row">
                @foreach ($polices as $policy)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">{{ $policy['tipo'] }}</h5>
                                    @php
                                        $status = strtolower($policy['status'] ?? '');
                                        $badgeClass = $status === 'ativo' ? 'bg-success' : ($status === 'vencido' ? 'bg-danger' : 'bg-secondary');
                                    @endphp
                                    <span class="badge {{ $badgeClass }} text-white small">{{ $policy['status'] }}</span>
                                </div>

                                <p class="mb-1 small-muted"><strong>Nº:</strong> <span class="truncate">{{ $policy['numero'] }}</span></p>
                                <p class="mb-1 small-muted"><strong>Vigência:</strong> {{ \Carbon\Carbon::parse($policy['vigencia'])->format('d/m/Y') }}</p>

                                <p class="policy-value mb-2"><strong>Valor:</strong> R$ {{ number_format($policy['valor'], 2, ',', '.') }}</p>

                                {{-- Detalhes por tipo --}}
                                <div class="mt-2 small">
                                    @if ($policy['tipo'] === 'Automóvel')
                                        <p class="mb-1"><strong>Veículo:</strong> {{ $policy['detalhes']['modelo'] ?? '-' }} <span class="small-muted">({{ $policy['detalhes']['placa'] ?? '-' }})</span></p>
                                        <p class="mb-0"><strong>Assistências:</strong> {{ isset($policy['detalhes']['assistencia']) ? implode(', ', $policy['detalhes']['assistencia']) : '-' }}</p>
                                    @elseif ($policy['tipo'] === 'Residencial')
                                        <p class="mb-1"><strong>Endereço:</strong> {{ $policy['detalhes']['endereco'] ?? '-' }}</p>
                                        <p class="mb-0"><strong>Serviços:</strong> {{ isset($policy['detalhes']['servicos']) ? implode(', ', $policy['detalhes']['servicos']) : '-' }}</p>
                                    @elseif ($policy['tipo'] === 'Vida')
                                        <p class="mb-1"><strong>Cobertura:</strong> {{ $policy['detalhes']['cobertura'] ?? '-' }}</p>
                                        <p class="mb-0"><strong>Beneficiários:</strong> {{ isset($policy['detalhes']['beneficiarios']) ? implode(', ', $policy['detalhes']['beneficiarios']) : '-' }}</p>
                                    @else
                                        <p class="mb-0 small-muted">Detalhes indisponíveis.</p>
                                    @endif
                                </div>

                                <div class="mt-auto pt-3 border-top">
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Substitua # pelas rotas reais (ex: route('policies.show', $policy['numero'])) --}}
                                        <a href="#" class="btn btn-primary btn-sm">Ver Detalhes</a>
                                        <a href="#" class="btn btn-success btn-sm">Renovar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Área Financeira --}}
        <div class="mt-5">
            <h4 class="mb-3">Meus Pagamentos</h4>

            @if(count($pagamentos) === 0)
                <div class="alert alert-info">Nenhum pagamento cadastrado.</div>
            @else
                <div class="table-responsive shadow-sm">
                    <table class="table table-striped mb-0">
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
                                    <td>
                                        @php
                                            $pStatus = strtolower($p['status']);
                                            $pBadge = $pStatus === 'pago' ? 'bg-success' : ($pStatus === 'pendente' ? 'bg-warning text-dark' : 'bg-secondary');
                                        @endphp
                                        <span class="badge {{ $pBadge }}">{{ $p['status'] }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Ações rápidas --}}
        <div class="mt-4 d-flex gap-3">
            <a href="#" class="btn btn-outline-primary">Acionar Sinistro</a>
            <a href="#" class="btn btn-outline-secondary">Solicitar Assistência</a>
            <a href="#" class="btn btn-outline-info">Fale com um Corretor</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
