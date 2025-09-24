<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício 4 lista 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Exercício 4 lista 2</h1>
<form method="post">
  <div class="mb-3">
    <label for="num1" class="form-label">Digite o valor do produto (apenas numeros):</label>
    <input type="number" id="num1" step="0.01" name="num1" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $preco = $_POST['num1'];


    if ($preco > 100) {
        $valordescontado = $preco - ($preco * (15 / 100));
        $numero_formatado = number_format($valordescontado, 2, ',', '.');
        echo "<p> O valor do produto com o desconto fica: R$$numero_formatado </p>";
    }
    else {
        echo "<p>O preço do produto é menor que R$100,00. Então continua" . $preco . "</p>";
    }
}
?>
</div>
</body>
</html>