<?php
session_start();

// inicializa array de cartões se ainda não existe
if (!isset($_SESSION['cartoes'])) {
    $_SESSION['cartoes'] = [
        ['final' => '8.534', 'cor' => '#2b3b33', 'titular' => 'Meu Cartão'],
        ['final' => '3.931', 'cor' => '#4a1b1b', 'titular' => 'Outro Cartão']
    ];
}

// mensagem opcional (ex: após adicionar/cancelar)
$msg = '';
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Seleção de Cartão</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <div>
        <div class="title-line">cartao de credito</div>
        <div class="title-line sub">ou debito</div>
      </div>
    </div>

    <?php if ($msg): ?>
      <div class="msg"><?php echo $msg; ?></div>
    <?php endif; ?>

    <div class="actions-row">
      <a class="add-btn" href="add_card.php">+ Adicionar novo cartão</a>
    </div>

    <div class="cards">
      <?php foreach ($_SESSION['cartoes'] as $idx => $cartao): ?>
        <form class="card-option" action="pagamento.php" method="post">
          <input type="hidden" name="cartao_final" value="<?php echo htmlspecialchars($cartao['final']); ?>">
          <input type="hidden" name="cartao_titular" value="<?php echo htmlspecialchars($cartao['titular']); ?>">
          <div class="card-info">
            <div class="chip" style="background: <?php echo htmlspecialchars($cartao['cor']); ?>;"></div>
            <div>
              <div class="card-tit"><?php echo htmlspecialchars($cartao['titular']); ?></div>
              <div class="card-final"><?php echo '***.**' . htmlspecialchars($cartao['final']); ?></div>
            </div>
          </div>

          <div class="card-actions">
            <button class="arrow-btn" type="submit" title="Usar este cartão">➜</button>
          </div>
        </form>
      <?php endforeach; ?>
    </div>

    <div class="footer-row">
      <form id="form-cancelar" action="area_cliente.php" method="post">
        <input type="hidden" name="acao" value="cancelar">
        <button id="btn-cancelar" type="submit" class="cancel-btn">Cancelar</button>
      </form>

      <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>
  </div>

<script>
document.getElementById('form-cancelar').addEventListener('submit', function(e){
  if (!confirm('Deseja realmente cancelar?')) e.preventDefault();
});
</script>
</body>
</html>
