<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
$nome=trim($_POST['nome']); $email=trim($_POST['email']); $telefone=trim($_POST['telefone']);
$conn = conectar();
$stmt = $conn->prepare('INSERT INTO clientes (nome,email,telefone) VALUES (?,?,?)');
$stmt->bind_param('sss',$nome,$email,$telefone); $stmt->execute();
header('Location: listar_clientes.php'); exit;
}
?>
<h2>Novo Cliente</h2>
<form method="post">
<div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
<div class="mb-3"><label>Email</label><input name="email" class="form-control"></div>
<div class="mb-3"><label>Telefone</label><input name="telefone" class="form-control"></div>
<button class="btn btn-success">Salvar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>