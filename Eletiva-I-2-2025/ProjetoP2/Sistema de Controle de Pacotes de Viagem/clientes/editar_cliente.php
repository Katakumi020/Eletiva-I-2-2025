<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../header.php';
$id=intval($_GET['id']??0); $conn=conectar();
if($_SERVER['REQUEST_METHOD']==='POST'){
$nome=trim($_POST['nome']); $email=trim($_POST['email']); $telefone=trim($_POST['telefone']);
$stmt=$conn->prepare('UPDATE clientes SET nome=?, email=?, telefone=? WHERE id=?');
$stmt->bind_param('sssi',$nome,$email,$telefone,$id); $stmt->execute(); header('Location: listar_clientes.php'); exit;
}
$res=$conn->query("SELECT * FROM clientes WHERE id=$id"); $row=$res->fetch_assoc();
?>
<h2>Editar Cliente</h2>
<form method="post">
<div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="<?=h($row['nome'])?>" required></div>
<div class="mb-3"><label>Email</label><input name="email" class="form-control" value="<?=h($row['email'])?>"></div>
<div class="mb-3"><label>Telefone</label><input name="telefone" class="form-control" value="<?=h($row['telefone'])?>"></div>
<button class="btn btn-success">Atualizar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>