<?php


function salvarProduto($conexao,) {
    $sql = "INSERT INTO td_produto (produto,tamanho,fotos,valor,estoque,desconto,descricao,local,avaliacao,comentatio)
    
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssdddssss', $produto, $tamanho, $fotos,$valor,$estoque,$desconto,$descricao,$local,$avaliacao,$comentatio);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;


}


?>