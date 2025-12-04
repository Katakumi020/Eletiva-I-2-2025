<?php
require_once __DIR__ . '/../proteger.php'; 
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin'){
    die('Acesso negado');
}

require_once __DIR__ . '/../conexao.php';
$erro = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $tipo = 'admin'; 

    if(!$nome || !$email || !$senha){
        $erro = 'Preencha todos os campos';
    } else {
        $conn = conectar();
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('INSERT INTO usuarios (nome,email,senha,tipo) VALUES (?,?,?,?)');
        $stmt->bind_param('ssss', $nome, $email, $hash, $tipo);
        if($stmt->execute()){
            header('Location: /Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/index.php');
            exit;
        } else {
            $erro = 'Erro ao criar usuário (email pode já existir)';
        }
    }
}
?>
<?php require_once __DIR__ . '/../header.php'; ?>

<h2>Cadastrar Usuário</h2>
<?php if($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>

<form method="post" style="max-width:480px">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input class="form-control" name="nome" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input class="form-control" type="email" name="email" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Senha</label>
    <input class="form-control" type="password" name="senha" required>
  </div>
  <button class="btn btn-dark">Criar usuário</button>
</form>

<?php require_once __DIR__ . '/../footer.php'; ?>