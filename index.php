<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Vozes do Sertão</title>
<link rel="stylesheet" href="Css/index.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
<link rel="shortcut icon" href="Img/Branco.png" type="image/x-icon">
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
    <div class="container-principal">
        <section class="noticias-lista">
            <h2>Todas as Notícias</h2>
            <div id="container-noticias">
                <?php
                    // Conexão com o banco de dados
                    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_noticias";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Erro de conexão: " . $conn->connect_error);
                    }

                    // Consulta SQL para buscar todas as notícias, ordenadas pela data de publicação
                    $sql = "SELECT id, titulo, subtitulo, conteudo, fonte, categoria, caminho_imagem, data_publicacao FROM noticias ORDER BY data_publicacao DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="noticia-card-com-foto">';
                            echo '    <span class="noticia-categoria">' . ucfirst(htmlspecialchars($row['categoria'])) . '</span>';
                            echo '    <a href="pagina_noticia.php?id=' . $row['id'] . '">';
                            echo '        <img src="' . htmlspecialchars($row['caminho_imagem']) . '" alt="Imagem da notícia">';
                            echo '        <h3>' . htmlspecialchars($row['titulo']) . '</h3>';
                            echo '    </a>';
                            echo '    <p><strong>' . htmlspecialchars($row['subtitulo']) . '</strong></p>';
                            echo '    <p>' . htmlspecialchars(substr($row['conteudo'], 0, 150)) . '...</p>';
                            
                            $data = new DateTime($row['data_publicacao']);
                            $dataFormatada = $data->format('d/m/Y H:i:s');
                            echo '    <small>Fonte: ' . htmlspecialchars($row['fonte']) . ' | Publicado em: ' . $dataFormatada . '</small>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>Nenhuma notícia publicada ainda.</p>";
                    }

                    $conn->close();
                ?>
            </div>
        </section>

        <aside class="coluna-direita">
            <section class="ultimas-noticias">
                <h3>Últimas Notícias</h3>
                <ul id="lista-ultimas-noticias">
                    <?php
                        // Conexão com o banco de dados
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Erro de conexão: " . $conn->connect_error);
                        }

                        // Consulta SQL para buscar as 5 últimas notícias
                        $sql = "SELECT id, titulo FROM noticias ORDER BY data_publicacao DESC LIMIT 5";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<li><a href="pagina_noticia.php?id=' . $row['id'] . '">' . htmlspecialchars($row['titulo']) . '</a></li>';
                            }
                        } else {
                            echo '<li>Nenhuma notícia encontrada.</li>';
                        }

                        $conn->close();
                    ?>
                </ul>
            </section>
        </aside>
    </div>
</main>

<footer class="footer">
    <p>"Entregue o seu caminho ao Senhor; confie nele, e ele agirá." - Salmos 37:5</p>
    <span>© 2025 SmartMach - Todos os direitos reservados</span>
</footer>
</body>
</html>