<?php
session_start();

// Inicializa o array de cartões caso não exista
if (!isset($_SESSION['cartoes'])) {
    $_SESSION['cartoes'] = [];
}

// Excluir cartão
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    if ($_POST['acao'] === 'excluir') {
        $indice = intval($_POST['indice']);
        if (isset($_SESSION['cartoes'][$indice])) {
            unset($_SESSION['cartoes'][$indice]);
            $_SESSION['cartoes'] = array_values($_SESSION['cartoes']);
            $msg = "Cartão excluído com sucesso!";
        } else {
            $msg = "Cartão não encontrado.";
        }
    }
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
  <h2>Seus Cartões</h2>

  <?php if (!empty($msg)): ?>
    <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
  <?php endif; ?>

  <div class="actions-row">
    <a class="add-btn" href="add_card.php">+ Adicionar novo cartão</a>
  </div>

  <div class="cards">
    <?php if (empty($_SESSION['cartoes'])): ?>
      <p>Não existe cartão.</p>
    <?php else: ?>
      <?php foreach ($_SESSION['cartoes'] as $idx => $cartao): ?>
        <div class="card-option">
          <form action="sucesso.php" method="post" style="display:inline;">
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

          <form method="post" onsubmit="return confirm('Deseja realmente excluir este cartão?');" style="display:inline;">
            <input type="hidden" name="acao" value="excluir">
            <input type="hidden" name="indice" value="<?php echo $idx; ?>">
            <button type="submit" class="delete-btn" title="Excluir este cartão">🗑️</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
