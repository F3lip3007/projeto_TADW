<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cupons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS externo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

<h1 style="text-align: center; margin-bottom: 30px;">Cupons</h1>

<?php
// Lista de cupons
$cupons = [
    [
        "titulo" => "10% OFF",
        "descricao" => "Pedidos R$50+",
        "desconto" => 10,
        "minimo" => 50,
        "expira" => time() + 12 * 3600 + 29 * 60 + 28 // expira em 12h 29m 28s
    ],
    [
        "titulo" => "45% OFF",
        "descricao" => "Pedidos R$150+",
        "desconto" => 45,
        "minimo" => 150,
        "expira" => time() + 5 * 3600 + 15 * 60 // expira em 5h 15m
    ],
    [
        "titulo" => "Frete Grátis",
        "descricao" => "Pedidos R$100+",
        "desconto" => 0,
        "minimo" => 100,
        "expira" => time() + 8 * 3600 // expira em 8h
    ],
];

// Função para formatar tempo restante
function tempoRestante($expira) {
    $restante = $expira - time();
    if ($restante <= 0) return "Expirado";

    $h = floor($restante / 3600);
    $m = floor(($restante % 3600) / 60);
    $s = $restante % 60;
    return sprintf("%02d:%02d:%02d", $h, $m, $s);
}
?>

<div class="cupom-container">
<?php foreach($cupons as $cupom): ?>
    <div class="cupom">
        <p><strong>Novo</strong></p>
        <h2><?php echo htmlspecialchars($cupom['titulo']); ?></h2>
        <p><?php echo htmlspecialchars($cupom['descricao']); ?></p>
        <button>Comprar</button>
        <p>Expira em <?php echo tempoRestante($cupom['expira']); ?></p>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>

