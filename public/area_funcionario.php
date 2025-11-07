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
