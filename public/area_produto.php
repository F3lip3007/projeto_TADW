<?php

require_once './controle/conexao.php';
require_once './controle/func.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

    <!-- <div>
        <div>
            <img src="fotos/soluc.png" alt="">
        </div>
        <div>
            <h3>
                didvfbdfdifngiudbvfgudb
            </h3>
            <h4>
                99.99
            </h4>
            <img src="fotos/estrela" alt="">
            5.0
            <img src="fotos/carinho.png" alt="">
        </div>
    </div> -->


<body>


<div class="card">
    <div class="card-image">
        <img src="fotos/soluc.png" class="fotocard">
    </div>
    <div class="category"> </div> <br><br>
    <div class="heading"> A heading that must span over two lines
        <div class="author"> By <span class="name">Abi</span> 4 days ago</div>
        <img src="fotos/estrela" class="fotocard2">
        <h5>5.0</h5>
        
    </div>
</div>


<?php



$produtos = listarProduto($conexao);

foreach ($produtos as $produto) {
    // Exibe o nome do produto
    echo "<h2>" . htmlspecialchars($produto['produto']) . "</h2>";
    
    // Exibe tamanho
    echo "<p>Tamanho: " . htmlspecialchars($produto['tamanho']) . "</p>";
    
    // Exibe valor
    echo "<p>Valor: R$ " . number_format($produto['valor'], 2, ',', '.') . "</p>";
    
    // Exibe estoque
    echo "<p>Estoque: " . htmlspecialchars($produto['estoque']) . "</p>";

    // Exibe desconto se houver
    if (isset($produto['desconto']) && $produto['desconto'] > 0) {
        echo "<p>Desconto: " . htmlspecialchars($produto['desconto']) . "%</p>";
    }
    
    // Exibe descrição
    echo "<p>Descrição: " . htmlspecialchars($produto['descricao']) . "</p>";
    
    // Exibe avaliação, se disponível
    $avaliacao = isset($produto['avaliacao']) ? $produto['avaliacao'] : "Não avaliado";
    echo "<p>Avaliação: " . htmlspecialchars($avaliacao) . " estrelas</p>";
    
    // Exibe comentário, se disponível
    $comentario = isset($produto['comentario']) ? $produto['comentario'] : "Sem comentários.";
    echo "<p>Comentário: " . htmlspecialchars($comentario) . "</p>";
    
    // Link para página do produto (presumindo que você tenha um campo 'id' no banco)
    $idProduto = $produto['id']; // Substitua com o campo correto
    echo '<a href="produto.php?id=' . $idProduto . '">Ver detalhes</a>';
    
    echo "<hr>";
}




// $produtos=listarProduto($conexao);

// foreach ($produtos as $produto) {
//     echo "<h2>".$produto['produto']."</h2>";
//     echo "<p>Tamanho: ".$produto['tamanho']."</p>";
//     echo "<p>Valor: R$ ".$produto['valor']."</p>";
//     echo "<p>Estoque: ".$produto['estoque']."</p>";
//     // o descoto so deve aparecer se tiver desconto
//     if ($produto['desconto'] > 0) {
//         echo "<p>Desconto: ".$produto['desconto']."%</p>";
//     }
    
//     echo "<p>Descrição: ".$produto['descricao']."</p>"; 
//     echo "<p>Avaliação: ".$produto['avaliacao']." estrelas</p>";
//     echo "<p>Comentário: ".$produto['comentario']."</p>";
//     echo'<a href="">aaa</a>';
//     echo "<hr>";
// 
// quando clicar ir para a paguina de um produto






?>













    
</body>
</html>