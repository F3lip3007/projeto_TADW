<?php

require_once "./conexao.php";
require_once "./func.php";

$salario= $_POST['salario'];
$cpf= $_POST['cpf'];
$data_nascimento= $_POST['data_nascimento'];


salvarFuncionario($conexao, $salario, $cpf, $data_nascimento);
        

?>