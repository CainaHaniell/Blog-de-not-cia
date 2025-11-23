<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="Css/emprego.css"> 
<link rel="shortcut icon" href="Img/Branco.png" type="image/x-icon">
<title>Política - Vozes do Sertão</title>
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
                <h2>Notícias de Política</h2>
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

                        // Consulta SQL para buscar notícias da categoria 'politica'
                        $sql = "SELECT id, titulo, subtitulo, conteudo, fonte, caminho_imagem, data_publicacao FROM noticias WHERE categoria = 'politica' ORDER BY data_publicacao DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="noticia-card-com-foto">';
                                echo '    <span class="noticia-categoria">Política</span>';
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
        </div>
    </main>

    <footer class="footer">
        <p>"Entregue o seu caminho ao Senhor; confie nele, e ele agirá." - Salmos 37:5</p>
        <span>© 2025 SmartMach - Todos os direitos reservados</span>
    </footer>
</body>
</html>