<?php
require_once "../conexao.php";
require_once "../func.php";

$id_venda = 41;
$cupom = "2";
$valor_venda= "2";
$td_id_cliente = 1 ;

editarVenda($conexao, 
$id_venda, 
$cupom,
$valor_venda,
$td_id_cliente);

?>  