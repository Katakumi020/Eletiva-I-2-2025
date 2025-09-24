<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício 9 lista 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Exercício 9 lista 2</h1>
<form method="post">
  <div class="mb-3">
    <label for="num1" class="form-label">Digite um número:</label>
    <input type="number" id="num1" name="num1" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Gerar tabuada</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $numero = (int)$_POST['num1'];
    echo "<div class='alert alert-info mt-3'>";
    echo "<h4>Tabuada do $numero</h4>";
    for ($contador = 1; $contador <= 10; $contador++) {
        echo "$numero x $i = " . ($numero * $contador) . "<br>";
    }
    echo "</div>";
}
?>
</div>
</body>
</html>