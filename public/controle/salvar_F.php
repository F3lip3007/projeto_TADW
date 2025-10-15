<?php

require_once "./conexao.php";
require_once "./func.php";


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$salario= $_POST['salario'];
$cpf= $_POST['cpf'];


$data_nascimento= $_POST['data_nascimento'];






$foto ="test";

// todo isafmin = 1 e um cliente
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$isadmin = 2;

// $foto = $_POST['foto'];


$id_usuario=salvarUsuario($conexao, $foto, $email, $senha_hash, $isadmin, $nome );  

// var_dump($id_usuario);
// die;

salvarFuncionario($conexao, $salario, $cpf, $data_nascimento);


header("Location: ../area_funcionario.php");

?>