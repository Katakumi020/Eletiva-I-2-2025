<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'agencia');
define('DB_USER', 'root');
define('DB_PASS', '');


date_default_timezone_set('America/Sao_Paulo');


function h($s){ return htmlspecialchars($s, ENT_QUOTES); }
?>