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
</head>
<body>

<?php


$id_produto=$_GET['id_produto'];    


// $id_produto=1; // so para teste


$produto=pesquisarProdutoPorId($conexao,$id_produto);
echo "<h2>".$produto['produto']."</h2>";
echo "<p>Tamanho: ".$produto['tamanho']."</p>";
echo "<p>Valor: R$ ".$produto['valor']."</p>";
echo "<p>Estoque: ".$produto['estoque']."</p>";
// o descoto so deve aparecer se tiver desconto
if ($produto['desconto'] > 0) {
    echo "<p>Desconto: ".$produto['desconto']."%</p>";
}

echo "<p>Descrição: ".$produto['descricao']."</p>"; 
echo "<p>Avaliação: ".$produto['avaliacao']." estrelas</p>";
echo "<p>Comentário: ".$produto['comentario']."</p>";
    ?>
<input type='number' id='estoque' class='input' value='1' min='1' min='1' max='<?php echo $produto['estoque']; ?>'>

<?php
echo'<a href="">comprar</a>';
echo "<hr>";    




        ?>
</body>
</html> 
