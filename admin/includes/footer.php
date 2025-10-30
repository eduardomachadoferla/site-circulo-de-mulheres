<?php
session_start(); // Inicia a sessão
include('admin/includes/config.inc.php'); // Está correto se o caminho estiver certo


// Exemplo de array de cursos (pode ser carregado do banco de dados)
$courses = [
    [
        'titulo' => 'Liderança Feminina',
        'descricao' => 'Desenvolva habilidades de liderança e aprenda a se posicionar no ambiente profissional.',
        'imagem' => 'img/img/lideranca.jpeg',
        'duracao' => '8 semanas',
        'avaliacao' => '4.9',
        'preco' => 997
    ],
    [
        'titulo' => 'Inteligência Emocional',
        'descricao' => 'Aprenda a gerenciar suas emoções e desenvolver relacionamentos mais saudáveis.',
        'imagem' => 'img/img/int.jpeg',
        'duracao' => '6 semanas',
        'avaliacao' => '4.8',
        'preco' => 797
    ],
    [
        'titulo' => 'Comunicação Assertiva',
        'descricao' => 'Desenvolva sua comunicação e aprenda a se expressar com confiança e clareza.',
        'imagem' => 'img/img/comu.jpeg',
        'duracao' => '4 semanas',
        'avaliacao' => '4.7',
        'preco' => 597
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel Administrativo - Circulo de Mulheres</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<style>
/* Estilos básicos do painel admin */
body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0; }
header { background-color: #ff4da6; color: #fff; padding: 15px; display: flex; justify-content: space-between; align-items: center; }
header h1 { margin: 0; }
.navbar a { color: #fff; text-decoration: none; margin-left: 15px; }
.container { max-width: 1200px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; }
.course-list { display: flex; gap: 20px; flex-wrap: wrap; }
.course-item { border: 1px solid #ddd; border-radius: 8px; padding: 10px; width: 30%; background-color: #fafafa; }
.course-item img { width: 100%; border-radius: 5px; }
.course-item h3 { margin-top: 10px; }
.btn { padding: 8px 12px; background-color: #ff4da6; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
.btn:hover { background-color: #e33d8d; }
.user-greeting { font-weight: bold; margin-right: 15px; }
</style>
</head>
<body>

<header>
    <h1>Painel Administrativo</h1>
    <div>
        <?php if(isset($_SESSION['name'])): ?>
            <span class="user-greeting">Olá, <?= htmlspecialchars($_SESSION['name']); ?> 👋</span>
            <a class="btn" href="logim/logout.php">Sair</a>
        <?php else: ?>
            <a class="btn" href="logim/index.php">Logar</a>
        <?php endif; ?>
    </div>
</header>

<div class="container">
    <h2>Cursos Disponíveis</h2>
    <div class="course-list">
        <?php foreach($courses as $course): ?>
            <div class="course-item">
                <img src="<?= $course['imagem']; ?>" alt="<?= htmlspecialchars($course['titulo']); ?>">
                <h3><?= htmlspecialchars($course['titulo']); ?></h3>
                <p><?= htmlspecialchars($course['descricao']); ?></p>
                <p>Duração: <?= htmlspecialchars($course['duracao']); ?></p>
                <p>Avaliação: ⭐ <?= htmlspecialchars($course['avaliacao']); ?></p>
                <p>Preço: R$ <?= number_format($course['preco'], 2, ',', '.'); ?></p>
                <button class="btn">Editar</button>
                <button class="btn">Excluir</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer style="text-align:center; padding:15px; background:#ff4da6; color:#fff;">
    &copy; 2025 Circulo De Mulheres - Painel Administrativo
</footer>

</body>
</html>
