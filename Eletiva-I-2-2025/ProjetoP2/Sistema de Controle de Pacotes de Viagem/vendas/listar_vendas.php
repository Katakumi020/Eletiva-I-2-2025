<?php  
    require_once __DIR__ . '/../conexao.php'; require_once __DIR__ . '/../header.php';
    $conn = conectar();
    $sql = "SELECT v.*, c.nome AS cliente_nome, p.id AS pacote_id, d.nome AS destino_nome, p.data_inicio, p.data_fim FROM vendas v JOIN clientes c ON v.cliente_id=c.id JOIN pacotes p ON v.pacote_id=p.id JOIN destinos d ON p.destino_id=d.id ORDER BY v.id DESC";
    $res = $conn->query($sql);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Vendas</h2>
    <a class="btn btn-primary" href="inserir_venda.php">Registrar venda</a>
</div>
<table class="table table-striped"><thead><tr><th>ID</th><th>Cliente</th><th>Destino</th><th>Período</th><th>Data Contratação</th><th>Preço Pago</th><th>Ações</th></tr></thead><tbody>
<?php while($row=$res->fetch_assoc()): ?>
<tr>
    <td><?=h($row['id'])?></td>
    <td><?=h($row['cliente_nome'])?></td>
    <td><?=h($row['destino_nome'])?></td>
    <td><?=h($row['data_inicio']).' - '.h($row['data_fim'])?></td>
    <td><?=h($row['data_contratacao'])?></td>
    <td><?=h(number_format($row['preco_pago'],2,',','.'))?></td>
    <td>
    <a class="btn btn-sm btn-danger" href="excluir_venda.php?id=<?=h($row['id'])?>" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?></tbody></table>
<?php require_once __DIR__ . '/../footer.php'; ?>