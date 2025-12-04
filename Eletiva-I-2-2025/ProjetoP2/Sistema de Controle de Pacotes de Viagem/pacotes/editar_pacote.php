<?php
require_once __DIR__ . '/../conexao.php'; require_once __DIR__ . '/../header.php';
$id=intval($_GET['id']??0); $conn = conectar();
$destinos = $conn->query('SELECT id,nome FROM destinos ORDER BY nome');
if($_SERVER['REQUEST_METHOD']==='POST'){
$destino_id=intval($_POST['destino_id']); $data_inicio=$_POST['data_inicio']; $data_fim=$_POST['data_fim']; $valor=str_replace(',','.',$_POST['valor']); $descricao=trim($_POST['descricao']);
$stmt=$conn->prepare('UPDATE pacotes SET destino_id=?, data_inicio=?, data_fim=?, valor=?, descricao=? WHERE id=?');
$stmt->bind_param('issdsi',$destino_id,$data_inicio,$data_fim,$valor,$descricao,$id); $stmt->execute(); header('Location: listar_pacotes.php'); exit;
}
$res=$conn->query("SELECT * FROM pacotes WHERE id=$id"); $row=$res->fetch_assoc();
?>
<h2>Editar Pacote</h2>
<form method="post">
<div class="mb-3"><label>Destino</label><select name="destino_id" class="form-select" required>
<?php while($d=$destinos->fetch_assoc()): ?>
<option value="<?=h($d['id'])?>" <?=($d['id']==$row['destino_id'])?'selected':''?>><?=h($d['nome'])?></option>
<?php endwhile; ?>
</select></div>
<div class="mb-3"><label>Data Início</label><input type="date" name="data_inicio" class="form-control" value="<?=h($row['data_inicio'])?>" required></div>
<div class="mb-3"><label>Data Fim</label><input type="date" name="data_fim" class="form-control" value="<?=h($row['data_fim'])?>" required></div>
<div class="mb-3"><label>Valor</label><input name="valor" class="form-control" value="<?=h($row['valor'])?>" required></div>
<div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control"><?=h($row['descricao'])?></textarea></div>
<button class="btn btn-success">Atualizar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>