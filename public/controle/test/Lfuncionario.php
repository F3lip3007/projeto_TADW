<?php
require_once "../conexao.php";
require_once "../func.php";

echo"<pre>";
print_r(listarFuncionario($conexao));
echo"</pre>";

?>
