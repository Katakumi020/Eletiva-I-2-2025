<?php
require_once __DIR__ . '/../conexao.php'; $id=intval($_GET['id']??0); $conn=conectar();
$stmt=$conn->prepare('DELETE FROM vendas WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute(); header('Location: listar_vendas.php'); exit;
?>