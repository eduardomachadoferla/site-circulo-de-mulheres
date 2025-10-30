<?php
session_start(); // Inicia a sessão
include('admin/includes/config.inc.php'); // Inclui config
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Circulo De Mulheres: um programa transformador dedicado ao desenvolvimento pessoal e profissional feminino.">
    <meta name="author" content="Equipe Circulo De Mulheres">
    <link rel="stylesheet" href="css/animaçoes.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inport.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>Circulo de mulheres</title>

    <style>
        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    flex-wrap: wrap;
}

.navbar .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 29px;
    font-weight: bold;
    color: #ff4da6;
}

.navbar .logo .logo-icon {
    width: 30px;
    height: auto;
}

/* Menu centralizado */
.navbar .menu {
    display: flex;
    gap: 25px;
    justify-content: center;
    flex: 1; 
}

.navbar .menu a {
    text-decoration: none;
    color: #333;
    font-size: 20px;
    font-family: 'Dancing Script', cursive;
    transition: color 0.3s ease;
}

.navbar .menu a:hover {
    color: #ff4da6;
    text-decoration: underline;
}

/* Área do usuário à direita */
.user-area {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-greeting {
    font-family: 'Dancing Script', cursive;
    font-weight: bold;
    color: #ff4da6;
    font-size: 1.1rem;
    white-space: nowrap;
}

.btn-sair {
    background-color: #ff4da6;
    color: #fff;
    padding: 6px 14px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: bold;
    transition: 0.3s;
}

.btn-sair:hover {
    background-color:  #ff4da6;
}

.btn-inscreva {
    padding: 10px 20px;
    background-color: #ff4da6;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-inscreva:hover {
    background-color: #e33d8d;
}

    </style>
</head>
<body>
<header class="navbar">
    <div class="logo" aria-label="Logo do Circulo De Mulheres">
        <img src="img/spa_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" alt="Flor" class="logo-icon">
        Circulo de Mulheres
    </div>

   <nav class="menu" aria-label="Menu principal">
    <a href="#inicio">Início</a>
    <a href="#sobre">Sobre</a>
    <a href="#modulos">Módulos</a>
    <a href="#depoimentos">Depoimentos</a>

    <?php if (isset($_SESSION['name'])) { ?>
        <a href="./perfis/perfil.php">Perfil</a>
    <?php } ?>
</nav>

<div class="user-area">
    <?php if (!isset($_SESSION['name'])) { ?>
        <a class="btn-inscreva" role="button" href="logim/index.php">Logar</a>
    <?php } else { ?>
        <span class="user-greeting">Olá, <?= htmlspecialchars($_SESSION['name']); ?> 👋</span>
    <?php } ?>
</div>

</header>

<main>
    <section class="hero" id="inicio">
        <h1 class="typing-animation">Desperte Seu <span>Potencial Interior</span></h1>
        <p class="typing-text" style="white-space: pre-wrap; text-align: center;">
            Um programa transformador dedicado ao desenvolvimento pessoal e profissional feminino.
            Descubra sua força interior e alcance seus objetivos.
        </p>
        <a href="https://wa.me/554599053635" class="btn-comecar" role="button">Começar Jornada</a>
    </section>

    <section class="courses" id="cursos">
        <h2>Cursos Disponíveis</h2>
        <p>Confira os cursos disponíveis para enriquecer sua jornada de autodesenvolvimento.</p>
        <div class="course-list">
            <article class="course-item">
                <img src="img/img/lideranca.jpeg" alt="Curso de Autoconhecimento" class="course-image">
                <h3>Liderança Feminina</h3>
                <p>Desenvolva habilidades de liderança e aprenda a se posicionar no ambiente profissional.</p>
                <div class="course-info">
                    <span>8 semanas</span>
                    <span>⭐ 4.9</span>
                </div>
                <div class="course-price">R$ 997</div>
                <button class="btn-course">Saiba Mais</button>
            </article>
            <article class="course-item">
                <img src="./img/img/int.jpeg" alt="Curso de Inteligência Emocional" class="course-image">
                <h3>Inteligência Emocional</h3>
                <p>Aprenda a gerenciar suas emoções e desenvolver relacionamentos mais saudáveis.</p>
                <div class="course-info">
                    <span>6 semanas</span>
                    <span>⭐ 4.8</span>
                </div>
                <div class="course-price">R$ 797</div>
                <button class="btn-course">Saiba Mais</button>
            </article>
            <article class="course-item">
                <img src="img/img/comu.jpeg" alt="Curso de Comunicação Assertiva" class="course-image">
                <h3>Comunicação Assertiva</h3>
                <p>Desenvolva sua comunicação e aprenda a se expressar com confiança e clareza.</p>
                <div class="course-info">
                    <span>4 semanas</span>
                    <span>⭐ 4.7</span>
                </div>
                <div class="course-price">R$ 597</div>
                <button class="btn-course">Saiba Mais</button>
            </article>
        </div>
    </section>

    <section id="depoimentos" class="testimonials">
        <h2 class="moduless">Depoimentos</h2>
        <p>Veja o que as participantes têm a dizer sobre o Circulo De Mulheres.</p>
        <div class="testimonial-list">
            <article class="testimonial-item">
                <img src="img/person_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Silhueta de uma pessoa" class="testimonial-avatar">
                <p>"Participar do Circulo De Mulheres foi uma experiência incrível. Sinto-me mais confiante e realizada!"</p>
                <footer>- Ana Clara</footer>
            </article>
            <article class="testimonial-item">
                <img src="img/person_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Silhueta de uma pessoa" class="testimonial-avatar">
                <p>"O curso me ajudou a descobrir meu propósito e a criar equilíbrio entre minha vida pessoal e profissional."</p>
                <footer>- Mariana Silva</footer>
            </article>
            <article class="testimonial-item">
                <img src="img/person_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Silhueta de uma pessoa" class="testimonial-avatar">
                <p>"Aprendi a liderar com autenticidade e a valorizar minha essência única. Recomendo a todas!"</p>
                <footer>- Júlia Almeida</footer>
            </article>
        </div>
    </section>
</main>

<footer class="footer">
    <h1 class="circulo">Circulo De Mulheres</h1>
    <h2>Transformando vidas através do autodesenvolvimento</h2>
    <p>&copy; Circulo De Mulheres. Todos os direitos reservados.</p>
</footer>
</body>
</html>
