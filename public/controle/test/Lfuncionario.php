<?php
require_once "../conexao.php";
require_once "../func.php";

$idfuncionario = "1";
$salario = "1111";
$cpf = "111.111.111.11";
$data_nacimento = "11/11/2000";

echo"<pre>";
print_r(listarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento));
echo"</pre>";
?>