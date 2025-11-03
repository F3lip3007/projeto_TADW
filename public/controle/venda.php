<?php
session_start();
$id_u=$_SESSION['id_usuario'];
$tb_id_cliente=$_SESSION['id_cliente'];

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

$id_venda=salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente)

salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade)
// mecher depois


foreach($produt as $iq){
    
    // echo "<pre>";
    // print_r($iq);   
    // echo "</pre>";
    
    // se existir um id
    if (isset($iq[0])) {
        foreach($valor as $v){
            if($iq[0] == $v['idproduto']) { // ta funcionamdo nao sei o pq na mecher //
                $divida = $iq[1] * $v['preco_venda'];
                    $valor_total= $valor_total + $divida;
            };
            }

        }else{};        
    
};
echo "<h1>$nome</h1>";
echo "<h2>$data</h2>";  
echo '$';
echo $valor_total;

    
$id_venda=salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente);


foreach ($produt as $p) {
    if(isset($p[0],$p[1]))
        salvarItemVenda($conexao, $id_venda, $p[0], $p[1]);
}

?>  

?>





