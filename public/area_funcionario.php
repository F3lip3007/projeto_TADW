<?php
require_once './controle/conexao.php';
require_once './controle/func.php';

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <!-- Top bar com animação SOLUC -->
    <div class="top-bar">
        <div class="color-change">
            SOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUCㅤSOLUC
        </div>
    </div>

    <!-- Logo -->
    <img src="./fotos/soluc.png" alt="Logo da Soluc">

    <!-- Botão de perfil -->
    <button class="profile-toggle" onclick="toggleRightMenu()" aria-label="Menu Perfil" title="Menu Perfil">
        <svg width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="32" cy="32" r="30" stroke="#333" stroke-width="3" fill="#eee6e6ff"/>
            <circle cx="32" cy="22" r="10" fill="#333" />
            <path d="M20 52c0-7 24-7 24 0v4H20v-4z" fill="#333"/>
        </svg>
    </button>

    <!-- Menu lateral da direita -->
    <nav class="right-side-menu" id="rightSideMenu">
        <div class="menu-section">
            <p class="menu-title">👤 Meu Perfil</p>
        </div>

        <hr>

        <div class="menu-section">
            <a href="perfil.html" class="link"><span>👤</span> Perfil</a>
            <a href="carrinho.php" class="link"><span>🛒</span> Carrinho</a>
            <a href="cupom.php" class="link"><span>🏷️</span> Cupons</a>
            <a href="area_cliente.php" class="link"><span>🏠</span> Home</a>
        </div>

        <hr>

        <div class="menu-section">
            <a href="deslogar.php" class="link"><span>🚪</span> Sair</a>
        </div>
    </nav>

    <!-- Área principal -->
    <main>
        <h1>Seu Carrinho</h1>

        <div class="card card-carrinho">
            <div class="card-body">
                <?php
                if (count($_SESSION['carrinho']) == 0) {
                    echo "<p class='text-center text-muted'>Seu carrinho está vazio.</p>";
                } else {
                    $total = 0;
                    echo "<div class='table-responsive'>";
                    echo "<table class='table align-middle'>";
                    echo "<thead class='table-light'>";
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
                        echo "<td class='fw-semibold'>" . htmlspecialchars($produto['nome']) . "</td>";
                        echo "<td>R$ " . number_format($produto['preco_venda'], 2, ',', '.') . "</td>";
                        echo "<td>" . $quantidade . "</td>";
                        echo "<td>R$ " . number_format($total_unitario, 2, ',', '.') . "</td>";
                        echo "<td><a href='remover.php?id=" . $id . "' class='btn btn-sm btn-remover'>Excluir</a></td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    echo "<div class='d-flex justify-content-between align-items-center mt-4'>";
                    echo "<h4 class='fw-bold total-carrinho'>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h4>";
                    echo "</div>";

                    echo "<div class='d-flex justify-content-between mt-4'>";
                    echo "<a href='formpedido.php' class='btn btn-voltar'>Continue Adicionando</a>";
                    echo "<a href='finalizar_venda.php' class='btn btn-finalizar'>Prosseguir com o pagamento</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </main>

    <script>
        function toggleRightMenu() {
            const menu = document.getElementById("rightSideMenu");
            const button = document.querySelector(".profile-toggle");

            menu.classList.toggle("active");

            if (menu.classList.contains("active")) {
                button.style.display = "none";
            } else {
                button.style.display = "block";
            }
        }

        document.addEventListener("click", function (e) {
            const menu = document.getElementById("rightSideMenu");
            const button = document.querySelector(".profile-toggle");

            if (!menu.contains(e.target) && !button.contains(e.target)) {
                menu.classList.remove("active");
                button.style.display = "block";
            }
        });
    </script>

</body>
</html>
