<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../header.php';
$id = intval($_GET['id'] ?? 0);
$conn = conectar();
if($_SERVER['REQUEST_METHOD']==='POST'){
$nome = trim($_POST['nome']); $descricao = trim($_POST['descricao']); $pais = trim($_POST['pais']); $cidade = trim($_POST['cidade']);
$stmt = $conn->prepare('UPDATE destinos SET nome=?, descricao=?, pais=?, cidade=? WHERE id=?');
$stmt->bind_param('ssssi',$nome,$descricao,$pais,$cidade,$id);
$stmt->execute();
header('Location: listar_destinos.php'); exit;
}
$res = $conn->query("SELECT * FROM destinos WHERE id=$id");
$row = $res->fetch_assoc();
?>
<h2>Editar Destino</h2>
<form method="post">
<div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="<?=h($row['nome'])?>" required></div>
<div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control"><?=h($row['descricao'])?></textarea></div>
<div class="mb-3"><label>País</label><input name="pais" class="form-control" value="<?=h($row['pais'])?>"></div>
<div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control" value="<?=h($row['cidade'])?>"></div>
<button class="btn btn-success">Atualizar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>