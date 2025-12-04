<?php

require_once "conexao.php";

$erro = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha_plain = $_POST['senha'] ?? '';

    if($nome === '' || $email === '' || $senha_plain === ''){
        $erro = 'Preencha todos os campos.';
    } else {
        $conn = conectar();


        $stmt = $conn->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res && $res->num_rows > 0){
            $erro = 'Já existe um cliente com este e-mail.';
        } else {
            $hash = password_hash($senha_plain, PASSWORD_DEFAULT);

            $telefone = $_POST['telefone'] ?? null;

            if($telefone !== null){
                $stmt = $conn->prepare("INSERT INTO clientes (nome,email,telefone,senha) VALUES (?,?,?,?)");
                $stmt->bind_param('ssss', $nome, $email, $telefone, $hash);
            } else {
                $stmt = $conn->prepare("INSERT INTO clientes (nome,email,senha) VALUES (?,?,?)");
                $stmt->bind_param('sss', $nome, $email, $hash);
            }

            if($stmt->execute()){
                header("Location: login_cliente.php");
                exit;
            } else {
                $erro = 'Erro ao criar conta. Tente novamente.';
            }
        }
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registrar Cliente</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<div style="max-width:480px; margin:30px auto;">
  <h2>Criar nova conta</h2>

  <?php if($erro): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label>Nome</label>
      <input name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input name="email" type="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Telefone (opcional)</label>
      <input name="telefone" class="form-control">
    </div>
    <div class="mb-3">
      <label>Senha</label>
      <input name="senha" type="password" class="form-control" required>
    </div>

    <button class="btn btn-dark" type="submit">Registrar</button>
    <a href="login_cliente.php" class="btn btn-link">Já tem conta? Entrar</a>
  </form>
</div>

<?php require_once 'footer.php'; ?>
</body>
</html>
