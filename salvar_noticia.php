<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_noticias";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $categoria = $_POST['categoria'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $fonte = $_POST['fonte'];
    $conteudo = $_POST['conteudo'];
    
    // Processamento da imagem
    $caminho_imagem = "";
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $upload_dir = 'uploads/'; // Pasta para salvar as imagens
        $nome_arquivo = basename($_FILES['imagem']['name']);
        $caminho_imagem = $upload_dir . uniqid() . '_' . $nome_arquivo;

        if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
            echo "Erro ao mover a imagem.";
            exit();
        }
    }

    // Prepara a instrução SQL
    $stmt = $conn->prepare("INSERT INTO noticias (categoria, titulo, subtitulo, fonte, conteudo, caminho_imagem, data_publicacao) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $categoria, $titulo, $subtitulo, $fonte, $conteudo, $caminho_imagem);

    // Executa a instrução
    if ($stmt->execute()) {
        // Redireciona para a página de publicação com uma mensagem de sucesso na URL
        header("Location: publicacao.html?status=sucesso");
        exit(); // É importante para garantir que o script pare de ser executado
    } else {
        echo "Erro ao salvar a notícia: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>