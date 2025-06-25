<?php

require_once "../conexao.php";
require_once "../funcoes.php";

 $idfuncionario = "1";
 $salario = "1111";
 $cpf = "111.111.111.11";
 $data_nacimento = "11/11/2000";

$idfuncionario = deletarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento);

echo $idusuario;

?>