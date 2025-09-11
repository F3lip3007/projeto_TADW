<?php

require_once "../conexao.php";
require_once "../func.php";

$foto = "adada";
$email = "aaaaabba";
$senha = "aaaa";
$isadmin = "11"; 
$nome = "jao";

$idusuario = salvarUsuario($conexao, $foto, $email, $senha, $isadmin,$nome);


?>