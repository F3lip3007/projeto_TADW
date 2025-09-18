<?php

require_once './controle/conexao.php';
require_once './controle/func.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>





<?php










$produtos=listarProduto($conexao);




foreach ($produtos as $produto) {
    echo "<h2>".$produto['produto']."</h2>";
    echo "<p>Tamanho: ".$produto['tamanho']."</p>";
    echo "<p>Valor: R$ ".$produto['valor']."</p>";
    echo "<p>Estoque: ".$produto['estoque']."</p>";
    // o descoto so deve aparecer se tiver desconto
    if ($produto['desconto'] > 0) {
        echo "<p>Desconto: ".$produto['desconto']."%</p>";
    }
    
    echo "<p>Descrição: ".$produto['descricao']."</p>"; 
    echo "<p>Avaliação: ".$produto['avaliacao']." estrelas</p>";
    echo "<p>Comentário: ".$produto['comentario']."</p>";
    echo'<a href="">aaa</a>';
    echo "<hr>";
}

// quando clicar ir para a paguina de um produto






?>













    
</body>
</html>