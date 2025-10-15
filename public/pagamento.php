<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formas de Pagamento</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body class="pg-body">
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


  <div class="pg-container">
    <h1 class="pg-titulo">💳 Formas de Pagamento</h1> <br><br>

    <div class="pg-opcao">
      <h2 class="pg-subtitulo">Pix</h2>
      <a href="pix.php" target="_blank" class="pg-link">Você pode pagar via Pix</a>
    </div> <br><br>

    <div class="pg-opcao">
      <h2>Cartão de Crédito ou Débito</h2>
      <a href="debito.php" target="_blank" class="pg-link">Pagamento via cartão disponível</a>
    </div>
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
