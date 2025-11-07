<?php
session_start();
$id_u=$_SESSION['id_usuario'];
$id_c=$_SESSION['id_cliente'];
// echo 'usuario ';
// echo $id_u;
// echo'cliente';
// echo $id_c;



require_once './controle/conexao.php';
require_once './controle/func.php';  
// require_once './controle/verificarlogado.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loja de Roupas</title>
  <link rel="stylesheet" href="style.css" />
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
         <a href="perfil.html" class="link" style="display: block;"><span>👤</span> Perfil</a></a>

<a href="carinho.php" class="link" style="display: flex; align-items: center; gap: 5px; text-decoration: none; color: inherit;">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="9" cy="21" r="1"></circle>
    <circle cx="20" cy="21" r="1"></circle>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
  </svg>
  <span>Carrinho</span>
</a>



    <a href="cupom.php" class="link" style="display: block;"><span>🏷️</span> Cupons</a></a>

    <a href="area_cliente.php" class="link" style="display: block;"><span>🏠</span> Home</a></a>

  </div>

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


  <!-- Formulário de pesquisa, permanece absoluto -->
  <form action="./controle/pesquisar_ropa.php" method="GET" 
        style="position: absolute; top: 90px; left: 50%; transform: translateX(-50%); display: flex; align-items: center; gap: 4px;">
    <input type="text" name="q" placeholder="Pesquisar..." style="padding: 4px 12px; font-size: 20px; border: 2px solid #ccc; border-radius: 4px 0 0 4px; width: 90vw; max-width: 1000px; outline: none; height: 36px;">
    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0 10px; display: flex; align-items: center; justify-content: center; height: 36px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="7"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </button>
  </form>

  <!-- Wrapper para manter o conteúdo no fluxo normal -->
<div class="page-content">

    </button>
  </form>

  <!-- BLOCO LIMITADO PARA CARDS -->
  <div class="cards-block">
    <?php
    $produto = listarProduto($conexao);
    foreach ($produto as $prod) {
        echo "<div class='card-wrapper'>";
        echo "  <div class='card'>";
        echo "    <div class='card-image' style=\"background-image: url('');\"></div>";
        echo "    <div class='card-body'>";
        echo "      <h3 class='product-title'>". $prod['produto'] ."</h3>";
        echo "      <p class='product-price'>R$ " . $prod['valor'] . "</p>";
        echo "      <a class='buy-button' href='ItemUnico.php?id_produto=" . $prod['id_produto'] . "'>Comprar</a>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
    }
    ?>
  </div>

</div>
