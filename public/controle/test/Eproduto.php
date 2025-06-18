<?php
require_once "../conexao.php";
require_once "../func.php";

$produto = "aaaaaaaaaaaaaaa";
$tamanho = "pp";
$valor = 100;
$estoque = 100;
$desconto = 2;
$descricao = "aaaaaaaaaaaaaa";
$avaliacao = 5;
$comentario ="aaaaaaaaaaaaaaaaaaaa";
$tipo = "moleton";
$id_produto = 1;



editarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo,$id_produto);

?>