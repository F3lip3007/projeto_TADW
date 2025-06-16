<?php


function salvarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentatirio,$tipo) {
    $sql = "INSERT INTO td_produto (produto,tamanho,valor,estoque,desconto,descricao,avaliacao,comentatirio,tipo)
    
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssdddsdss', $produto, $tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentatirio,$tipo);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;


}

function editarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentatirio,$tipo) {
    $sql = "INSERT INTO td_produto (produto,tamanho,valor,estoque,desconto,descricao,avaliacao,comentatirio,tipo)
    
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssdddsdss', $produto, $tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentatirio,$tipo);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;


}

function deletarProduto($conexao, $idproduto) {
    $sql = "DELETE FROM  tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};

function listarProduto() {};

function salvarCliente() {};

function editarCliente() {};

function deletarCliente() {};

function listaCliente() {};

function salvarVenda() {};

function editarVenda() {};

function deletarVenda() {};

function listarVenda() {};

function salvarUsuario() {};

function editarrUsuario() {};

function deletarUsuario() {};

function listarrUsuario() {};

function salvarFuncionario() {};

function editarFuncionario() {};

function deletarFuncionario() {};

function listarFuncionario() {};

?>