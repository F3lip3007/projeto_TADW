<?php
    
require_once "../conexao.php";
require_once "../func.php";

$cupom = "1";
$valor_venda = "1";
$tb_id_cliente = "1";

salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente);


?>