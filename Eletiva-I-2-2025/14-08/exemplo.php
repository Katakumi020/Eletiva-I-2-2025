<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projeto1</title>
</head>
<body>
    <?php
        $dia = date("d");
        $mes = date("m");
        $ano = date("y");
        //comentario
        # comentario
        /*
            comentario
        */

        echo "<p>" . $dia . "</p>";
        echo "<p> olha o dia de amanhã: $dia é isso aí</p>";

    ?>
    <h1>Hoje é dia <?= $dia ?> de <?= $mes ?> de <?= $ano ?> </h1>
    
</body>
</html>