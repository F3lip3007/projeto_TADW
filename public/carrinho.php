<?php
session_start();
require_once './controle/conexao.php';
require_once './controle/func.php';

$id_u = $_SESSION['id_usuario'];
$id_c = $_SESSION['id_cliente'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>
  <link rel="stylesheet" href="carrinho.css">
</head>
<body>

<header class="topo">
  <h1>🛒 Carrinho</h1>
  <p><strong>Usuário:</strong> <?= htmlspecialchars($id_u) ?> |
     <strong>Cliente:</strong> <?= htmlspecialchars($id_c) ?></p>
</header>

<main class="conteudo">
<?php
if (empty($_SESSION['carrinho'])) {
    echo "<p class='msg-vazio'>Seu carrinho está vazio </p>";
} else {
    $total = 0;

    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $produto = pesquisarProdutoId($conexao, $id);
        if (!$produto) continue;

        $preco = $produto['preco_venda'];
        $total_unitario = $preco * $quantidade;
        $total += $total_unitario;
        $imagem = !empty($produto['foto']) ? "./imagens/{$produto['foto']}" : "./imagens/sem-imagem.png";

        echo "
        <div class='produto-card'>
            <input type='checkbox' class='selec-produto'>

            <img src='{$imagem}' alt='Foto do produto' class='foto-produto'>

            <div class='info-produto'>
                <div class='linha-superior'>
                    <h2>{$produto['nome']}</h2>
                    <span class='preco'>R$ " . number_format($preco, 2, ',', '.') . "</span>
                </div>

                <p class='descricao'>{$produto['tipo']}</p>

                <div class='quantidade'>
                    <button class='menos'>−</button>
                    <span>{$quantidade}</span>
                    <button class='mais'>+</button>
                </div>

                <div class='acoes'>
                    <a href='remover.php?id=$id' class='excluir' onclick=\"return confirm('Remover este item?')\">🗑️ Excluir</a>
                    <a href='finalizar_pedido.php?id=$id' class='comprar'>🛍️ Comprar agora</a>
                </div>
            </div>
        </div>
        ";
    }

    echo "<div class='total-geral'>";
    echo "<h3>Total da compra: <span>R$ " . number_format($total, 2, ',', '.') . "</span></h3>";
    echo "<a href='area_cliente.php' class='continuar'>⬅️ Continuar comprando</a>";
    echo "</div>";
}
?>
</main>

</body>
</html>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loja de Roupas</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="top-bar">
    <div class="color-change">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <!-- Imagem no canto superior esquerdo -->
    <img src="./fotos/soluc.png" alt="Logo da Soluc"
     style="position: absolute; top: 80px; left: 20px; max-width: 150px;">

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

      <a href="carrinho.php" class="link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span>Carrinho</span>
      </a>

      <a href="cupom.php" class="link"><span>🏷️</span> Cupons</a>
      <a href="area_cliente.php" class="link"><span>🏠</span> Home</a>
    </div>

    <hr>

    <div class="menu-section">
      <a href="deslogar.php" class="link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
          <polyline points="16 17 21 12 16 7"></polyline>
          <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span>Sair</span>
      </a>
    </div>
  </nav>
  <hr>

  <div class="menu-section">

    <a href="cadastrar.html" class="link" style="display: flex; align-items: center; gap: 5px; text-decoration: none; color: inherit;">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
    <polyline points="16 17 21 12 16 7"></polyline>
    <line x1="21" y1="12" x2="9" y2="12"></line>
  </svg>
  <span>Sair</span>
</a>

  </div>
</nav>


    <script>
function toggleRightMenu() {
  const menu = document.getElementById("rightSideMenu");
  const button = document.querySelector(".profile-toggle");

  menu.classList.toggle("active");

  // Alterna visibilidade do botão
  if (menu.classList.contains("active")) {
    button.style.display = "none";
  } else {
    button.style.display = "block";
  }
}

// Fecha ao clicar fora
document.addEventListener("click", function (e) {
  const menu = document.getElementById("rightSideMenu");
  const button = document.querySelector(".profile-toggle");

  if (!menu.contains(e.target) && !button.contains(e.target)) {
    menu.classList.remove("active");
    button.style.display = "block";
  }
});
</script>