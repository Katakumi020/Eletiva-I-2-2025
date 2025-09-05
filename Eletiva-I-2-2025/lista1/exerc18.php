<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 18 da lista 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Exercício 18 da lista 1</h1>
<form method="post">
<div class="mb-3">
              <label for="valor" class="form-label">digite o valor do produto:</label>
              <input type="number" id="valor" step="0.01" name="valor" class="form-control" required="">
            </div>
<div class="mb-3">
              <label for="juros" class="form-label">digite percentual de juros:</label>
              <input type="number" id="juros" step="0.01" name="juros" class="form-control" required="">
</div>
<div class="mb-3">
              <label for="periodo" class="form-label">digite um periodo (Meses):</label>
              <input type="number" id="periodo" step="0.01" name="periodo" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $valor = $_POST['valor'];
    $juros = $_POST['juros'];
    $periodo = $_POST['periodo'];
    $jurossimples = $valor * (1+ ($juros / 100)) ** $periodo;
    $numero_formatado = number_format($jurossimples, 2, ',', '.');
    echo "<p> O valor gerado pelo juros composto após o período determinado é: R$$numero_formatado </p>";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>