<?php
session_start(); // sempre primeiro******

require_once "./conexao.php";
require_once "./func.php";

// Evita warnings se o formulário vier sem dados
$emailOuNome = $_POST['emailOuNome'] ;
$senha = $_POST['senha'] ;

$idusuario = verificarLogin($conexao, $emailOuNome, $senha);

if ($idusuario == 0) {
    header("Location: index.php");
    exit;
} else {
    $usuario = pegarDadosUsuario($conexao, $idusuario);
    
    if ($usuario == 0) {
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['logado'] = 'sim';
        $_SESSION['tipo'] = $usuario['tipo'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        
        header("Location: ../area_cliente.php");
        exit;
    }
}
?>
