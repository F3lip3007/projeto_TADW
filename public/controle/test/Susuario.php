<?php

require_once "../conexao.php";
require_once "../func.php";

$foto = "adada";
$email = "aaa@aabba";
$senha = "aaaa";
$isadmin = "1"; 
$nome = "jao";

$idusuario = salvarUsuario($conexao, $foto, $email, $senha, $isadmin,$nome);


?>