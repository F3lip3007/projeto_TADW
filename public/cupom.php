<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Lista de cupons
$cupons = [
    [
        "titulo" => "10% OFF",
        "descricao" => "Pedidos R$50+",
        "desconto" => 10,
        "minimo" => 50,
        "expira" => time() + 12 * 3600 + 29 * 60 + 28 // 12:29:28 horas
    ],
    [
        "titulo" => "45% OFF",
        "descricao" => "Pedidos R$150+",
        "desconto" => 45,
        "minimo" => 150,
        "expira" => time() + 12 * 3600 + 29 * 60 + 28
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cupons</title>
</head>
<body>
    <h1>Cupons</h1>
    <?php foreach($cupons as $cupom): ?>
        <div>
            <p><strong>Novo</strong></p>
            <h2>R$<?php echo $cupom['titulo']; ?></h2>
            <p><?php echo $cupom['descricao']; ?></p>
            <button>Comprar</button>
            <p>Expira em <?php echo tempoRestante($cupom['expira']); ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>