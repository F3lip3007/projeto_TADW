<?php
require_once "../conexao.php";
require_once "../func.php";

$rua = "11";
$cep = "01000-000";
$numero = "11111";
$bairro = "aaaaaaaaa";
$estado = "aaaaa";
$complemento = "aaaaaaa";
$tb_id_usuario = "1";

salvarEndereco($conexao, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario);
        
?>