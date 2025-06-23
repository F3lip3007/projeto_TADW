<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 12;
$numero = 62984190231;
$cpf= 333.333.333-33;
$id = "";

deletarCliente($conexao, $idcliente, $numero, $cpf);

?>