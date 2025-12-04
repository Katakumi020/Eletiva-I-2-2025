<?php
    session_start();
    unset($_SESSION['cliente']);
    unset($_SESSION['cliente_id']);
    header("Location: login_cliente.php");
    exit;
?>