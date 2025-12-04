<?php
require_once __DIR__ . '/../conexao.php'; require_once __DIR__ . '/../header.php';
$conn = conectar();
$sql = "SELECT p.*, d.nome AS destino_nome FROM pacotes p JOIN destinos d ON p.destino_id = d.id ORDER BY p.id DESC";
$res = $conn->query($sql);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
<h2>Pacotes</h2>
<a class="btn btn-primary" href="inserir_pacote.php">Novo pacote</a>
</div>
<table class="table table-striped"><thead><tr><th>ID</th><th>Destino</th><th>Início</th><th>Fim</th><th>Valor</th><th>Ações</th></tr></thead><tbody>
<?php while($row=$res->fetch_assoc()): ?>
<tr>
    <td><?=h($row['id'])?></td>
    <td><?=h($row['destino_nome'])?></td>
    <td><?=h($row['data_inicio'])?></td>
    <td><?=h($row['data_fim'])?></td>
    <td><?=h(number_format($row['valor'],2,',','.'))?></td>
    <td>
    <a class="btn btn-sm btn-warning" href="editar_pacote.php?id=<?=h($row['id'])?>">Editar</a>
    <a class="btn btn-sm btn-danger" href="excluir_pacote.php?id=<?=h($row['id'])?>" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?></tbody></table>
<?php require_once __DIR__ . '/../footer.php'; ?>