<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idproduto = 2;

echo "<pre>";
print_r(pesquisarProdutoPorId($conexao, $id_produto));
echo "</pre>";
?>