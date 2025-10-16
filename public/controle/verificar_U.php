<?php
require_once "./conexao.php";
require_once "./func.php";
session_start(); // sempre primeiro******
// $id_usuario = $_SESSION['id_usuario'];

if (isset($_SESSION['id_usuario'])) {
    $usuario = pegarDadosUsuario($conexao, $id_usuario);
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

        $id_usuario = verificarLogin($conexao, $emailOuNome, $senha);

        if ($id_usuario == 0) {
            header("Location: ../index.php");

            exit;

        } else {
            $usuario = pegarDadosUsuario($conexao, $id_usuario);

            if ($usuario == 0) {
                // Redirecionamento se não encontrar dados do usuário
                header("Location: ../index.php");
                exit;
            } else {
                $_SESSION['logado'] = 'sim';
                $_SESSION['isadmin'] = $usuario['isadmin'];
                // $_SESSION['tb_id_usuario'] = $usuario['tb_id_usuario'];

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
