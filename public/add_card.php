<?php
session_start();
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Adicionar Cartão</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container form-container">
    <h2>Adicione um novo cartão</h2>

    <form action="adicionar.php" method="post" class="add-form">
      <label>Nome do titular:
        <input type="text" name="titular" required placeholder="Nome impresso no cartão">
      </label>

      <label>Número (apenas os últimos 4 dígitos):
        <input type="text" name="final" required pattern="\d{1,4}" maxlength="4" placeholder="Ex: 8534">
      </label>

      <label>Cor do cartão (hex):
        <input type="text" name="cor" value="#4a8a49" pattern="^#([A-Fa-f0-9]{6})$" placeholder="#rrggbb">
        <small class="hint">use formato hex (ex: #2b3b33). Se vazio, será uma cor padrão.</small>
      </label>

      <div class="form-actions">
        <a class="back-link" href="index.php">Voltar</a>
        <button type="submit" class="continue-btn">Continuar</button>
      </div>
    </form>
  </div>
</body>
</html>
