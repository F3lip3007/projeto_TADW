<?php
require_once './controle/conexao.php';
require_once './controle/func.php';  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
</head>
<body>
<?php
$cliente = listarCliente($conexao);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID Cliente</th>
        <th>Número</th>
        <th>CPF</th>
        <th>ID Usuário</th>
      </tr>";

// o loop cria as linhas com os dados dos clientes
foreach($cliente as $cli){
    echo "<tr>";
    echo "<td>".$cli['id_cliente']."</td>";
    echo "<td>".$cli['numero']."</td>";
    echo "<td>".$cli['cpf']."</td>";
    echo "<td>".$cli['tb_id_usuario']."</td>";
    echo "</tr>";
}

echo "</table>";
?>  
</body>
</html>

<?php
require_once './controle/conexao.php';
require_once './controle/func.php';  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>

<?php
// Chama a função que lista os clientes
$clientes = listarCliente($conexao);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID Cliente</th>
        <th>Número</th>
        <th>CPF</th>
        <th>ID Usuário</th>
      </tr>";

// Loop para exibir os dados
foreach($clientes as $cli){
    echo "<tr>";
    echo "<td>".$cli['id_cliente']."</td>";
    echo "<td>".$cli['numero']."</td>";
    echo "<td>".$cli['cpf']."</td>";
    echo "<td>".$cli['tb_id_usuario']."</td>";
    echo "</tr>";
}

echo "</table>";
?>  

</body>
</html>
