<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainrot Company - Seguros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url("https://cdne-institucionalicatu-prd.azureedge.net/cms/2025/07/familia-feliz-brincando-em-casa.png") no-repeat center center;
            background-size: cover;
            color: white;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .card-body {
            padding: 2rem;
        }
    </style>
</head>
<body class="bg-light text-dark">

    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="m-0">Brainrot Company</h2>
            <div>
                <a href="/register" class="btn btn-outline-light me-2">Cadastro</a>
                <a href="/login" class="btn btn-primary">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero / Imagem com slogan -->
    <section class="hero">
        <div class="text-center">
            <h1 class="fw-bold">Brainrot Company</h1>
            <p class="fs-4">A segurança da sua vida e do seu patrimônio em boas mãos.</p>
        </div>
    </section>

   <!-- Nossos Seguros -->
<section class="container my-5">
    <h2 class="text-center mb-5 fw-bold">Nossos Seguros</h2>
    <div class="row text-center g-4">
        <!-- Seguro de Vida -->
        <div class="col-md-4">
            <div class="card shadow-sm p-4 h-100 border-primary">
                <h3 class="mb-3">Vida</h3>
                <p>Proteção completa para você e sua família. Nosso seguro de vida garante tranquilidade financeira nos momentos mais importantes e cobre:</p>
                <ul class="text-start">
                    <li><strong>Indenização em caso de falecimento:</strong> garante estabilidade financeira para os beneficiários.</li>
                    <li><strong>Invalidez total ou permanente:</strong> suporte em caso de acidentes que impeçam o trabalho.</li>
                    <li><strong>Doenças graves:</strong> câncer, AVC ou infarto, com pagamento antecipado para ajudar no tratamento.</li>
                    <li><strong>Assistência funeral:</strong> suporte logístico e financeiro para a família.</li>
                    <li><strong>Serviços de orientação e assistência familiar:</strong> aconselhamento psicológico e suporte jurídico em situações críticas.</li>
                </ul>
                <p class="mt-3">Com o seguro de vida da Brainrot Company, você protege quem mais ama, garantindo segurança e tranquilidade.</p>
            </div>
        </div>

        <!-- Seguro Automóvel -->
        <div class="col-md-4">
            <div class="card shadow-sm p-4 h-100 border-success">
                <h3 class="mb-3">Automóvel</h3>
                <p>Proteção completa para o seu carro e sua mobilidade. Nosso seguro de automóvel cobre:</p>
                <ul class="text-start">
                    <li><strong>Colisão e danos ao veículo:</strong> reparos em caso de acidentes, independente de culpa.</li>
                    <li><strong>Roubo ou furto total:</strong> indenização rápida e justa.</li>
                    <li><strong>Incêndio ou explosão:</strong> cobertura de danos causados por fogo.</li>
                    <li><strong>Danos a terceiros:</strong> responsabilidade civil em acidentes envolvendo outros veículos ou pessoas.</li>
                    <li><strong>Assistência 24h:</strong> reboque, chaveiro, guincho, pane seca e atendimento emergencial.</li>
                    <li><strong>Carro reserva:</strong> disponível em caso de reparos prolongados ou sinistro.</li>
                </ul>
                <p class="mt-3">Nosso seguro de automóvel combina segurança, conforto e assistência completa para você dirigir sem preocupações.</p>
            </div>
        </div>

        <!-- Seguro Residencial -->
        <div class="col-md-4">
            <div class="card shadow-sm p-4 h-100 border-warning">
                <h3 class="mb-3">Residencial</h3>
                <p>Proteção total para o seu lar e patrimônio. Nosso seguro residencial cobre:</p>
                <ul class="text-start">
                    <li><strong>Incêndio, queda de raio e explosão:</strong> indenização pelos danos à estrutura da casa.</li>
                    <li><strong>Roubo e furto qualificado:</strong> proteção de móveis, eletrônicos e bens de valor.</li>
                    <li><strong>Danos elétricos e hidráulicos:</strong> curtos-circuitos, vazamentos e problemas de encanamento.</li>
                    <li><strong>Responsabilidade civil familiar:</strong> cobertura de danos a terceiros dentro ou fora da residência.</li>
                    <li><strong>Assistência 24h:</strong> chaveiro, encanador, eletricista e serviços emergenciais.</li>
                    <li><strong>Itens de alto valor (opcional):</strong> obras de arte, joias e equipamentos eletrônicos.</li>
                </ul>
                <p class="mt-3">O seguro residencial da Brainrot Company garante segurança, conforto e proteção para você e sua família dentro de casa.</p>
            </div>
        </div>
    </div>
</section>

    <!-- Planos de Seguro -->
    <section class="bg-white py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nossos Planos</h2>
            <div class="row text-center">
                <!-- Plano Básico -->
                <div class="col-md-4">
                    <div class="card border-primary shadow-sm p-4">
                        <h3>Básico</h3>
                        <p>Cobertura apenas dos principais tipos: Vida, Automóvel e Residencial.</p>
                        <p><strong>R$ 49,90/mês</strong></p>
                        <button class="btn btn-primary">Contratar</button>
                    </div>
                </div>
                <!-- Plano Intermediário -->
                <div class="col-md-4">
                    <div class="card border-success shadow-sm p-4">
                        <h3>Intermediário</h3>
                        <p>Cobre os principais + adicionais como Saúde e Viagem.</p>
                        <p><strong>R$ 99,90/mês</strong></p>
                        <button class="btn btn-success">Contratar</button>
                    </div>
                </div>
                <!-- Plano Premium -->
                <div class="col-md-4">
                    <div class="card border-warning shadow-sm p-4">
                        <h3>Premium</h3>
                        <p>Cobertura completa incluindo todos os tipos de seguros disponíveis.</p>
                        <p><strong>R$ 199,90/mês</strong></p>
                        <button class="btn btn-warning">Contratar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Brainrot Company - Todos os direitos reservados.</p>
    </footer>

</body>
</html>
<?php /**PATH /Users/guilhermecordeiro/Projects/BrainRot/resources/views/welcome.blade.php ENDPATH**/ ?>