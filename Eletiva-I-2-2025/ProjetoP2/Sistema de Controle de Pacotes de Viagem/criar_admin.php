<?php
require_once 'conexao.php';
$conn = conectar();
$senha = password_hash('123',PASSWORD_DEFAULT);
$conn->query("INSERT INTO usuarios (nome,email,senha,tipo) VALUES ('Admin','admin@admin.com','$senha','admin')");
echo "Admin criado: admin@admin.com | senha: 123";
?>