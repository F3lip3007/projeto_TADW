<!-- <?php

        if (isset($_SESSION['logado'])) {
            header("Location:menuprincipal.php");
        }
        ?> 
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <head>

    <body>
        <h2>Já sou cliente/Registrar<h2>

                <form action="<?php salvarCliente($conexao, $nome, $cpf, $endereco); ?>" method="post">
                    <div class="login">

                        <h3>E-mail:</h3> <br>
                        <input type="text" name="email"> <br><br>

                        <h3>Senha: </h3> <br>
                        <input type="password" name="senha"> <br><br>

                        <input type="submit" value="Entrar"><br>


                        <php>
                </form>
                <a href="cadastra usuario">criar nova conta </a>
                <form action="../controle/usuariohash.php" method="post">
                    <h1>Novo usuário</h1>
                    <h3>E-mail:</h3>
                    <input type="text" name="email">

                    <h3>Senha:</h3>
                    <input type="text" name="senha">
                    <br><br>

                    <input type="submit" value="cadrastar " class="btn btn-primary">
                </form>



    </body>
</head>

</html>