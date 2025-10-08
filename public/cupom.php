<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cupons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS externo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

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


<h1>Cupons</h1>

<?php
// Lista de cupons
$cupons = [
    [
        "titulo" => "10% OFF",
        "descricao" => "Para pedidos acima de R$5+",
        "desconto" => 10,
        "minimo" => 50,
        "expira" => time() + 12 * 3600 + 29 * 60 + 28 // expira em 12h 29m 28s
    ],
    [
        "titulo" => "45% OFF",
        "descricao" => "Para pedidos acima de  R$150",
        "desconto" => 45,
        "minimo" => 150,
        "expira" => time() + 5 * 3600 + 15 * 60 // expira em 5h 15m
    ],
    [
        "titulo" => "Frete Grátis",
        "descricao" => "Para pedidos acima de  R$100",
        "desconto" => 0,
        "minimo" => 100,
        "expira" => time() + 8 * 3600 // expira em 8h
    ],
];

// Função para formatar tempo restante
function tempoRestante($expira) {
    $restante = $expira - time();
    if ($restante <= 0) return "Expirado";

    $h = floor($restante / 3600);
    $m = floor(($restante % 3600) / 60);
    $s = $restante % 60;
    return sprintf("%02d:%02d:%02d", $h, $m, $s);
}
?>

<div class="cupom-container">
<?php foreach($cupons as $cupom): ?>
    <div class="cupom">
        <h2>R$<?php echo htmlspecialchars($cupom['titulo']); ?></h2>
        <p class="descricao"><?php echo htmlspecialchars($cupom['descricao']); ?></p>
        <div class="cupom-footer">
            <p>Expira em <?php echo tempoRestante($cupom['expira']); ?></p>
            <button>Aplicar</button>
        </div>
    </div>
<?php endforeach; ?>
</div>

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
