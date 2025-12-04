<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: /Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/login.php');
    exit;
?>