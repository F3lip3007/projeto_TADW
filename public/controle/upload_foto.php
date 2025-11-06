<?php
session_start();

require_once "../conexao.php";
require_once "../funcoes.php";
?>

<?php
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $pasta = "foto/"; // pasta onde será salva

    // cria a pasta se não existir
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    // pega a extensão e cria um nome único
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novoNome = uniqid("img_") . "." . strtolower($extensao);
    $caminho = $pasta . $novoNome;

    // move o arquivo pra pasta
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
        echo "Caminho da foto: " . $caminho;
    } else {
        echo "Erro ao mover a foto.";
    }
} else {
    echo "Nenhuma foto enviada.";
}
?>
