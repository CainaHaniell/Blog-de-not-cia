<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="Img/Branco.png" type="image/x-icon">
<title>Detalhe da Notícia - Vozes do Sertão</title>
<link rel="stylesheet" href="Css/index.css" />
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  header {
    background-color: #A0522D;
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
  }
  .logo-container {
    text-align: center;
    margin-bottom: 10px;
  }
  h1 {
    margin: 0;
    font-size: 2.5em;
    font-weight: 700;
  }
  .h1, a {
    text-decoration: none;
    color: rgb(255, 255, 255);
  }
  .nav-categorias ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 20px;
  }
  .nav-categorias a {
    color: white;
    text-decoration: none;
    font-weight: 400;
    font-size: 1.1em;
    padding: 5px 10px;
    transition: background-color 0.3s;
  }
  .nav-categorias a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
  }
  .btn-login {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    background-color: #FF8C00;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
  }
  .btn-login:hover {
    background-color: #E67E00;
  }
  main {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  .noticia-categoria {
    display: inline-block;
    background-color: #FF8C00;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
    margin-bottom: 1rem;
  }
  img {
 
    max-width: 300px; /* limita a largura */
    width: 100%; /* responsiva */
    height: auto; /* mantém proporção */
    border-radius: 8px;
    margin-bottom: 1rem;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  h1.titulo-noticia {
    color: #A0522D;
  }
  small {
    color: #666;
  }
  a.back-link {
    display: inline-block;
    margin-bottom: 2rem;
    color: #A0522D;
    text-decoration: none;
    font-weight: 700;
  }
  a.back-link:hover {
    text-decoration: underline;
  }

</style>
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

<main>
    <?php
    // Verifica se um ID de notícia foi passado na URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $noticia_id = $_GET['id'];

        // Conexão com o banco de dados
                ;$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "blog_noticias";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Checa a conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Prepara a consulta para evitar injeção de SQL
        $stmt = $conn->prepare("SELECT * FROM noticias WHERE id = ?");
        $stmt->bind_param("i", $noticia_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $noticia = $result->fetch_assoc();
            
            // Exibe os dados da notícia na página
            echo '<a href="' . htmlspecialchars($noticia['categoria']) . '.php" class="back-link">&larr; Voltar para a categoria</a>';
            echo '<span class="noticia-categoria">' . ucfirst(htmlspecialchars($noticia['categoria'])) . '</span>';
            echo '<h1 class="titulo-noticia">' . htmlspecialchars($noticia['titulo']) . '</h1>';
            echo '<p><strong>' . htmlspecialchars($noticia['subtitulo']) . '</strong></p>';
            
            // Verifica se a imagem existe antes de exibi-la
            if (!empty($noticia['caminho_imagem']) && file_exists($noticia['caminho_imagem'])) {
                echo '<img src="' . htmlspecialchars($noticia['caminho_imagem']) . '" alt="' . htmlspecialchars($noticia['titulo']) . '" />';
            }

            echo '<p>' . nl2br(htmlspecialchars($noticia['conteudo'])) . '</p>';
            
            echo '<small>Fonte: ' . htmlspecialchars($noticia['fonte']) . ' | Publicado em: ';
            $data = new DateTime($noticia['data_publicacao']);
            echo $data->format('d/m/Y H:i:s');
            echo '</small>';

        } else {
            echo "<p>Notícia não encontrada.</p>";
        }

        $stmt->close();
        $conn->close();

    } else {
        echo "<p>Nenhuma notícia selecionada.</p>";
    }
    ?>
</main>

<footer class="footer">
    <p>"Entregue o seu caminho ao Senhor; confie nele, e ele agirá." - Salmos 37:5</p>
    <span>© 2025 SmartMach - Todos os direitos reservados</span>
</footer>
</body>
</html>