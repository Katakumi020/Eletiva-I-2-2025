<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício3 - Lista 4</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>exercicio 3 - lista 4</h1>
<form method="post">
  <?php for ($i = 1; $i <= 5; $i++): ?>
    <h5>Produto <?= $i ?></h5>
    <div class="mb-3">
      <input type="text" name="codigo<?= $i ?>" class="form-control mb-2" placeholder="Código" required>
      <input type="text" name="nome<?= $i ?>" class="form-control mb-2" placeholder="Nome" required>
      <input type="number" step="0.01" name="preco<?= $i ?>" class="form-control mb-2" placeholder="Preço (R$)" required>
    </div>
  <?php endfor; ?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produtos = [];

    for ($i = 1; $i <= 5; $i++) {
        $codigo = $_POST["codigo$i"];
        $nome   = $_POST["nome$i"];
        $preco  = (float)$_POST["preco$i"];

        if ($preco > 100) {
            $preco = $preco * 0.1;
        }

        $produtos[$codigo] = [
            "nome"  => $nome,
            "preco" => $preco
        ];
    }
    uasort($produtos, function($a, $b) {
        return strcmp($a["nome"], $b["nome"]);
    });

    echo "<h5 class='mt-4'>Lista de Produtos (ordenados pelo nome):</h5><ul class='list-group'>";
    foreach ($produtos as $codigo => $dados) {
        echo "<li class='list-group-item'>
                <strong>Código:</strong> $codigo | 
                <strong>Nome:</strong> {$dados['nome']} | 
                <strong>Preço:</strong> R$ " . number_format($dados['preco'], 2, ',', '.') . "
              </li>";
    }
    echo "</ul>";
}
?>
</div>
</body>
</html>