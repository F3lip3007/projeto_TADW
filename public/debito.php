<?php
session_start();

// inicializa array de cartões se ainda não existe
if (!isset($_SESSION['cartoes'])) {
    $_SESSION['cartoes'] = [
        ['final' => '8.534', 'cor' => '#2b3b33', 'titular' => 'Meu Cartão'],
        ['final' => '3.931', 'cor' => '#4a1b1b', 'titular' => 'Outro Cartão']
    ];
}

// mensagem opcional (ex: após adicionar/cancelar)
$msg = '';
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Seleção de Cartão</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Barra preta fixa no topo com letreiro -->
  <div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <!-- Imagem no canto superior esquerdo -->
  <img src="./fotos/soluc.png" alt="Logo da Soluc" 
       style="position: absolute; top: 80px; left: 20px; max-width: 150px;">



  <!-- Botão ícone perfil redondo -->
<button class="profile-toggle" onclick="toggleRightMenu()" aria-label="Menu Perfil" title="Menu Perfil">
  <svg width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
    <!-- Círculo externo -->
    <circle cx="32" cy="32" r="30" stroke="#333" stroke-width="3" fill="#eee6e6ff"/>
    <!-- Cabeça -->
    <circle cx="32" cy="22" r="10" fill="#333" />
    <!-- Corpo -->
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
    <a href="#"><span>👤</span> Perfil</a>
    <a href="#"><span><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
  <polyline points="16 17 21 12 16 7"></polyline>
  <line x1="21" y1="12" x2="9" y2="12"></line>
</svg>
</span> Carrinho</a>
    <a href="#"><span>🏷️</span> Cupons</a>
    <a href="#"><span>🏠</span> Home</a>
  </div>

  <hr>

  <div class="menu-section">
    <a href="#"><span>🚪</span> Sair</a>
  </div>
</nav>



  <div class="container">
    <div class="header">
      <div>
        <div class="title-line">cartao de credito</div>
        <div class="title-line sub">ou debito</div>
      </div>
    </div>

    <?php if ($msg): ?>
      <div class="msg"><?php echo $msg; ?></div>
    <?php endif; ?>

    <div class="actions-row">
      <a class="add-btn" href="add_card.php">+ Adicionar novo cartão</a>
    </div>

    <div class="cards">
      <?php foreach ($_SESSION['cartoes'] as $idx => $cartao): ?>
        <form class="card-option" action="pagamento.php" method="post">
          <input type="hidden" name="cartao_final" value="<?php echo htmlspecialchars($cartao['final']); ?>">
          <input type="hidden" name="cartao_titular" value="<?php echo htmlspecialchars($cartao['titular']); ?>">
          <div class="card-info">
            <div class="chip" style="background: <?php echo htmlspecialchars($cartao['cor']); ?>;"></div>
            <div>
              <div class="card-tit"><?php echo htmlspecialchars($cartao['titular']); ?></div>
              <div class="card-final"><?php echo '***.**' . htmlspecialchars($cartao['final']); ?></div>
            </div>
          </div>

          <div class="card-actions">
            <button class="arrow-btn" type="submit" title="Usar este cartão">➜</button>
          </div>
        </form>
      <?php endforeach; ?>
    </div>

    <div class="footer-row">
      <form id="form-cancelar" action="area_cliente.php" method="post">
        <input type="hidden" name="acao" value="cancelar">
        <button id="btn-cancelar" type="submit" class="cancel-btn">Cancelar</button>
      </form>

      <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>
  </div>

<script>
document.getElementById('form-cancelar').addEventListener('submit', function(e){
  if (!confirm('Deseja realmente cancelar?')) e.preventDefault();
});
</script>

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
