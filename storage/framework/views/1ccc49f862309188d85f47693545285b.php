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
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
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
            <?php $__currentLoopData = $polices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($policy['tipo']); ?></h5>
                            <p><strong>Nº Apólice:</strong> <?php echo e($policy['numero']); ?></p>
                            <p><strong>Status:</strong> <?php echo e($policy['status']); ?></p>
                            <p><strong>Vigência:</strong> <?php echo e($policy['vigencia']); ?></p>
                            <p><strong>Valor:</strong> R$ <?php echo e(number_format($policy['valor'], 2, ',', '.')); ?></p>

                            <?php if($policy['tipo'] === 'Automóvel'): ?>
                                <p><strong>Veículo:</strong> <?php echo e($policy['detalhes']['modelo']); ?> (<?php echo e($policy['detalhes']['placa']); ?>)</p>
                                <p><strong>Assistências:</strong> <?php echo e(implode(', ', $policy['detalhes']['assistencia'])); ?></p>
                            <?php elseif($policy['tipo'] === 'Residencial'): ?>
                                <p><strong>Endereço:</strong> <?php echo e($policy['detalhes']['endereco']); ?></p>
                                <p><strong>Serviços:</strong> <?php echo e(implode(', ', $policy['detalhes']['servicos'])); ?></p>
                            <?php elseif($policy['tipo'] === 'Vida'): ?>
                                <p><strong>Cobertura:</strong> <?php echo e($policy['detalhes']['cobertura']); ?></p>
                                <p><strong>Beneficiários:</strong> <?php echo e(implode(', ', $policy['detalhes']['beneficiarios'])); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary btn-sm">Ver Detalhes</a>
                            <a href="#" class="btn btn-success btn-sm">Renovar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $pagamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($p['mes']); ?></td>
                        <td>R$ <?php echo e(number_format($p['valor'], 2, ',', '.')); ?></td>
                        <td><?php echo e($p['status']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /Users/guilhermecordeiro/Projects/BrainRot/resources/views/dashboard.blade.php ENDPATH**/ ?>