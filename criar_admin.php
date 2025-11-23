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

// Dados do usuário
// $email_admin = 'admin@gmail.com';
// $senha_admin = '123456';

// Criptografa a senha antes de armazenar
$senha_hash = password_hash($senha_admin, PASSWORD_DEFAULT);

// Verifica se o usuário já existe
$sql_check = "SELECT email FROM usuarios WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email_admin);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo "Usuário com o e-mail '{$email_admin}' já existe. Nenhuma ação realizada.<br>";
} else {
    // Insere o novo usuário
    $sql_insert = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $email_admin, $senha_hash);

    if ($stmt_insert->execute()) {
        echo "Usuário administrador '{$email_admin}' criado com sucesso!<br>";
    } else {
        echo "Erro ao criar usuário: " . $stmt_insert->error . "<br>";
    }
    $stmt_insert->close();
}

$stmt_check->close();
$conn->close();
?>