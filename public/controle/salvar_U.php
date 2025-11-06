<?php
session_start();

require_once "./conexao.php";
require_once "./func.php";

$numero = $_POST['numero'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$foto ="test";

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// todo isafmin = 1 e um cliente

$isadmin = 1;

// $foto = $_POST['foto'];












$id_usuario=salvarUsuario($conexao, $foto, $email, $senha_hash, $isadmin, $nome );  

// var_dump($id_usuario);
// die;

$id_cliente=salvarCliente($conexao, $numero, $cpf, $id_usuario);



$_SESSION['id_cliente'] = $id_cliente;
$_SESSION['id_usuario'] = $id_usuario;

header("Location:verificar_U.php");






?>