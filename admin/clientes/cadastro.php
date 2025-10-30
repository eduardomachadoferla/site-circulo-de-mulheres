
<?php
include('../includes/config.inc.php');
include('../includes/conexao.php');

$sql = "INSERT INTO clientes (nome, email, 'senha') VALUES (:nome, :email, ':senha')";
 
$insert_data = $pdo->prepare($sql);
$insert_data->bindParam(':nome',$_POST['nome']);
$insert_data->bindParam(':email',$_POST['email']);
$insert_data->bindParam(':senha',$_POST['senha']);
 
if($insert_data->execute()){
    $_SESSION['msg'] = '<p style="color:green,backgroud:#fff;"> Seus dados foram salvos.</p>';
    header('locatios:' . BASE_ADMIN . 'usuarios/formulário.php');
}else{
    $_SESSION['msg'] = '<p style="color:tomato;background:#fff;"> Não foi possível enviar suas informações, verifique e tente novamente.</p>';
    header('locatios:' . BASE_ADMIN . 'usuarios/formulario.php');
}