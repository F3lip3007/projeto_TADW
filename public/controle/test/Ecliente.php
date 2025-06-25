<?php
require_once "../conexao.php";
require_once "../func.php";

$id_cliente ="1";
$numero ="192738213";
$cpf ="210.000.000-00";

EditarCliente($conexao, $id_cliente, $numero, $cpf);

?>