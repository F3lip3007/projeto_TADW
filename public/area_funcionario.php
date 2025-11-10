<?php
require_once './controle/conexao.php';
require_once './controle/func.php';  
// require_once './controle/verificarlogado.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área Gerente</title>
  <link rel="stylesheet" href="style.css">
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

   <!-- Imagem no canto superior esquerdo -->  
    <img src="./fotos/soluc.png" alt="Logo da Soluc" 
     style="position: absolute; top: 80px; left: 20px; max-width: 150px;">

  <!-- Área principal -->
  <main>
  <h1>Área Gerente</h1>

  <div class="links">
    <a href="cadastrar_P.html" class="link">Ir para cadastrar produto</a>
    <a href="cadastrar_F.php" class="link">Ir para cadastrar funcionário</a>
  </div>

  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2">Listagens</th>
    </tr>
    <tr>
      <td>Listar Produtos</td>
      <td><a href="listaproduto.php">Ir para listar produtos</a></td>
    </tr>
    <tr>
      <td>Listar Clientes</td>
      <td><a href="listacliente.php">Ir para listar clientes</a></td>
    </tr>
  </table>
</main>


</body>
</html>

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
