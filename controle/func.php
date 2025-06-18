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

function listarProduto($conexao) { 
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $lista_produtos[] = $produto;
    }

    mysqli_stmt_close($comando);
    return $lista_produtos; };




    // mudar nomes

function salvarCliente($conexao) { $sql = "INSERT INTO tb_cliente (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;};

function editarCliente() {};

function deletarCliente() {};

function listaCliente($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        $lista_clientes[] = $cliente;
    }

    mysqli_stmt_close($comando);
    return $lista_clientes;
};


function salvarVenda($conexao, $cupom, $valor_da_venda, $tb_id_cliente) {
    $sql = "INSERT INTO tb_venda (cupom, valor_da_venda, tb_id_cliente) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $cupom, $valor_da_venda, $tb_id_cliente);
    
    mysqli_stmt_execute($comando);
    
    $id_compras = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $id_compras;
};

function editarVenda() {};

function deletarVenda() {};

function listarVenda($conexao){
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_vendas = [];
    while ($venda = mysqli_fetch_assoc($resultado)){
        $lista_vendas[] = $venda;
    }
    
    mysqli_stmt_close($comando);
    return $lista_vendas;
};

function salvarUsuario() {};

function editarrUsuario() {};

function deletarUsuario() {};

function listarrUsuario() {};

function salvarFuncionario() {};

function editarFuncionario() {};

function deletarFuncionario() {};

function listarFuncionario() {};

?>