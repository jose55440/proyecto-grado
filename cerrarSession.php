<?php 
require_once './comprobador.php';

session_destroy();
echo 'cerrando sesion';
header("refresh:3;url=index.php");
?>