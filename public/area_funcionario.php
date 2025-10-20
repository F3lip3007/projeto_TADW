<?php
require_once './controle/conexao.php';
require_once './controle/func.php';  
require_once './controle/verificarlogado.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Gerente</title>
    <link rel="stylesheet" href="style.css" />
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
    <div>
     links <br><br>
      <a href="cadastrar_P.html" class="link" style="display: block;">Ir para cadastrar produto</a><br>
      <a href="cadastrar_F.php" class="link" style="display: block;">Ir para cadastrar funcionario</a><br>
    </div>

     <!-- Links para as páginas -->
     <!-- <a href="area_cliente.php" class="link" style="display: block;">Ir para a área de clientes</a> -->

       <table border="1" cellpadding="5" cellspacing="0" align="center">
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



  </p>
    
</body>
</html>