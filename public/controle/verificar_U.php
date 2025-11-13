<?php
session_start(); // sempre primeiro******
require_once "./conexao.php";
require_once "./func.php";
// echo $_SESSION['id_usuario'];

    // ta funcionando não mexe

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $usuario = pegarDadosUsuario($conexao, $id_usuario);
    // echo $usuario['isadmin'];
    $_SESSION['isadmin'] = $usuario['isadmin'];
    $_SESSION['logado'] = 'sim';    

    if ($_SESSION['isadmin'] == 1) {
        header("Location: ../area_cliente.php") ;
        exit;
    } else {
        header("Location: ../area_funcionario.php");
        exit;
    }
} else {
    // Evita warnings se o formulário vier sem dados
    if (isset($_POST['emailOuNome']) && isset($_POST['senha'])) {
        $emailOuNome = $_POST['emailOuNome'];
        $senha = $_POST['senha'];
        // echo $emailOuNome;
        // echo $senha;

        $id_u = verificarLogin($conexao, $emailOuNome, $senha);

        if ($id_u == 0) {
            header("Location: ../index.php");
            // echo '8i';

            exit;

        } else {
            $usuario = pegarDadosUsuario($conexao, $id_u);
            // echo $usuario['isadmin'];

            if ($usuario == 0) {
                // Redirecionamento se não encontrar dados do usuário
                // header("Location: ../index.php");
                // echo '1i';
                exit;

            } else {
                $_SESSION['logado'] = 'sim';
                $_SESSION['isadmin'] = $usuario['isadmin'];
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                // echo $_SESSION['id_usuario'];
                // echo '2i';
                if ($_SESSION['isadmin'] == 1) {
                    header("Location: ../area_cliente.php");
                    exit;
                } else {
                    header("Location: ../area_funcionario.php");
                    exit;
                }
            }
        }
    } else {
        // Se os dados não foram enviados corretamente, você pode adicionar uma validação aqui
        echo "Dados não foram enviados corretamente.";
        exit;
    }
}       
?>
