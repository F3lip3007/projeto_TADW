<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = "1";
$foto = "11";
$email = "aaaaa";
$senha = "aaaa";
$isadmin = "11a";
$tb_id_cliente = "11";
$tb_id_funcionario = "11";

$idusuario = salvarUsuario($conexao, $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario);

echo $idusuario;

?>