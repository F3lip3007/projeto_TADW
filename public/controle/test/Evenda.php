<?php
require_once "../conexao.php";
require_once "../func.php";

$id_venda = 1;
$cupom = 3;
$valor_venda= 1;
$td_id_cliente = 1;

editarVenda($conexao, $id_venda, $cupom, $valor_venda, $td_id_cliente);

?>  