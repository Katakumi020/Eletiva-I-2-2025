<?php
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../header.php';
$conn = conectar();
$res = $conn->query('SELECT * FROM clientes ORDER BY id DESC');
?>
<div class="d-flex justify-content-between align-items-center mb-3">
<h2>Clientes</h2>
<a class="btn btn-primary" href="inserir_cliente.php">Novo cliente</a>
</div>
<table class="table table-striped"><thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>
<?php while($row = $res->fetch_assoc()): ?>
<tr>
<td><?=h($row['id'])?></td>
<td><?=h($row['nome'])?></td>
<td><?=h($row['email'])?></td>
<td><?=h($row['telefone'])?></td>
<td>
<a class="btn btn-sm btn-warning" href="editar_cliente.php?id=<?=h($row['id'])?>">Editar</a>
<a class="btn btn-sm btn-danger" href="excluir_cliente.php?id=<?=h($row['id'])?>" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
</td>
</tr>
<?php endwhile; ?></tbody></table>
<?php require_once __DIR__ . '/../footer.php'; ?>