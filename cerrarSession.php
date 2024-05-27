<?php 
require_once './comprobador.php';

session_destroy();
header("Location: index.php");

?>