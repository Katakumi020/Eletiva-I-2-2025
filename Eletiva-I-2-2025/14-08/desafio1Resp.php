<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Desafio da professora</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
    <?php
        $numero1 = $_POST['valor1'];
        $numero2 = $_POST['valor2'];
        $soma = $numero1 + $numero2;
        echo "<p> o valor da soma dos valores inseridos é: $soma </p>";
        
        // Botão voltar em PHP
        $voltar = $_SERVER['HTTP_REFERER'] ?? 'desafio1.php';
        echo "<a href='$voltar'><button class='btn btn-primary'>Voltar</button></a>";

        exit();
    ?>

<button onclick="goBack()">Voltar</button>

<button type="submit" class="btn btn-primary" action="desafio1Resp.php">Voltar</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>