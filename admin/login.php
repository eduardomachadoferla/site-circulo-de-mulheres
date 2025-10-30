<?php

include('includes/config.inc.php');

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter nome de usuário e senha do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar o banco de dados para verificar se o usuário existe
    $sql = "SELECT * FROM administrators WHERE username = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    // Verificar se o usuário foi encontrado e verificar a senha
    if ($admin && password_verify($password, $admin['password'])) {
        // Autenticação bem-sucedida, criar sessão de admin
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        
        // Redirecionar para a página de administração
        header('Location: ./index.php');
        exit;
    } else {
        $error_message = "Nome de usuário ou senha incorretos.";
    }
}

$title = 'Área administrativa - Login';
$files = ['./css/logim.css'];
include('includes/header.php');
?>

<div class="login-container">
    <h2>Login de Administrador</h2>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="/login.php" method="post">
        <div class="input-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
</div>


