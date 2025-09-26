<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício 6 da lista 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Exercício 6 da lista 3</h1>
<form method="post">
  <div class="mb-3">
    <label for="numero" class="form-label">Digite um número DECIMAL:</label>
    <input type="number" id="numero" name="numero" class="form-control" step="0.01" required>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $NUM = $_POST['numero'];
    $arred = round($NUM);
    echo "<p>O número $NUM arredondado é $arred.</p>";
}
?>
</div>
</body>
</html>