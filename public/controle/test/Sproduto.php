<?php
require_once "../conexao.php";
require_once "../func.php";

$produto="blusa";
$tamanho="GG";
$valor=10;
$estoque=10;
$desconto=0;
$descricao="hghgfhgf";
$avaliacao=1;
$comentatio="fhgfhf";   
$tipo="ropa";


salvarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentatio,$tipo);
        

?>