<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../header.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$nome = trim($_POST['nome']);
$descricao = trim($_POST['descricao']);
$pais = trim($_POST['pais']);
$cidade = trim($_POST['cidade']);
$conn = conectar();
$stmt = $conn->prepare("INSERT INTO destinos (nome, descricao, pais, cidade) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $nome, $descricao, $pais, $cidade);
$stmt->execute();
header('Location: listar_destinos.php'); exit;
}
?>
<h2>Novo Destino</h2>
<form method="post">
<div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
<div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control"></textarea></div>
<div class="mb-3"><label>País</label><input name="pais" class="form-control"></div>
<div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control"></div>
<button class="btn btn-success">Salvar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>