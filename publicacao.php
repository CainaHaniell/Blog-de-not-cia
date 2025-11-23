<?php
// Inicia a sessão para poder usar as variáveis de sessão
session_start();

// Verifica se o usuário está logado
// A variável 'logado' é definida como 'true' no login.php após a autenticação
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // Se não estiver logado, redireciona para a página de login e encerra o script
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="Img/Branco.png" type="image/x-icon">
<link rel="stylesheet" href="Css/publicacao.css" />
<title>Painel de Publicação</title>
</head>
<body>
  <header>
    <div class="logo-container">
      <a href="index.php"><h1>Vozes do Sertão</h1></a>
    </div>
    
    <nav class="nav-categorias">
  <ul>
    <li><a href="emprego.php">Emprego</a></li>
    <li><a href="concurso.php">Concurso</a></li>
    <li><a href="politica.php">Política</a></li>
    <li><a href="brasil.php">Brasil</a></li>
  </ul>
</nav>

   
        <a href="login.php" class="btn-login">Login</a>
  </header>
 <h1 class="titulo">Painel de Publicação</h1>

  <form action="salvar_noticia.php" method="POST" enctype="multipart/form-data">
    <div class="linha-flex">
      <div>
        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria" required>
          <option value="">Selecione</option>
          <option value="emprego">Emprego</option>
          <option value="concurso">Concurso</option>
          <option value="politica">Política</option>
          <option value="brasil">Brasil</option>
        </select>
      </div>
      <div>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required />
      </div>
    </div>

    <div class="linha-flex">
      <div>
        <label for="subtitulo">Subtítulo</label>
        <input type="text" id="subtitulo" name="subtitulo" required />
      </div>
      <div>
        <label for="fonte">Fonte</label>
        <input type="text" id="fonte" name="fonte" placeholder="Fonte da notícia" />
      </div>
    </div>

    <div>
      <label for="conteudo">Texto da Notícia</label>
      <textarea id="conteudo" name="conteudo" placeholder="Digite a matéria" required></textarea>
    </div>

    <div>
      <label for="imagem">Imagem da Notícia</label>
      <input type="file" id="imagem" name="imagem" accept="image/*" />
    </div>

    <button type="submit">Publicar</button>
  </form>

  </body>
</html>