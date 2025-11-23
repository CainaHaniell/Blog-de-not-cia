<?php
// Inicia a sessão para armazenar o status de login
session_start();

// Configurações do banco de dados
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blog_noticias";

// Mensagem de erro padrão
$error_message = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checa a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Recebe e sanitiza os dados do formulário
    $email = $conn->real_escape_string($_POST['email']);
    $senha_digitada = $_POST['senha'];

    // Prepara a consulta SQL para buscar o usuário pelo e-mail
    $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha_hash_do_banco = $row['senha'];

        // Verifica se a senha digitada corresponde ao hash no banco de dados
        if (password_verify($senha_digitada, $senha_hash_do_banco)) {
            // Login bem-sucedido
            $_SESSION['logado'] = true;
            header("Location: publicacao.php"); // Redireciona para a página de publicação
            exit();
        } else {
            // Senha incorreta
            $error_message = "Login ou senha incorretos!";
        }
    } else {
        // E-mail não encontrado
        $error_message = "Login ou senha incorretos!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login - Vozes do Sertão</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" />
<link rel="stylesheet" href="Css/login.css" />
<link rel="shortcut icon" href="Img/Branco.png" type="image/x-icon" />
</head>
<body>
    <div class="login-page">
        <div class="login-box">
            <h1 class="login-titulo">Acesso ao Administrador</h1>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email" class="login-input" required />
                    <i class="ri-mail-fill login__icon"></i>
                </div>

                <div class="input-group">
                    <input type="password" id="senha" name="senha" placeholder="Senha" class="login-input" required />
                    <i class="ri-eye-off-fill login__icon login__password" id="toggle-password"></i>
                </div>

                <?php if (!empty($error_message)): ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <button type="submit" class="login-button">Entrar</button>
            </form>

            <a href="recuperar_senha.html" class="login-forgot">Esqueceu a senha?</a>
        </div>
    </div>
</body>
<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('senha');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.classList.toggle('ri-eye-fill');
        this.classList.toggle('ri-eye-off-fill');
    });
</script>
</html>