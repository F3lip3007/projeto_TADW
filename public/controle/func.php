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




function salvarCliente($conexao, $numero, $cpf,$id_usuario) {
    $sql ="INSERT INTO tb_cliente (numero, cpf,td_id_usuario) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $numero, $cpf, $id_usuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};




function editarCliente($conexao, $cpf,$numero,$id_cliente,) {
    $sql = "UPDATE tb_cliente SET numero=?, cpf=? WHERE id_cliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $cpf, $numero, $id_cliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);    
    
    return $funcionou;

};



function deletarCliente($conexao, $id_cliente) {
    $sql = "DELETE FROM  tb_cliente WHERE id_cliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_cliente);   
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarCliente($conexao ) {
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




function salvarVenda($conexao, $cupom, $valor_venda, $tb_id_cliente) {
    $sql = "INSERT INTO tb_venda (cupom, valor_venda, tb_id_cliente) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $cupom, $valor_venda, $tb_id_cliente);
    
    mysqli_stmt_execute($comando);
    
    
    $id_venda = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $id_venda;
};




function editarVenda($conexao, $id_venda, $cupom, $valor_venda, $tb_id_cliente ) {
    $sql = "UPDATE tb_venda SET cupom=?, valor_venda=?, tb_id_cliente=? WHERE id_venda=?";
    $comando = mysqli_prepare($conexao, $sql);
    

    mysqli_stmt_bind_param($comando, 'issi',  $id_venda, $cupom, $valor_venda, $tb_id_cliente);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};




function deletarVenda($conexao, $id_venda) {
    $sql = "DELETE FROM  tb_venda WHERE id_venda = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_venda);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




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




function salvarUsuario($conexao, $foto, $email, $senha, $isadmin, $nome) {
    $sql = "INSERT INTO tb_usuario( foto, email, senha, isadmin, nome )
    VALUES (?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssis', $foto, $email, $senha, $isadmin, $nome);

    mysqli_stmt_execute($comando);

    $id_usuario = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);
    return $id_usuario;
};




function editarUsuario($conexao, $id_usuario, $foto, $email, $senha, $isadmin, $tb_id_cliente, $tb_id_funcionario ) {
    $sql = "UPDATE tb_usuario SET foto=?, email=?, senha=?, isadmin=?, tb_id_cliente=?, tb_id_funcionario=? WHERE id_usuario=?";
    $comando = mysqli_prepare($conexao, $sql);

    $comando = mysqli_prepare($conexao, $sql);
    

    
    mysqli_stmt_bind_param($comando, 'sssiiii',$foto,$email,$senha,$isadmin,$tb_id_cliente,$tb_id_funcionario,$id_usuario,
    );

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;


};




function deletarUsuario($conexao,$id_usuario) {
    $sql = "DELETE FROM  tb_usuario WHERE id_usuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_usuario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarUsuario($conexao ){
    $sql = "SELECT * FROM tb_usuario";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_usuario = [];
    while ($usuario = mysqli_fetch_assoc($resultado)){
        $lista_usuario[] = $usuario;
    }
    
    mysqli_stmt_close($comando);
    return $lista_usuario;
};





function salvarFuncionario($conexao, $salario, $cpf, $data_nascimento ) {
    $sql = "INSERT INTO tb_funcionario (salario, cpf, data_nascimento ) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dss' ,$salario, $cpf, $data_nascimento );

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};




function deletarFuncionario($conexao, $id_funcionario) {
    $sql = "DELETE FROM  tb_funcionario WHERE id_funcionario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_funcionario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};




function listarFuncionario($conexao){
    $sql = "SELECT * FROM tb_funcionario";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_funcionario = [];
    while ($funcionario = mysqli_fetch_assoc($resultado)){
        $lista_funcionario[] = $funcionario;
    }
    
    mysqli_stmt_close($comando);
    return $lista_funcionario;
};




function editarFuncionario($conexao, $id_funcionario, $salario, $cpf, $data_nacimento) {
    $sql = "UPDATE tb_funcionario SET salario=?, cpf=?, data_nascimento=? WHERE id_funcionario=?";
        $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'idss', $id_funcionario, $salario, $cpf, $data_nacimento);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};





function salvarEndereco($conexao, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario) {
    $sql = "INSERT INTO tb_endereco (rua, cep, numero, bairro, estado, complemento, tb_id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssssssi', $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario);
    
    $funcionou = mysqli_stmt_execute($comando);

    $id_endereco = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};






function editarEndereco($conexao, $id_endereco, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario) {
    
    $sql = "UPDATE tb_endereco SET rua=?, cep=?, numero=?, bairro=?, estado=?, complemento=?, tb_id_usuario=?  WHERE id_endereco=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'issssssi',  $id_endereco, $rua, $cep, $numero, $bairro, $estado, $complemento, $tb_id_usuario);

    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;


};



function deletarEndereco($conexao, $id_endereco) {
    $sql = "DELETE FROM  tb_endereco WHERE id_endereco = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_endereco);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};



function listarEndereco($conexao) {
    $sql = "SELECT * FROM tb_endereco";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_enderecos = [];
    while ($endereco = mysqli_fetch_assoc($resultado)) {
        $lista_enderecos[] = $endereco;
    }

    mysqli_stmt_close($comando);
    return $lista_enderecos;
 };

 
 function salvarFoto($conexao, $nome, $tb_id_produto) {
    $sql = "INSERT INTO tb_foto (nome, tb_id_produto)
    VALUES (?, ?)";


    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $nome, $tb_id_produto);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;

 }

 
function listarFotos ($conexao ) {
    $sql = "SELECT * FROM tb_foto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_foto = [];
    while ($foto = mysqli_fetch_assoc($resultado)) {
        $lista_foto[] = $foto;
    }

    mysqli_stmt_close($comando);
    return $lista_foto;
};


function editarFotos ($conexao, $nome, $tb_id_produto) {
    $sql = "UPDATE tb_foto SET nome=?, tb_id_produto=? WHERE id_table1=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $nome, $tb_id_produto);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);    
    
    return $funcionou;

};


function deletarFotos ($conexao, $id_table1) {
    $sql = "DELETE FROM  tb_foto WHERE id_table1 = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_table1);   
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou;
};


function verificarLogin($conexao){};



function pesquisarProdutoPorTamanho($conexao, $tamanho) {
    $sql = "SELECT * FROM tb_produto 
            WHERE tamanho LIKE ?";
    
    $comando = mysqli_prepare($conexao, $sql);
    
    $tamanho = "%" . $tamanho . "%";
    mysqli_stmt_bind_param($comando, 's', $tamanho);
    
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    
    $produtos = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $linha;
    }
    
    mysqli_stmt_close($comando);
    
    return $produtos;
};


function pesquisarProdutoPorNomeTipo($conexao, $nome, $tipo) {
    $sql = "SELECT * FROM tb_produto 
            WHERE produto LIKE ? AND tipo LIKE ?";
    
    $comando = mysqli_prepare($conexao, $sql);
    
    // Busca parcial com LIKE
    $nome = "%" . $nome . "%";
    $tipo = "%" . $tipo . "%";
    
    mysqli_stmt_bind_param($comando, 'ss', $nome, $tipo);
    
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    
    $produtos = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $linha;
    }
    
    mysqli_stmt_close($comando);
    
    return $produtos;
};


function pesquisarProdutoPorId($conexao, $id_produto) {
    $sql = "SELECT * FROM tb_produto WHERE id_produto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_produto);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
}


?>