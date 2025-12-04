<?php
require_once __DIR__ . '/../conexao.php'; require_once __DIR__ . '/../header.php';
$conn = conectar();
$destinos = $conn->query('SELECT id,nome FROM destinos ORDER BY nome');
if($_SERVER['REQUEST_METHOD']==='POST'){
$destino_id = intval($_POST['destino_id']);
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$valor = str_replace(',','.',$_POST['valor']);
$descricao = trim($_POST['descricao']);
$stmt = $conn->prepare('INSERT INTO pacotes (destino_id,data_inicio,data_fim,valor,descricao) VALUES (?,?,?,?,?)');
$stmt->bind_param('issds',$destino_id,$data_inicio,$data_fim,$valor,$descricao); $stmt->execute();
header('Location: listar_pacotes.php'); exit;
}
?>
<h2>Novo Pacote</h2>
<form method="post">
<div class="mb-3"><label>Destino</label><select name="destino_id" class="form-select" required>
<option value="">-- selecione --</option>
<?php while($d=$destinos->fetch_assoc()): ?>
<option value="<?=h($d['id'])?>"><?=h($d['nome'])?></option>
<?php endwhile; ?>
</select></div>
<div class="mb-3"><label>Data Início</label><input type="date" name="data_inicio" class="form-control" required></div>
<div class="mb-3"><label>Data Fim</label><input type="date" name="data_fim" class="form-control" required></div>
<div class="mb-3"><label>Valor (ex: 1500.00)</label><input name="valor" class="form-control" required></div>
<div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control"></textarea></div>
<button class="btn btn-success">Salvar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>