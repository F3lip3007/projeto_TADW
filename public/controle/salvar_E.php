<?php

require_once "./conexao.php";
require_once "./func.php";

$rua = $_POST['rua'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];
$complemento = $_POST['complemento'];
$tb_id_usuario = "1";

salvarEndereco($conexao, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario);

?>