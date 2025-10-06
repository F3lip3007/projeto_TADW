
<?php
    require_once "./controle/conexao.php";
    require_once "./controle/func.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    echo "$email";
    echo "<br>";
    echo "$senha";

    $id_usuario = verificarLogin($conexao, $email, $senha);
    echo"$id_usuario";

        if ($id_usuario == 0){          
            header("Location: index.php");
            exit();
        }
        else {
            $usuario = pegarDadosUsuario($conexao, $id_usuario);
            
            if ($usuario == 0){
                header("Location:.index.php");
                exit();
            }     
            else {
                session_start();
                $_SESSION['logado'] = 'sim';
                $_SESSION['isadmin'] = $usuario['isadmin'];
                $_SESSION['nome'] = $usuario['nome'];
                header("Location: home.php");
                exit(); 
            }
        }
?>