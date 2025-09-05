<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 14 da lista 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Exercício 14 da lista 1</h1>
<form method="post">
<div class="mb-3">
              <label for="km" class="form-label">digite o tamanho em quilometros para conversão:</label>
              <input type="number" id="km" step="0.01" name="km" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    define ("milhas", 0.621371);
    $km = $_POST['km'];
    $conversao = milhas * $km;
    $numero_formatado = number_format($conversao, 2, ',');
    echo "<p> Convertendo de Km para milhas fica: $numero_formatado milhas</p>";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>