<?php
session_start();


if (!isset($_SESSION['cartoes'])) {
    $_SESSION['cartoes'] = [
        ['final' => '8.534', 'cor' => '#2b3b33', 'titular' => 'Meu Cartão'],
        ['final' => '3.931', 'cor' => '#4a1b1b', 'titular' => 'Outro Cartão']
    ];
}

// excluir o cartao
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
    $indice = intval($_POST['indice']);
    if (isset($_SESSION['cartoes'][$indice])) {
        unset($_SESSION['cartoes'][$indice]);
        $_SESSION['cartoes'] = array_values($_SESSION['cartoes']);
        $msg = "Cartão excluído com sucesso!";
    } else {
        $msg = "Cartão não encontrado.";
    }
} else {

    $msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
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

  <div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>


  <img src="./fotos/soluc.png" alt="Logo da Soluc" 
       style="position: absolute; top: 80px; left: 20px; max-width: 150px;">


  <button class="profile-toggle" onclick="toggleRightMenu()" aria-label="Menu Perfil" title="Menu Perfil">
    <svg width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
      <circle cx="32" cy="32" r="30" stroke="#333" stroke-width="3" fill="#eee6e6ff"/>
      <circle cx="32" cy="22" r="10" fill="#333" />
      <path d="M20 52c0-7 24-7 24 0v4H20v-4z" fill="#333"/>
    </svg>
  </button>


  <nav class="right-side-menu" id="rightSideMenu">
    <div class="menu-section">
      <p class="menu-title">👤 Meu Perfil</p>
    </div>
    <hr>
    <div class="menu-section">
      <a href="perfil.html" class="link"><span>👤</span> Perfil</a>
      <a href="carinho.php" class="link">🛒 Carrinho</a>
      <a href="cupom.php" class="link"><span>🏷️</span> Cupons</a>
      <a href="area_cliente.php" class="link"><span>🏠</span> Home</a>
    </div>
    <hr>
    <div class="menu-section">
      <a href="cadastrar.html" class="link sair"><span>🚪</span> Sair</a>
    </div>
  </nav>

  <div class="container">
    <div class="header">
      <div>
        <div class="title-line">cartao de credito</div>
        <div class="title-line sub">ou debito</div>
      </div>
    </div>

    <?php if (!empty($msg)): ?>
      <div class="msg"><?php echo $msg; ?></div>
    <?php endif; ?>

    <div class="actions-row">
      <a class="add-btn" href="add_card.php">+ Adicionar novo cartão</a>
    </div>

    <div class="cards">
      <?php foreach ($_SESSION['cartoes'] as $idx => $cartao): ?>
        <div class="card-option">
          <form action="pagamento.php" method="post" style="display:inline;">
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


          <form method="post" onsubmit="return confirm('Deseja realmente excluir este cartão?');" style="display:inline;">
            <input type="hidden" name="acao" value="excluir">
            <input type="hidden" name="indice" value="<?php echo $idx; ?>">
            <button type="submit" class="delete-btn" title="Excluir este cartão">🗑️</button>
          </form>
        </div>
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
</body>
</html>
