<?php
require_once './controle/conexao.php';
require_once './controle/func.php';

$id_produto= $_GET['id_produto'];
$produto=pesquisarProdutoPorId($conexao,$id_produto);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="top-bar">
    <div class="color-change">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>


    <img src="./fotos/soluc.png" alt="Logo da Soluc"
     style="position: absolute; top: 80px; left: 20px; max-width: 150px;">


<div class="container">


    <img src="./fotos/soluc.png" alt="Logo da Soluc" class="logo-esquerda">



<form method="POST" action="pagamento.php">
    <div class="produto-card">

        <div class="produto-imagem">
            <img src="./fotos/produto.png" alt="<?php echo $produto['produto']; ?>">
        </div>

        <div class="produto-info">
            <h2><?php echo $produto['produto']; ?></h2>
            <div class="avaliacao">⭐ <?php echo $produto['avaliacao']; ?></div>
            <p class="preco">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
            <p class="parcelamento">em 12x de R$<?php echo number_format($produto['valor']/12, 2, ',', '.'); ?></p>
            <p class="estoque">Estoque disponível - <span class="frete">Frete Grátis</span></p>
            <p>Quantidade:
                <input type="number" id="quantidade" name="quantidade" value="1" min="1" max="<?php echo $produto['estoque']; ?>" class="input-qtd">
                (<?php echo $produto['estoque']; ?> disponíveis)
            </p>
                  <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $id_produto; ?>"
                  >
    

            <!-- Tamanhos -->


            <!-- Botões -->
            <div class="botoes">
                <a href="pagamento.php"><button class="comprar">Comprar</button></a>
                <a href="carinho.php"><button class="carrinho">Adicionar ao carrinho</button></a>

            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>

