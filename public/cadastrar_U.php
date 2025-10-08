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
    $(document).ready(function () {
      $('#numero').mask('(00) 0 0000-0000');
      $('#cpf').mask('000.000.000-00', { reverse: true });

      $("form").validate({
        rules: {
          email: { required: true, email: true },
          senha: { required: true, minlength: 6 },
          confirma_senha: { required: true, equalTo: "#senha" },
          numero: { required: true },
          cpf: { required: true, minlength: 14 }
        },
        messages: {
          email: {
            required: "Por favor, insira seu e-mail",
            email: "Por favor, insira um e-mail válido"
          },
          senha: {
            required: "Por favor, insira sua senha",
            minlength: "Sua senha deve ter pelo menos 6 caracteres"
          },
          confirma_senha: {
            required: "Por favor, confirme sua senha",
            equalTo: "As senhas não coincidem"
          },
          numero: {
            required: "Por favor, insira seu Número"
          },
          cpf: {
            required: "Por favor, insira seu CPF"
          }
        }
      });

      // Toggle password visibility
      $(".btn-toggle-password").click(function () {
        const targetId = $(this).data("target");
        const input = $("#" + targetId);
        const eyeImg = $(this).find("img"); 
        if (input.attr("type") === "password") {
          input.attr("type", "text");
          eyeImg.attr("src", "https://img.icons8.com/ios-glyphs/30/ffffff/closed-eye.png");
          eyeImg.attr("alt", "Ocultar senha");
        } else {
          input.attr("type", "password");
          eyeImg.attr("src", "https://img.icons8.com/ios-glyphs/30/ffffff/visible--v1.png");
          eyeImg.attr("alt", "Mostrar senha");
        }
      });
    });
  </script>
</head>

<body>

  <div class="top-bar">
    <div class="scrolling-text">
      SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC ㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUCㅤㅤㅤㅤ SOLUC
    </div>
  </div>

  <div class="container">

    <img src="./fotos/soluc.png" alt="Logo da Soluc" style="display: block; margin: 178px auto 20px; max-width: 300px;" />

    <div class="form-container">
      <h2>Cadastrar Usuário</h2>

      <form method="POST" action="./controle/salvar_U.php" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nome">Nome de Usuário:</label>
          <input type="text" id="nome" name="nome" placeholder="Digite seu Nome" class="input" required />
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="Digite seu E-mail" class="input" required />
        </div>

        <div class="form-group">
          <label for="senha">Senha:</label>
          <div class="input-password-wrapper">
            <input type="password" id="senha" name="senha" placeholder="Digite sua Senha" class="input" required />
            <button type="button" class="btn-toggle-password" data-target="senha" aria-label="Mostrar senha">
              <img
                src="https://img.icons8.com/ios-glyphs/30/ffffff/visible--v1.png"
                alt="Mostrar senha"
                draggable="false"
              />
            </button>
          </div>
        </div>

        <div class="form-group">
          <label for="confirma_senha">Confirme a Senha:</label>
          <div class="input-password-wrapper">
            <input
              type="password"
              id="confirma_senha"
              name="confirma_senha"
              placeholder="Confirme sua Senha"
              class="input"
              required
            />
            <button type="button" class="btn-toggle-password" data-target="confirma_senha" aria-label="Mostrar confirmação de senha">
              <img
                src="https://img.icons8.com/ios-glyphs/30/ffffff/visible--v1.png"
                alt="Mostrar confirmação de senha"
                draggable="false"
              />
            </button>
          </div>
        </div>

        <div class="form-group">
          <label for="numero">Número:</label>
          <input type="text" id="numero" name="numero" placeholder="Digite seu Número" class="input" required />
        </div>

        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" class="input" required />
        </div>

        <div class="form-group">
          <label for="foto">Foto:</label>
          <input type="file" id="foto" name="foto" class="input-file" accept="image/*" />
          <label for="foto" class="file-label" title="Escolher foto de perfil" id="foto-label">
            <!-- Ícone círculo padrão -->
            <svg
              viewBox="0 0 24 24"
              fill="currentColor"
              height="40"
              width="40"
              xmlns="http://www.w3.org/2000/svg"
              id="foto-svg-icon"
            >
              <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67
                0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
              />
            </svg>
          </label>
        </div>

        <div class="form-group button-container">
          <button type="submit" class="button">Cadastrar</button>
        </div>

      </form>
    </div>
  </div>

  <script>
    // Quando o usuário escolher uma foto, substituir o ícone pelo preview da foto dentro do círculo
    document.getElementById('foto').addEventListener('change', function(event) {
      const input = event.target;
      const label = document.getElementById('foto-label');
      const svgIcon = document.getElementById('foto-svg-icon');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          // Cria uma imagem com border-radius circular para substituir o svg
          const img = document.createElement('img');
          img.src = e.target.result;
          img.style.width = '40px';
          img.style.height = '40px';
          img.style.borderRadius = '50%';
          img.style.objectFit = 'cover';
          img.style.display = 'block';

          // Remove SVG e adiciona imagem
          if(svgIcon) {
            svgIcon.style.display = 'none';
          }

          // Remove imagem antiga se já existir
          const oldImg = label.querySelector('img');
          if (oldImg) {
            label.removeChild(oldImg);
          }

          label.appendChild(img);
        };

        reader.readAsDataURL(input.files[0]);
      } else {
        // Se desmarcar o arquivo, volta o svg padrão
        if(svgIcon) {
          svgIcon.style.display = 'block';
        }
        // Remove imagem preview se existir
        const oldImg = label.querySelector('img');
        if (oldImg) {
          label.removeChild(oldImg);
        }
      }
    });
  </script>

</body>
</html>
