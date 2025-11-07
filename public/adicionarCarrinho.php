<?php
session_start();

// ============================
// Sessão do usuário/cliente
// ============================
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 1; // exemplo (depois vem do login)
}
if (!isset($_SESSION['id_cliente'])) {
    $_SESSION['id_cliente'] = 1001; // exemplo (depois vem do login)
}

$id_u = $_SESSION['id_usuario'];
$id_c = $_SESSION['id_cliente'];

// ============================
// Inicializar o carrinho
// ============================
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// ============================
// Adicionar produtos
// ============================
if (!empty($_POST['idproduto'])) {
    $selecionados = $_POST['idproduto'];

    foreach ($selecionados as $id) {
        // Garantir que o valor existe e é numérico
        $quantidade = isset($_POST['quantidade'][$id]) ? (int)$_POST['quantidade'][$id] : 1;

        // Impedir quantidades inválidas
        if ($quantidade < 1) {
            $quantidade = 1;
        }

        // Adiciona ou soma no carrinho
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] += $quantidade;
        } else {
            $_SESSION['carrinho'][$id] = $quantidade;
        }
    }
}

// ============================
// Redirecionar para o carrinho
// ============================
header("Location: carrinho.php");
exit;
?>
