<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$foto = "11";
$email = "aaaaa";
$senha = "aaaa";
$isadmin = "11";
$tb_id_cliente = "1";
$tb_id_funcionario = "1";

$idusuario = salvarUsuario($conexao, $foto, $email, $senha, $isadmin, $tb_id_cliente, $tb_id_funcionario);

echo $idusuario;

?>