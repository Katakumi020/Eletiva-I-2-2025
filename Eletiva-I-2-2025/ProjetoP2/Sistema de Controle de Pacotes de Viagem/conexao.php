<?php
require_once __DIR__ . '/config.php';


function conectar(){
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($conn->connect_errno){
die('Erro conexão MySQL: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
return $conn;
}
?>