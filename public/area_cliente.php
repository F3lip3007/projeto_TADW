<?php
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

  <!-- Barra preta fixa no topo com letreiro -->
  <div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <!-- Imagem no canto superior esquerdo -->
  <img src="./fotos/soluc.png" alt="Logo da Soluc" 
       style="position: absolute; top: 80px; left: 20px; max-width: 150px;">

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

  <!-- Formulário de pesquisa (agora sem absolute) -->
  <form action="./controle/pesquisar_ropa.php" method="GET" class="search-form">
    <input type="text" name="q" placeholder="Pesquisar..." class="search-input">
    <button type="submit" class="search-btn">
      🔍
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
