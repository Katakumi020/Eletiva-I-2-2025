<?php
require_once "conexao.php";
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$erro = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $senha  = $_POST['senha'] ?? '';

    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nome, senha FROM clientes WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if($user && password_verify($senha, $user['senha'])){
        $_SESSION['cliente'] = $user['nome'];
        $_SESSION['cliente_id'] = $user['id'];
        header('Location: cliente_index.php');
        exit;
    } else {
        $erro = 'Email ou senha inválidos';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login Cliente</title>
<link rel="stylesheet" href="css/estilo.css">
<style>
.login-box{
    width:400px;
    background:#111;
    padding:30px;
    border-radius:10px;
    border:1px solid #0f0;
    margin:80px auto;
    text-align:center;
}
.login-box input{
    width:100%;
    padding:12px;
    margin-top:10px;
    background:black;
    border:1px solid #0f0;
    color:#7CFF7C;
}
.login-box h2{ color:#7CFF7C; margin-bottom:15px; }
button{
    margin-top:15px;
    width:100%;
}
a.link{
    display:block;
    margin-top:15px;
    color:#7CFF7C;
    font-weight:bold;
}
a.link:hover{
    color:white;
    text-decoration:underline;
}
</style>
</head>
<body>

<div class="login-box">
    <h2>Acesso do Cliente</h2>

    <?php if($erro): ?>
        <p style="color:red;"><?= $erro ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Digite seu email" required>
        <input type="password" name="senha" placeholder="Sua senha" required>
        <button class="btn btn-dark">Entrar</button>
    </form>

    <a class="link" href="registrar.php">Criar nova conta</a>
</div>
</body>
</html>
