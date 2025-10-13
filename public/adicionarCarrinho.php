<?php
session_start();

// Inicializa o carrinho, se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Verifica se o ID do produto foi enviado via GET
if (!empty($_GET['idproduto'])) {
    // Pode ser um único produto ou vários? Vamos tratar como um único por link
    $id = $_GET['idproduto'];

    // Se o produto já está no carrinho, incrementa a quantidade
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += 1;
    } else {
        // Se não, adiciona o produto com quantidade 1
        $_SESSION['carrinho'][$id] = 1;
    }
}

// Redireciona para o carrinho (ou outra página)
header("Location: carrinho.php");
exit;


header("Location: carrinho.php");
exit;