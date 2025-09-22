
<?php
    require_once "./controle/conexao.php";
    require_once "./controle/func.php";


    if (!isset($_POST['senha']) || !isset($_POST['email'])) {
    echo "Campos obrigatórios não preenchidos.";
    exit;
    $senha = $_POST['senha'];
    $email = $_POST['email'];

};
    echo "$email";
    echo "$senha";

    $id_usuario = verificarLogin($conexao, $email, $senha);

    if ($id_usuario == 0) {
        header("Location: index.php");
    }
    else {
        $usuario = pegarDadosUsuario($conexao, $id_usuario);
        
        if ($usuario == 0) {
            header("Location: index.php");
        }
        else {
            session_start();
            $_SESSION['logado'] = 'sim';
            $_SESSION['isadmin'] = $usuario['isadmin'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: home.php");
        }
    }
?>