<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sistema de Pacotes</title>
  <link rel="stylesheet" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/css/arquivo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<nav class="navbar navbar-expand-lg navbar-dark p-3 mb-4 rounded">
  <a class="navbar-brand" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/index.php">Agência</a>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/destinos/listar_destinos.php">Destinos</a></li>
      <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/clientes/listar_clientes.php">Clientes</a></li>
      <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/pacotes/listar_pacotes.php">Pacotes</a></li>
      <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/vendas/listar_vendas.php">Vendas</a></li>
    </ul>

    <ul class="navbar-nav">
      <?php if(isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <span class="nav-link">Olá, <?= htmlspecialchars($_SESSION['user'], ENT_QUOTES) ?></span>
        </li>

        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/usuarios/registrar.php">Cadastrar usuário</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/logout.php">Sair</a>
        </li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/login.php">Login funcionário</a></li>
            <li class="nav-item"><a class="nav-link" href="/Sistema%20de%20Controle%20de%20Pacotes%20de%20Viagem/login_cliente.php">Login cliente</a></li>
        <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="container">
