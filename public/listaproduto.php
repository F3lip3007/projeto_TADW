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
$produto=listarProduto($conexao);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Produto</th>
        <th>Tamanho</th>
        <th>Valor</th>
        <th>Estoque</th>
        <th>Desconto</th>
        <th>Descrição</th>
        <th>Avaliação</th>
        <th>Comentário</th>
        <th>Tipo</th>
      </tr>";

// aqui o loop só cria as linhas, sem repetir a tabela
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

echo "</table>";


?>  

</body>
</html>