<?php
require_once('includes/connect.php'); // Arquivo de conex�o com o banco de dados

// Verificar se os dados foram enviados via GET ou POST
$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
$senha = isset($_REQUEST['senha']) ? trim($_REQUEST['senha']) : '';

if (empty($email) || empty($senha)) {
    // Redireciona com mensagem de erro se os campos n�o forem preenchidos
    $_SESSION['login_error'] = 'Preencha todos os campos.';
    header('Location: login.php');
    exit();
}

// Consulta ao banco para verificar o usu�rio
$query = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verificar se a senha est� correta
    if (password_verify($senha, $user['senha'])) {
        // Armazenar informa��es do usu�rio na sess�o
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_email'] = $user['email'];
        $_SESSION['usuario_name'] = $user['nome'];

        // Redirecionar para a p�gina principal ou dashboard
        header('Location: index.php?a=painel');
        exit();
    } else {
        $_SESSION['login_error'] = 'Senha incorreta.';
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['login_error'] = 'Usu�rio n�o encontrado.';
    header('Location: login.php');
    exit();
}
?>
