<?php
require_once "../conexao.php";
require_once "../func.php";

$id_endereco = "1";
$rua = "1";
$cep = "111111111";
$numero ="1";
$bairro = "aaa";
$estado = "aaa";
$complemento = "aaaa";
$tb_id_usuario = "1";




editarEndereco($conexao, $id_endereco, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario);
    

?>  