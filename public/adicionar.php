<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: debito.php');
    exit;
}

$titular = trim($_POST['titular'] ?? '');
$final = trim($_POST['final'] ?? '');
$cor = trim($_POST['cor'] ?? '');

// validações simples
$errors = [];

if ($titular === '') $errors[] = 'Titular é obrigatório.';
if (!preg_match('/^\d{1,4}$/', $final)) $errors[] = 'Últimos dígitos inválidos (somente números, até 4).';
if ($cor !== '' && !preg_match('/^#([A-Fa-f0-9]{6})$/', $cor)) $errors[] = 'Cor inválida. Use formato hex #rrggbb.';

if (!empty($errors)) {
    $msg = implode(' ', $errors);
    header('Location: add_card.php?msg=' . urlencode($msg));
    exit;
}

// cor default se vazio
if ($cor === '') $cor = '#6aa84f';

// adiciona na sessão
if (!isset($_SESSION['cartoes'])) $_SESSION['cartoes'] = [];

$_SESSION['cartoes'][] = [
    'final' => htmlspecialchars($final),
    'cor' => htmlspecialchars($cor),
    'titular' => htmlspecialchars($titular)
];

// redireciona pra lista com mensagem
header('Location: debito.php?msg=' . urlencode('Cartão adicionado com sucesso.'));
exit;
