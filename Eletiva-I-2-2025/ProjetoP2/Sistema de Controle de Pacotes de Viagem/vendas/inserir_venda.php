<?php
    require_once __DIR__ . '/../conexao.php'; require_once __DIR__ . '/../header.php';
    $conn = conectar();
    $clientes = $conn->query('SELECT id,nome FROM clientes ORDER BY nome');
    $pacotes = $conn->query('SELECT p.id, p.valor, d.nome AS destino_nome FROM pacotes p JOIN destinos d ON p.destino_id=d.id ORDER BY p.id');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cliente_id = intval($_POST['cliente_id']);
        $pacote_id = intval($_POST['pacote_id']);
        $data_contratacao = $_POST['data_contratacao'];
        $preco_pago = str_replace(',','.',$_POST['preco_pago']);
        $stmt = $conn->prepare('INSERT INTO vendas (cliente_id,pacote_id,data_contratacao,preco_pago) VALUES (?,?,?,?)');
        $stmt->bind_param('iisd',$cliente_id,$pacote_id,$data_contratacao,$preco_pago); $stmt->execute(); header('Location: listar_vendas.php'); exit;
    }
?>
<h2>Registrar Venda</h2>
<form method="post">
    <div class="mb-3"><label>Cliente</label><select name="cliente_id" class="form-select" required>
    <option value="">-- selecione --</option>
    <?php while($c=$clientes->fetch_assoc()): ?>
    <option value="<?=h($c['id'])?>"><?=h($c['nome'])?></option>
    <?php endwhile; ?>
    </select></div>
    <div class="mb-3"><label>Pacote</label><select name="pacote_id" class="form-select" required>
    <option value="">-- selecione --</option>
    <?php while($p=$pacotes->fetch_assoc()): ?>
    <option value="<?=h($p['id'])?>"><?=h($p['destino_nome'])." - R$ ".number_format($p['valor'],2,',','.')?></option>
    <?php endwhile; ?>
    </select></div>
    <div class="mb-3"><label>Data Contratação</label><input type="date" name="data_contratacao" class="form-control" value="<?=date('Y-m-d')?>" required></div>
    <div class="mb-3"><label>Preço Pago</label><input name="preco_pago" class="form-control" required></div>
    <button class="btn btn-success">Registrar</button>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>