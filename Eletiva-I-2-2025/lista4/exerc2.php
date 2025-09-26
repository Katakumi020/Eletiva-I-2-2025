<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Exercício 2 - Médias</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Exercício 2 - Médias de Alunos</h1>
<form method="post">
  <?php for ($i = 1; $i <= 5; $i++): ?>
    <h5>Aluno <?= $i ?></h5> /** fiz um aluno pra cada numero crescente, também acompanhando as notas que seria o I */
    <div class="mb-3">
      <input type="text" name="aluno<?= $i ?>" class="form-control mb-2" placeholder="Nome" required>
      <input type="number" step="0.01" name="n<?= $i ?>1" class="form-control mb-2" placeholder="Nota 1" required>
      <input type="number" step="0.01" name="n<?= $i ?>2" class="form-control mb-2" placeholder="Nota 2" required>
      <input type="number" step="0.01" name="n<?= $i ?>3" class="form-control mb-2" placeholder="Nota 3" required>
    </div> /** e também já fiz uma lista doq ia pedir, nome e as tres notas */
  <?php endfor; ?>
  <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medias = [];

    for ($i = 1; $i <= 5; $i++) {
        $aluno = $_POST["aluno$i"];
        $media = ($_POST["n{$i}1"] + $_POST["n{$i}2"] + $_POST["n{$i}3"]) / 3;
        $medias[$aluno] = $media;
    }

    arsort($medias);

    echo "<h5>Médias dos Alunos em ordem: </h5><ul>";
    foreach ($medias as $aluno => $media) {
        echo "<li>$aluno - Média: " . number_format($media, 2, ',', '.') . "</li>";
    }
    echo "</ul>"; /** não sei porque mas acho que os comentarios estão bugados */
}
?>
</div>
</body>
</html>