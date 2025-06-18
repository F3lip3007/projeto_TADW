<?php
require_once "../conexao.php";
require_once "../func.php";

echo "<pre>";
print_r(listarProduto($conexao));
echo "</pre>";

?>