<?php
session_start();
require_once './controle/conexao.php';
require_once './controle/func.php';

// Evita erros de sessão indefinida
$id_u = $_SESSION['id_usuario'] ?? null;
$id_c = $_SESSION['id_cliente'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>

  <!-- CSS externo -->
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap (opcional, se quiser usar no topo) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- TOPO -->
  <div class="top-bar">
    <div class="color-change">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <img src="./fotos/soluc.png" alt="Logo da Soluc"
     style="position: absolute; top: 80px; left: 20px; max-width: 150px;">

  <button class="profile-toggle" onclick="toggleRightMenu()" aria-label="Menu Perfil" title="Menu Perfil">
    <svg width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="32" cy="32" r="30" stroke="#333" stroke-width="3" fill="#eee6e6ff"/>
      <circle cx="32" cy="22" r="10" fill="#333" />
      <path d="M20 52c0-7 24-7 24 0v4H20v-4z" fill="#333"/>
    </svg>
  </button>

  <!-- MENU LATERAL -->
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

  <!-- SCRIPT MENU -->
  <script>
  function toggleRightMenu() {
    const menu = document.getElementById("rightSideMenu");
    const button = document.querySelector(".profile-toggle");
    menu.classList.toggle("active");
    button.style.display = menu.classList.contains("active") ? "none" : "block";
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

  <!-- CONTEÚDO DO CARRINHO -->
  <header class="topo">
    <h1>🛒 Carrinho</h1>
    <p><strong>Usuário:</strong> <?= htmlspecialchars($id_u ?? 'Não logado') ?> |
       <strong>Cliente:</strong> <?= htmlspecialchars($id_c ?? 'Não definido') ?></p>
  </header>

  <main class="conteudo">
  <?php
  if (empty($_SESSION['carrinho'])) {
      echo "<p class='msg-vazio'>Seu carrinho está vazio</p>";
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
</body>
</html>
