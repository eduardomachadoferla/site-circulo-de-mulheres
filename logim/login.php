<?php
session_start();
include('../admin/includes/config.inc.php');
include('../admin/includes/conexao.php');

if (!isset($_POST['email'], $_POST['password'])) {
    header('Location: ' . BASE_URL . 'logim/index.php');
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE Email = :email";
$select_data = $pdo->prepare($sql);
$select_data->bindParam(':email', $email);
$select_data->execute();
$user = $select_data->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['Senha'])) {
    $_SESSION['name'] = $user['Nome'];
    $_SESSION['email'] = $user['Email'];
    header("Location: " . BASE_URL . "index.php"); 
    exit;
} else {
    $_SESSION["error"] = '<p style="color:red;">Email ou senha incorretos.</p>';
    header("Location: " . BASE_URL . "logim/index.php");
    exit;
}
