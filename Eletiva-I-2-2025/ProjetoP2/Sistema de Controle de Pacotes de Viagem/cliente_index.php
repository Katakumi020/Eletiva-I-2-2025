<?php
session_start();
if(!isset($_SESSION['cliente'])){ 
    header("Location: login_cliente.php");
    exit;
}
require_once "header.php";
?>

<h2>Bem vindo, <?= $_SESSION['cliente']; ?>!</h2>
<p>Aqui você pode visualizar pacotes disponíveis!</p>

<a class="btn btn-dark" href="cliente_pacotes.php">Ver pacotes</a>
<a class="btn btn-dark" href="logout_cliente.php">Sair</a>

<?php require_once "footer.php"; ?>