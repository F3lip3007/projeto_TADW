<?php


function salvarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo) {
    $sql = "INSERT INTO tb_produto (produto,tamanho,valor,estoque,desconto,descricao,avaliacao,comentario,tipo)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssdddsdss', $produto, $tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;


};



function editarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo,$id_produto) {
    
    $sql = "UPDATE tb_produto SET produto=?, tamanho=?, valor=?,estoque=?,desconto=?,descricao=?,avaliacao=?,comentario=?,tipo=? WHERE id_produto=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssdidsdssi', $produto, $tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo,$id_produto);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;


};



    
function deletarProduto($conexao, $id_produto) {
    $sql = "DELETE FROM  tb_produto WHERE id_produto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_produto);
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
    return $lista_produtos;
 };





function salvarCliente($conexao, $numero, $cpf) {
    $sql ="INSERT INTO tb_cliente (numero, cpf ) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ss', $numero, $cpf);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};




function editarCliente($conexao, $id_cliente, $numero, $cpf) {
    $sql = "INSERT INTO tb_produto (numero, cpf) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;

};



function deletarCliente($conexao, $id_cliente, $numero, $cpf) {
    $sql = "DELETE FROM  tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sss', $idcliente);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarCliente($conexao, $id_cliente, $numero, $cpf ) {
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




function salvarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente) {
    $sql = "INSERT INTO tb_venda (id_venda, cupom, valor_venda, tb_id_cliente) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'issi', $id_venda, $cupom, $valor_venda, $tb_id_cliente);
    
    mysqli_stmt_execute($comando);
    
    $id_compras = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $id_compras;
};




function editarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente ) {
    $sql = "INSERT INTO tb_venda(id_venda, cupom, valor_venda, tb_id_cliente) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    

    mysqli_stmt_bind_param($comando, 'issi',  $id_venda, $cupom, $valor_venda, $tb_id_cliente);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};




function deletarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente) {
    $sql = "DELETE FROM  tb_venda WHERE idvenda = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'issi', $id_compras, $cupom, $valor_da_venda, $td_id_cliente);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente){
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




function salvarUsuario($conexao, $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario ) {
    $sql = "INSERT INTO tb_usuario(idusuario, foto, email, senha, isadmin, tb_id_cliente, td_id_funcionario)
    
    VALUES (?,?,?,?,?,?,?)";

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'isssiii', $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};





function editarUsuario($conexao, $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario ) {
    $sql = "UPDATE tb_usuario SET foto=?, email=?, senha=?, isadmin=?, tb_id_cliente=?, td_id_funcionario=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'isssiii', $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario);

    $funcionou = mysqli_stmt_execute($comando);


};




function deletarUsuario($conexao,$idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario) {
    $sql = "DELETE FROM  tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'isssiii', $idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarUsuario($conexao,$idusuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $td_id_funcionario ){
    $sql = "SELECT * FROM tb_usuario";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_usuario = [];
    while ($venda = mysqli_fetch_assoc($resultado)){
        $lista_usuario[] = $usuario;
    }
    
    mysqli_stmt_close($comando);
    return $lista_usuario;
};





function salvarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento ) {
    $sql = "INSERT INTO tb_funcionario (salario, cpf, data_nacimento )
    VALUES (?,?,?)";

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'idss' ,$salario, $cpf, $data_nascimento );

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};




function deletarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento) {
    $sql = "DELETE FROM  tb_funcionario WHERE id_funcionario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'idss', $idfuncionario, $salario, $cpf, $data_nacimentoo );
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento){
    $sql = "SELECT * FROM tb_funcionario";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_funcionario = [];
    while ($venda = mysqli_fetch_assoc($resultado)){
        $lista_funcionario[] = $funcionario;
    }
    
    mysqli_stmt_close($comando);
    return $lista_funcionario;
};




function editarFuncionario($conexao, $idfuncionario, $salario, $cpf, $data_nacimento) {
    $sql = "UPDATE tb_funcionario SET salario=?, cpf=?, data_nascimento=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $id_funcionario);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};




?>