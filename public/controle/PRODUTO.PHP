<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$endereco_pet = $_POST['endereco_pet'];
$tipo = $_POST['tipo'];
$raca = $_POST['raca'];
$porte = $_POST['porte'];
$idade = $_POST['idade'];
$peso = $_POST['peso'];
$genero = $_POST['genero'];
$foto = $_FILES ['foto'];
$idUsuario = $_SESSION['idUsuario']; 
$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];


// pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gera um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criando um novo caminho para o arquivo (usando o endereço da página)
//lembre-se de criar a pasta "fotos/" dentro da pasta "codigo".
//deve ajustar as permissões da pasta "fotos".
$caminho_destino = "assets/" . $novo_nome;

//movendo o arquivo para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);

if ($idUsuario == 0) {
    salvarFoto($conexao, $nome, $tb_id_produto);
// tem que adaptar, alguem por favor faz isso
$idproduto = salvarProduto($conexao,$produto,$tamanho,$valor,$estoque,$desconto,$descricao,$avaliacao,$comentario,$tipo);

salvarFoto($conexao, $nome, $tb_id_produto);

header("Location:listaproduto.php");
}
?>