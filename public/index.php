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
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
    </div>
  </div>

  <!-- Container principal -->
  <div class="container">

   <!-- 🔷 Imagem/logo centralizada -->
   <img src="./fotos/soluc.png" alt="Logo da Soluc" style="display: block; margin: 80px auto 20px; max-width: 330px;">

  <!-- 🔷 Container do formulário -->
  <div class="form-container">
     <h2>Login</h2>
    
     <form class="form" action="" method="POST">

        <div class="field">
          <input type="text" name="username" placeholder="Nome de usuário" class="input" autocomplete="off" required>
        </div>

        <div class="field">
          <input type="password" name="password" placeholder="Senha" class="input" required>
        </div>

         <div class="button-div">
          <button type="submit" class="button">Logar</button> <br> <br>
          <button type="button" class="button voltar">Cadastrar-ser</button>
        </div>

      </form>
    
   </div>
  </div>
</body>
</html>
