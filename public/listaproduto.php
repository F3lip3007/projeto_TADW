<?php
require_once './controle/conexao.php';
require_once './controle/func.php';  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Produtos</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
   
<div class="top-bar">
    <div class="color-change">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC 
    </div>
  </div>

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
      <a href="area_funcionario.php" class="link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
          <polyline points="16 17 21 12 16 7"></polyline>
          <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span>Sair</span>
      </a>
    </div>
  </nav>


  <h1 class="prod-titulo"> Lista de Produtos</h1>

  

  <?php
  $produto = listarProduto($conexao);

  echo "<table class='prod-tabela'>";
  echo "<thead><tr>
          <th>Produto</th>
          <th>Tamanho</th>
          <th>Valor</th>
          <th>Estoque</th>
          <th>Desconto</th>
          <th>Descrição</th>
          <th>Avaliação</th>
          <th>Comentário</th>
          <th>Tipo</th>
        </tr></thead>";
  echo "<tbody>";
  

  foreach($produto as $prod){
      echo "<tr>";
      echo "<td>".$prod['produto']."</td>";
      echo "<td>".$prod['tamanho']."</td>";
      echo "<td>R$ ".$prod['valor']."</td>";
      echo "<td>".$prod['estoque']."</td>";
      echo "<td>".$prod['desconto']."%</td>";
      echo "<td>".$prod['descricao']."</td>";
      echo "<td>".$prod['avaliacao']."</td>";
      echo "<td>".$prod['comentario']."</td>";
      echo "<td>".$prod['tipo']."</td>";
      echo "</tr>";
  }

  echo "</tbody></table>";
  ?>  

  <script>
    function prodFiltrarTabela() {
      const input = document.getElementById("prod-search");
      const filtro = input.value.toLowerCase();
      const linhas = document.querySelectorAll(".prod-tabela tbody tr");

      linhas.forEach((linha) => {
        const texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
      });
    }
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
