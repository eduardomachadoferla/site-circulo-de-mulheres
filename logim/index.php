<?php
include('../admin/includes/config.inc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login e Cadastro</title>
    <link rel="stylesheet" href="../logim/style.css">
   
</head>

<body>

    <div class="container">
        <div class="form-container sign-up-container">
            <form action="cadastrar.php" method="post">
                <h1>Cadastre-se</h1>
                <input id="nome" name="nome" type="text" placeholder="Nome" />
                <input id="email" name="email" type="email" placeholder="Email" />
                <input id="senha" name="senha" type="password" placeholder="Senha" />
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id="loginForm" action="login.php" method="post">
                <h1>Login</h1>
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <input id="email" name="email" type="email" placeholder="Email" />
                <input id="password" name="password" type="password" placeholder="Senha" />
                <button type="button" id="loginButton">Entrar</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bem-vindo de volta a Modern Muse!</h1>
                    <p>Para continuar conectado, por favor faça o login</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bem vinda ao Circulo de mulheres!</h1>
                    <p>Insira seus dados e comece sua jornada conosco.</p>
                    <button class="ghost" id="signUp">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
    <a href="../index.php" class="main-button">INICIO</a>

    <div class="loading-overlay">
        <div class="loading-wave">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
    </div>

    <script>
        const signInButton = document.getElementById('signIn');
        const signUpButton = document.getElementById('signUp');
        const container = document.querySelector('.container');
        const loginButton = document.getElementById('loginButton');
        const loginForm = document.getElementById('loginForm');
        const loadingOverlay = document.querySelector('.loading-overlay');

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        loginButton.addEventListener('click', () => {
            loadingOverlay.style.display = 'flex';
            setTimeout(() => {
                loginForm.submit();
            }, 3000);
        });
    </script>
</body>

</html>