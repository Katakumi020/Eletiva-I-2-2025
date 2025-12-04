<?php
require_once __DIR__ . '/../conexao.php'; $id=intval($_GET['id']??0); $conn=conectar();
$stmt=$conn->prepare('DELETE FROM pacotes WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute(); header('Location: listar_pacotes.php'); exit;
?>