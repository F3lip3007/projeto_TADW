<?php
    require_once "../conexao.php";
    require_once "../func.php";

$id_venda = "";
$cupom = "";
$valor_venda = "";
$tb_id_cliente = "";

salvarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente);


?>