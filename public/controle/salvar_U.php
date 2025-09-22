<?php
require_once "./conexao.php";
require_once "./func.php";

$numero = $_POST['numero'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$foto ="test";
// todo isafmin = 1 e um cliente
$isadmin = 1;

// $foto = $_POST['foto'];


$id_usuario=salvarUsuario($conexao, $foto, $email, $senha, $isadmin, $nome );  
salvarCliente($conexao, $numero, $nome, $cpf, $id_usuario);

header("Location: ../controle/area_cliente.php");


?>