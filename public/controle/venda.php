<?php
session_start();
// $id_u=$_SESSION['id_usuario'];
$tb_id_cliente=$_SESSION['id_cliente'];
// echo$id_u;


require_once "./conexao.php";
require_once "./func.php";

$id_produto= $_POST['id_produto'];

$quantidade= $_POST['quantidade'];

$produto=listarProduto($conexao);

foreach ($produto as $prod)   {
    if ($prod['id_produto'] == $id_produto) {
        $valor_unitario = $prod['valor'];
        break;
    }
}

$valor_venda = $valor_unitario * $quantidade;



$cupom = 0;

$id_venda=salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente);
echo$id_venda;

// mecher depois




    
$id_venda=salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente);


salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade);

?>  







