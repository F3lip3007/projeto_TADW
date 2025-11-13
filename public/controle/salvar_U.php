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


$isadmin = 1;



$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// todo isafmin = 1 e um cliente


$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

// pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gera um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criando um novo caminho para o arquivo (usando o endereço da página)
//lembre-se de criar a pasta "fotos/" dentro da pasta "codigo".
//deve ajustar as permissões da pasta "fotos".
$caminho_destino = "fotoscliente/" . $novo_nome;

//movendo o arquivo para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);

// echo $caminho_destino  ;


    



$id_usuario=salvarUsuario($conexao, $novo_nome, $email, $senha_hash, $isadmin, $nome );  


// var_dump($id_usuario);
// die;

$id_cliente=salvarCliente($conexao, $numero, $cpf, $id_usuario);



$_SESSION['id_cliente'] = $id_cliente;
$_SESSION['id_usuario'] = $id_usuario;

header("Location:verificar_U.php");






?>