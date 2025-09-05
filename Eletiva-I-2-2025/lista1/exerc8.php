<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 8 da lista 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Exercício 8 da lista 1</h1>
<form method="post">
<div class="mb-3">
              <label for="altura" class="form-label">digite a altura:</label>
              <input type="number" id="altura" name="altura" class="form-control" required="">
            </div>
<div class="mb-3">
              <label for="largura" class="form-label">Digite a largura:</label>
              <input type="number" id="largura" name="largura" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $altura = $_POST['altura'];
    $largura = $_POST['largura'];
    $area = $altura * $largura;
    $numero_formatado = number_format($area, 0, '', '.'); // peguei no google denovo porque não entendi muito bem isso de . para casa de milhar
    echo "<p> A área do retângulo é: $numero_formatado m² </p>";
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>