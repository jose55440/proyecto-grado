<?php 
require_once './cheker.php';
// Cierra la sesion
session_destroy();
header("Location: index.php");

?>