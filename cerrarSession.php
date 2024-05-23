<?php 
require_once './comprobador.php';

session_destroy();
// Cierra sesion
echo 'cerrando sesion';
header("refresh:3;url=index.php");
?>