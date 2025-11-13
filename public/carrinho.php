<?php
require_once './controle/conexao.php';
require_once './controle/func.php';

session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <h1 class="navbar-logo">Minha Loja</h1>
        </div>
    </nav>

    <!-- Espaço para navbar fixa -->
    <div style="height: 90px;"></div>

    <div class="carrinho-container">
        <div class="card-carrinho">
            <h2 class="titulo-carrinho">Seu Carrinho</h2>
            <hr>

            <?php
            if (count($_SESSION['carrinho']) == 0) {
                echo "<p class='text-muted text-center'>Seu carrinho está vazio.</p>";
            } else {
                $total = 0;
                echo "<div class='table-responsive'>";
                echo "<table class='table-carrinho'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Produto</th>";
                echo "<th>Preço</th>";
                echo "<th>Quantidade</th>";
                echo "<th>Total</th>";
                echo "<th>Ação</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($_SESSION['carrinho'] as $id => $quantidade) {
                    $produto = pesquisarprodutosid($conexao, $id);
                    $total_unitario = $produto['preco_venda'] * $quantidade;
                    $total += $total_unitario;

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
                    echo "<td>R$ " . number_format($produto['preco_venda'], 2, ',', '.') . "</td>";
                    echo "<td>" . $quantidade . "</td>";
                    echo "<td>R$ " . number_format($total_unitario, 2, ',', '.') . "</td>";
                    echo "<td><a href='remover.php?id=" . $id . "' class='btn btn-remover'>Excluir</a></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";

                echo "<div class='total-carrinho'>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</div>";

                echo "<div class='botoes-carrinho'>";
                echo "<a href='formpedido.php' class='btn btn-voltar'>Continue Adicionando</a>";
                echo "<a href='finalizar_venda.php' class='btn btn-finalizar'>Prosseguir com o pagamento</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>
