<?php
include 'includes/conf.ini.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID']; =
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $profileImage = $_FILES['profileImage'];

    // Verificar se uma nova imagem de perfil foi enviada
    if ($profileImage['size'] > 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($profileImage["name"]);
        move_uploaded_file($profileImage["tmp_name"], $targetFile);

        // Atualizar a imagem de perfil no banco de dados
        $sql = "UPDATE Usuario SET Email='$email', Endereco='$address' WHERE UserID='$userID'";
    } else {
        // Atualizar apenas os outros dados
        $sql = "UPDATE Usuario SET Email='$email', Endereco='$address' WHERE UserID='$userID'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Perfil atualizado com sucesso";
    } else {
        echo "Erro ao atualizar perfil: " . $conn->error;
    }

    $conn->close();
}
?>
