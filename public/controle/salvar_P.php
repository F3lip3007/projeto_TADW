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











$idproduto = salvarProduto($conexao, $produto, $tamanho, $valor, $estoque, $desconto, $descricao, $avaliacao, $comentario, $tipo);

salvarFoto($conexao, $nome, $tb_id_produto);

// header("Location:listaproduto.php");
