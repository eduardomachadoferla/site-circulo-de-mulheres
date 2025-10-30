<?php
session_start();
include('../admin/includes/config.inc.php');
include('../admin/includes/conexao.php');

if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    header('Location: ' . BASE_URL . 'logim/index.php');
    exit;
}

$password = password_hash($_POST['senha'], PASSWORD_BCRYPT, ["cost" => 12]);

$sql = "INSERT INTO usuario (Nome, Email, Senha) VALUES (:nome, :email, :password)";
$insert_data = $pdo->prepare($sql);
$insert_data->bindParam(':nome', $_POST['nome']);
$insert_data->bindParam(':email', $_POST['email']);
$insert_data->bindParam(':password', $password);

if ($insert_data->execute()) {
    $_SESSION['msg'] = '<p style="color:green;">Cadastro realizado! Faça login.</p>';
    header('Location: ' . BASE_URL . 'logim/index.php');
} else {
    $_SESSION['msg'] = '<p style="color:red;">Erro ao cadastrar. Tente novamente.</p>';
    header('Location: ' . BASE_URL . 'logim/index.php');
}
exit;
