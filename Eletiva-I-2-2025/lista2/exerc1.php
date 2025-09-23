<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 1 da lista 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Exercício 1 da lista 2</h1>
<form method="post">
<?php
// Gerar 7 campos de entrada para os números
for ($i = 1; $i <= 7; $i++) {
    echo '
    <div class="mb-3">
        <label for="num'.$i.'" class="form-label">Digite o número '.$i.':</label>
        <input type="number" id="num'.$i.'" name="num'.$i.'" class="form-control" required>
    </div>';
}
?>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $numeros = [];


    for ($i = 1; $i <= 7; $i++) { // AREEEY ou melhor array.
        $numeros[] = (int)$_POST['num'.$i];
    }

    $menorValor = $numeros[0];
    $posicao = 0;

    for ($i = 1; $i < 7; $i++) { // encontrando o menor valor entre as variaveis que criei
        if ($numeros[$i] < $menorValor) {
            $menorValor = $numeros[$i];
            $posicao = $i;
        }
    }

    echo "<p>O menor valor é: $menorValor</p>";
    echo "<p>A posição do menor valor é: " . ($posicao + 1) . "</p>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>