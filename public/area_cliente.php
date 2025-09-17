<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body> 



  
<form action="./controle/pesquisar_ropa.php" method="GET" class="mb-4">
  <div class="input-group">
    <input type="text" name="query" class="form-control" placeholder="Pesquisar..." required>
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

<a href="teste.html">
  <img src="" class="card-img-top mb-4" alt="Camiseta">
</a>

  <div class="card shadow-sm">
    <iframe id="meuIframe"
            src="./area_produto.php"
            style="border:0;"
            loading="lazy">
    </iframe>
    </div>
  </div>



  <!-- <script>
    const form = document.getElementById("formIframe");
    const input = document.getElementById("urlInput");
    const iframe = document.getElementById("meuIframe");

    form.addEventListener("submit", function(e) {
      e.preventDefault(); // evita recarregar a página
      let url = input.value.trim();

      Se o usuário digitar só "wikipedia.org", adiciona https://
      if (!url.startsWith("http://") && !url.startsWith("https://")) {
        url = "https://" + url;
      }

      iframe.src = url; // muda o endereço do iframe
    });
   </script> -->


    
</body>
</html> 