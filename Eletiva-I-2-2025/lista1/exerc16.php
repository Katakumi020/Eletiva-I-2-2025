<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 16 da lista 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Exercício 16 da lista 1</h1>
<form method="post">
<div class="mb-3">
              <label for="preco" class="form-label">digite o preco do produto:</label>
              <input type="number" id="preco" step="0.01" name="preco" class="form-control" required="">
            </div>
<div class="mb-3">
              <label for="desconto" class="form-label">digite percentual de desconto:</label>
              <input type="number" id="desconto" step="0.01" name="desconto" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $preco = $_POST['preco'];
    $desconto = $_POST['desconto'];
    $valordescontado = $preco - ($preco * ($desconto / 100));
    $numero_formatado = number_format($valordescontado, 2, ',', '.');
    echo "<p> O valor do produto com o desconto fica: R$$numero_formatado </p>";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>