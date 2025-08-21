<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Primeiro exemplo de formulario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Primeiro exemplo de formulario</h1>
<form method="post" action="FormularioResp.php">
<div class="mb-3">
              <label for="texto1" class="form-label">Digite seu texto aqui</label>
              <input type="text" id="texto1" name="texto1" class="form-control">
            </div><div class="mb-3">
              <label for="senha" class="form-label">digite a senha</label>
              <input type="password" id="senha" name="senha" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>