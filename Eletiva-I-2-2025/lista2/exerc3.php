<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício 3 lista 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Exercício 3 lista 2</h1>
<form method="post">
  <div class="mb-3">
    <label for="num1" class="form-label">Digite um número:</label>
    <input type="number" id="num1" name="num1" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="num2" class="form-label">Digite outro número:</label>
    <input type="number" id="num2" name="num2" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $A = $_POST['num1'];
    $B = $_POST['num2'];

    if ($A < $B) {
        echo "<p>$A . $b</p>";
    }
    else if ($B < $A) {
        echo "<p>$B . $A</p>";
    }
    else {
        echo "<p>Os números são iguais, sendo eles: $A</p>";
    }
}
?>
</div>
</body>
</html>