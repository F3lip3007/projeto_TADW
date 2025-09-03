<?php

require_once "./conexao.php";
require_once "./func.php";


$numero = $_POST['numero'];
$cpf = $_POST['cpf'];

salvarCliente($conexao, $numero, $cpf);

?>