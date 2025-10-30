<?php

$name = $_POST['nome'];
$email = $_POST['email'];
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
echo '<link rel="stylesheet" type="text/css" href="styles.css">';
echo '<div class="container">';
if ($conn->query($sql) === TRUE) {
    echo '<div class="message success">Novo registro criado com sucesso</div>';
} else {
    echo '<div class="message error">Erro: ' . $conn->error . '</div>';
}
echo '</div>';
$conn->close();

