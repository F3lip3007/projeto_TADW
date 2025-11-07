<?php
require_once "../conexao.php";
require_once "../func.php";


a=salvarCliente($conexao);
$nome = "foto.png";
$tb_id_produto = 1;

salvarFoto($conexao, $nome, $tb_id_produto);
?>