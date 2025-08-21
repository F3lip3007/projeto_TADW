<?php

require_once "../conexao.php";
require_once "../func.php";

$id_usuario = 1;
$foto = "ggggg";
$email = "asas";
$senha = "bbbbaaa";
$isadmin = 1;
$tb_id_cliente = 1;
$tb_id_funcionario = 1;

$idusuario = editarUsuario($conexao, $id_usuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $tb_id_funcionario);


?>