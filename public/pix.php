<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    
        <?php
// ===== CONFIGURAÇÃO =====
// Substitua pelo seu código Pix real:
$pixCode = "00020126580014BR.GOV.BCB.PIX01362d86bb97-ac51-4e86-99c1-1eaa4f182c9a520400005303398654040.015802BR5925Julia Antonia Souza Viana6009SAO PAULO61080540900062250521995e20mV9BQigFdg8mdu2630414B2";
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Pagamento — Pix</title>

  <!-- Link para o CSS externo -->
  <link rel="stylesheet" href="style.css">

  <!-- Biblioteca QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" defer></script>
</head>
<body>
  <div class="pix-card">
    <div class="left">
      <h1>Pix</h1><br>
      <h3>Pague e será creditado na hora</h3>
      <ul>
        <li>Acesse seu Internet Banking ou app de pagamentos.</li>
        <li>Escolha pagar via Pix.</li>
        <li>Escaneie o QR Code ou copie o código abaixo:</li>
      </ul>

      <pre id="pixCode"><?php echo htmlspecialchars($pixCode); ?></pre>
      <button class="btn" id="copyBtn">Copiar código</button>
      <button class="btn-cancel" id="cancelBtn">Cancelar</button>
    </div>

    <div class="qr-box">
      <div id="qrcode"></div>
    </div>
  </div>

  <script>
    const pixCode = document.getElementById('pixCode').innerText.trim();

    document.addEventListener("DOMContentLoaded", function(){
      new QRCode(document.getElementById("qrcode"), {
        text: pixCode,
        width: 250,
        height: 250
      });
    });

    document.getElementById("copyBtn").addEventListener("click", async ()=>{
      try {
        await navigator.clipboard.writeText(pixCode);
        alert("Código Pix copiado!");
      } catch {
        alert("Não foi possível copiar automaticamente.");
      }
    });

    document.getElementById("cancelBtn").addEventListener("click", ()=>{
      if (confirm("Deseja cancelar o pagamento?")) {
        window.location.href = "/";
      }
    });
  </script>
        <form action="sucesso.php" method="post">
      <button type="submit" class="btn">Confirmar Pagamento</button>
</body>
</html>


</body>
</html>