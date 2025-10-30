<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit();
}

// Se chegou aqui, o usuário está logado e você pode continuar com a exibição do perfil
include('includes/header.php');
?>

<!-- HTML para a página de perfil -->

<?php include('includes/footer.php'); ?>
