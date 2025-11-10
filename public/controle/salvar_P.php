<?php

require_once "./conexao.php";
require_once "./func.php";

$produto = $_POST['produto'];
$tamanho = $_POST['tamanho'];
$valor = $_POST['valor'];
$estoque = $_POST['estoque'];
$desconto = $_POST['desconto'];
$descricao = $_POST['descricao'];
$avaliacao = $_POST['avaliacao'];
$comentario = $_POST['comentario'];
$tipo = $_POST['tipo'];
$idUsuario = $_SESSION['id_usuario'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];


// pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gera um novo nome para o arquivo
$novo_nome = uniqid() . "./fotos" . $extensao;

//criando um novo caminho para o arquivo (usando o endereço da página)
//lembre-se de criar a pasta "fotos/" dentro da pasta "codigo".
//deve ajustar as permissões da pasta "fotos".
$caminho_destino = "./fotos" . $novo_nome;

//movendo o arquivo para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);


$idproduto = salvarProduto($conexao, $produto, $tamanho, $valor, $estoque, $desconto, $descricao, $avaliacao, $comentario, $tipo);

salvarFoto($conexao, $nome, $tb_id_produto);

header("Location:listaproduto.php");
