<?php

require_once "../conexao.php";
require_once "../func.php";

$id_usuario = 1;
$foto = "gggggggg";
$email = "asasaaaa";
$senha = "bbbbaaasda";
$isadmin = "4";
$tb_id_cliente = 5;
$tb_id_funcionario = 6;

$idusuario = editarUsuario($conexao, $id_usuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $tb_id_funcionario);


?>