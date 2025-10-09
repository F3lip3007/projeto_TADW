<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />

</head>

<body>

  <!-- 🔷 Barra preta com letreiro -->
  <div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <!-- Container principal -->
  <div class="container">

   <!-- 🔷 Imagem/logo centralizada -->
   <img src="./fotos/soluc.png" alt="Logo da Soluc" style="display: block; margin: 80px auto 20px; max-width: 330px;">

  <!-- 🔷 Container do formulário -->
  <div class="form-container">
     <h2>Login</h2>
    
     <form class="form" action="./controle/verificar_U.php" method="POST">
       <div class="field">
         <input type="text" name="emailOuNome" placeholder="Nome de usuário ou email" class="input" autocomplete="off" required>
        </div>  
        
        <div class="field senha-container">
          <input type="password" name="senha" id="password" placeholder="Senha" class="input" required>
          <span class="toggle-password" onclick="togglePassword()">
            <img src="https://img.icons8.com/ios-glyphs/30/000000/visible--v1.png" id="eye-icon" alt="Mostrar senha">
          </span>                 
        </div>


        <div class="button-div">
          <button type="submit" class="button">Logar</button> <br> <br>
          <a href="cadastrar_U.php">
            <button type="button" class="button voltar">Cadastrar-se</button>
          </a>
        </div>

      </form>
    
   </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.getElementById("eye-icon");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.src = "https://img.icons8.com/ios-glyphs/30/000000/closed-eye.png";
        eyeIcon.alt = "Ocultar senha";
      } else {
        passwordInput.type = "password";
        eyeIcon.src = "https://img.icons8.com/ios-glyphs/30/000000/visible--v1.png";
        eyeIcon.alt = "Mostrar senha";
      }
    }
  </script>

</body>
</html>
