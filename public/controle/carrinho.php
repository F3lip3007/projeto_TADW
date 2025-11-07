<?php
session_start();

// Sessão do usuário/cliente
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 1; // exemplo
}
if (!isset($_SESSION['id_cliente'])) {
    $_SESSION['id_cliente'] = 1001; // exemplo
}

$id_u = $_SESSION['id_usuario'];
$id_c = $_SESSION['id_cliente'];

require_once "conexao.php";
require_once "func.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/carrinho.css">
</head>
<body>

<header>
    <h2>Carrinho de Compras</h2>
    <p><strong>Usuário:</strong> <?= $id_u ?> | <strong>Cliente:</strong> <?= $id_c ?></p>
</header>

<main>
<?php
if (empty($_SESSION['carrinho'])) {
    echo "<p>Carrinho vazio</p>";
} else {
    $total = 0;
    echo "<table class='carrinho-tabela'>";
    echo "<tr>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Total Unitário</th>
            <th>Remover</th>
          </tr>";

    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $produto = pesquisarProdutoId($conexao, $id);
        if (!$produto) continue;

        $preco = $produto['preco_venda'];
        $total_unitario = $preco * $quantidade;
        $total += $total_unitario;

        echo "<tr>";
        echo "<td>{$produto['tipo']}</td>";
        echo "<td>{$produto['nome']}</td>";
        echo "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>";
        echo "<td>$quantidade</td>";
        echo "<td>R$ " . number_format($total_unitario, 2, ',', '.') . "</td>";
        echo "<td><a class='remover-link' href='remover.php?id=$id'>[remover]</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<h3>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";
}
?>
</main>

<footer>
    <p><a href="index.php">Adicionar mais produtos</a></p>
</footer>

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