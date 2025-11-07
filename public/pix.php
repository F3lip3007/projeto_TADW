<?php

$id_produto= $_GET['id_produto'];
$quantidade= $_GET['quantidade'];
// echo $id_produto;
// echo $quantidade;
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

  <div class="top-bar">
    <div class="color-change">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

    <!-- Imagem no canto superior esquerdo -->
    <img src="./fotos/soluc.png" alt="Logo da Soluc"
     style="position: absolute; top: 80px; left: 20px; max-width: 150px;">

     <!-- Botão ícone perfil redondo -->
<button class="profile-toggle" onclick="toggleRightMenu()" aria-label="Menu Perfil" title="Menu Perfil">
  <svg width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
    <!-- Círculo externo -->
    <circle cx="32" cy="32" r="30" stroke="#333" stroke-width="3" fill="#eee6e6ff"/>
    <!-- Cabeça -->
    <circle cx="32" cy="22" r="10" fill="#333" />
    <!-- Corpo -->
    <path d="M20 52c0-7 24-7 24 0v4H20v-4z" fill="#333"/>
  </svg>
</button>

 <!-- Menu lateral da direita -->
<nav class="right-side-menu" id="rightSideMenu">
  <div class="menu-section">
    <p class="menu-title">👤 Meu Perfil</p>
  </div>

  <hr>

  <div class="menu-section">
         <a href="perfil.html" class="link" style="display: block;"><span>👤</span> Perfil</a></a>

<a href="carinho.php" class="link" style="display: flex; align-items: center; gap: 5px; text-decoration: none; color: inherit;">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="9" cy="21" r="1"></circle>
    <circle cx="20" cy="21" r="1"></circle>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
  </svg>
  <span>Carrinho</span>
</a>



    <a href="cupom.php" class="link" style="display: block;"><span>🏷️</span> Cupons</a></a>

    <a href="area_cliente.php" class="link" style="display: block;"><span>🏠</span> Home</a></a>

  </div>

  <hr>

  <div class="menu-section">

    <a href="cadastrar.html" class="link" style="display: flex; align-items: center; gap: 5px; text-decoration: none; color: inherit;">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
    <polyline points="16 17 21 12 16 7"></polyline>
    <line x1="21" y1="12" x2="9" y2="12"></line>
  </svg>
  <span>Sair</span>
</a>

  </div>
</nav>



<?php

$pixCode = "00020126580014BR.GOV.BCB.PIX01362d86bb97-ac51-4e86-99c1-1eaa4f182c9a520400005303398654040.015802BR5925Julia Antonia Souza Viana6009SAO PAULO61080540900062250521995e20mV9BQigFdg8mdu2630414B2";
?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" defer></script>
  <h1 style="text-align: center;">Pix</h1>


  <div class="pix-card">
    <div class="left">
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
      <form action="./controle/venda.php" method="post" class="confirm-form">
      <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
      <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
        <button type="submit" class="btn confirm-btn">Confirmar Pagamento</button>
      </form>
    </div>
  </div>

  <script>
    const pixCode = document.getElementById('pixCode').innerText.trim();

    document.addEventListener("DOMContentLoaded", function(){
      new QRCode(document.getElementById("qrcode"), {
        text: pixCode,
        width: 180,
        height: 180
      });
    });

    document.getElementById("copyBtn").addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(pixCode);
        alert("Código Pix copiado!");
      } catch {
        alert("Não foi possível copiar automaticamente.");
      }
    });

    document.getElementById("cancelBtn").addEventListener("click", () => {
      if (confirm("Deseja cancelar o pagamento?")) {
        window.location.href = "/";
      }
    });
  </script>
  <script>
function toggleRightMenu() {
  const menu = document.getElementById("rightSideMenu");
  const button = document.querySelector(".profile-toggle");

  menu.classList.toggle("active");

  // Alterna visibilidade do botão
  if (menu.classList.contains("active")) {
    button.style.display = "none";
  } else {
    button.style.display = "block";
  }
}

// Fecha ao clicar fora
document.addEventListener("click", function (e) {
  const menu = document.getElementById("rightSideMenu");
  const button = document.querySelector(".profile-toggle");

  if (!menu.contains(e.target) && !button.contains(e.target)) {
    menu.classList.remove("active");
    button.style.display = "block";
  }
});
</script>
</body>
</html>
