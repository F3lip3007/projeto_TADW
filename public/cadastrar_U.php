<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro</title>
  <link rel="stylesheet" href="style.css" />
  <script src="./controle/jquery-3.7.1.min.js"></script>
  <script src="./controle/jquery.validate.min.js"></script>
  <script src="./controle/jquery.mask.min.js"></script>
  <script>
    $('document').ready(function () {
      $(".btn-toggle-password").click(function () {
        const targetId = $(this).data("target");
        const input = $("#" + targetId);
        const tipoAtual = input.attr("type");
        input.attr("type", tipoAtual === "password" ? "text" : "password");
      });

      $('#numero').mask('(00) 0 0000-0000');
      $('#cpf').mask('000.000.000-00', { reverse: true });

      $("form").validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          senha: {
            required: true,
            minlength: 2,
          },
          confirma_senha: {
            required: true,
            equalTo: "#senha",
          },
          numero: {
            required: true,
          },
          cpf: {
            required: true,
            minlength: 14,
          },
        },
        messages: {
          email: {
            required: "Por favor, insira seu e-mail",
            email: "Por favor, insira um e-mail válido",
          },
          senha: {
            required: "Por favor, insira sua senha",
            minlength: "Sua senha deve ter pelo menos 6 caracteres",
          },
          confirma_senha: {
            required: "Por favor, confirme sua senha",
            equalTo: "As senhas não coincidem",
          },
          numero: {
            required: "Por favor, insira seu Número",
          },
          cpf: {
            required: "Por favor, insira seu CPF",
          },
        }
      });
    });
  </script>
</head>

<body>

  <!-- Barra preta fixa no topo com letreiro -->
  <div class="top-bar">
    <div class="scrolling-text">
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
      ㅤ Solucㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc ㅤ Soluc 
    </div>
  </div>

  <!-- Container geral com imagem e formulário centralizados -->
  <div class="container">

    <!-- Imagem fora do formulário -->
    <img src="./fotos/soluc.png" alt="Logo da Soluc" style="display: block; margin: 80px auto 20px; max-width: 300px;">

    <!-- Formulário -->
    <div class="form-container">
      <h2 class="form-title">Cadastrar Usuário</h2>

      <form method="POST" action="./controle/salvar_U.php" enctype="multipart/form-data">

        <div class="form-group">
          <label for="email">Nome de Usuario:</label>
          <input type="text" id="nome" name="nome" placeholder="Digite seu Nome" class="input" required>
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="Digite seu E-mail" class="input" required>
        </div>

        <div class="form-group">
          <label for="senha">Senha:</label>
          <div class="input-password-wrapper">
            <input type="password" id="senha" name="senha" placeholder="Digite sua Senha" class="input" required>
            <button type="button" class="btn-toggle-password" aria-label="Mostrar senha" data-target="senha">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>  
            </button>
          </div>
        </div>

        <div class="form-group">
          <label for="confirma_senha">Confirme a Senha:</label>
          <div class="input-password-wrapper">
            <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Confirme sua Senha" class="input" required>
            <button type="button" class="btn-toggle-password" aria-label="Mostrar confirmação de senha" data-target="confirma_senha">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Numero:</label>
          <input type="text" id="numero" name="numero" placeholder="Digite seu Numero" class="input" required>
        </div>

        <div class="form-group">
          <label for="email">CPF:</label>
          <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" class="input" required>
        </div>

        <div class="form-group">
          <label for="foto">Foto:</label>
          <input type="file" id="foto" name="foto" class="input">
        </div>

        <div class="form-group button-container">
          <button type="submit" class="button">Cadastrar</button>
        </div>

      </form>
    </div>
  </div>

</body>
</html>
