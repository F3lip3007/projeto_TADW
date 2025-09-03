<!-- <?php

        if (isset($_SESSION['logado'])) {
            header("Location:menuprincipal.php");
        }
        ?> 
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">// function salvarCliente($numero, $cpf, $email = null) {
//     // Exemplo: salvar no banco de dados
//     // Adaptar conforme sua conexão e lógica

//     $conexao = new PDO('mysql:host=localhost;dbname=seubanco', 'usuario', 'senha');

//     // Ajuste a query dependendo se o email foi informado
//     if ($email) {
//         $stmt = $conexao->prepare("INSERT INTO clientes (numero, cpf, email) VALUES (?, ?, ?)");
//         $stmt->execute([$numero, $cpf, $email]);
//     } else {
//         $stmt = $conexao->prepare("INSERT INTO clientes (numero, cpf) VALUES (?, ?)");
//         $stmt->execute([$numero, $cpf]);
//     }
// }"width=device-width, initial-scale=1.0">
    <title>Document</title>

    <head>

    <body>
    <h3>Salvar</h3>
        <a href="controle/test/Scliente.php">Salvar Cliente</a><br>
        <a href="controle/test/Sproduto.php">Salvar Produto</a><br>
        <a href="controle/test/Sfuncionario.php">Salvar Funcionario</a><br>
        <a href="controle/test/Susuario.php">Salvar Usuario</a><br>
        <a href="controle/test/Svenda.php">Salvar Venda</a><br><br><br>


    <h3>Listar</h3>
        <a href="controle/test/Lcliente.php">Listar Cliente</a><br>
        <a href="controle/test/Lproduto.php">Listar Produto</a><br>
        <a href="controle/test/Lfuncionario.php">Listar Funcionario</a><br>
        <a href="controle/test/Lusuario.php">Listar Usuario</a><br>
        <a href="controle/test/Lvenda.php">Listar Venda</a><br><br><br>


    <h3>Editar</h3>
        <a href="controle/test/Ecliente.php">Editar Cliente</a><br>
        <a href="controle/test/Eproduto.php">Editar Produto</a><br>
        <a href="controle/test/Efuncionario.php">Editar Funcionario</a><br>
        <a href="controle/test/Eusuario.php">Editar Usuario</a><br>
        <a href="controle/test/Evenda.php">Editar Venda</a><br><br><br>


    <h3>Deletar</h3>
        <a href="controle/test/Dcliente.php">Deletar Cliente</a><br>
        <a href="controle/test/Dproduto.php">Deletar Produto</a><br>
        <a href="controle/test/Dfuncionario.php">Deletar Funcionario</a><br>
        <a href="controle/test/Dusuario.php">Deletar Usuario</a><br>
        <a href="controle/test/Dvenda.php">Deletar Venda</a><br><br><br>


    </body>
</head>

</html>