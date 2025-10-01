<?php
require_once './controle/conexao.php';
require_once './controle/func.php';
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

<!-- Barra preta fixa no topo com letreiro -->
<div class="top-bar">
    <div class="scrolling-text">
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
        Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc  
    </div>
</div>

<!-- Container principal -->
<div class="container">

    <!-- Logo -->
    <img src="./fotos/soluc.png" alt="Logo da Soluc" class="logo-esquerda">

    <?php
    $id_produto=1; // teste
    $produto=pesquisarProdutoPorId($conexao,$id_produto);
    ?>

    <!-- Card do Produto -->
    <div class="produto-card">
        <!-- Imagem -->
        <div class="produto-imagem">
            <img src="./fotos/produto.png" alt="<?php echo $produto['produto']; ?>">
        </div>

        <!-- Infos -->
        <div class="produto-info">
            <h2><?php echo $produto['produto']; ?></h2>
            <div class="avaliacao">⭐ <?php echo $produto['avaliacao']; ?></div>
            <p class="preco">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
            <p class="parcelamento">em 12x de R$<?php echo number_format($produto['valor']/12, 2, ',', '.'); ?></p>
            <p class="estoque">Estoque disponível - <span class="frete">Frete Grátis</span></p>
            <p>Quantidade: 
                <input type="number" value="1" min="1" max="<?php echo $produto['estoque']; ?>" class="input-qtd">
                (<?php echo $produto['estoque']; ?> disponíveis)
            </p>

            <!-- Tamanhos -->
            <div class="tamanhos">
                <span>Tamanhos:</span>
                <button>P</button>
                <button>M</button>
                <button>G</button>
                <button>GG</button>
            </div>

            <!-- Botões -->
            <div class="botoes">
                <button class="comprar">Comprar</button>
                <button class="carrinho">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>

</div>
</body>
</html>

