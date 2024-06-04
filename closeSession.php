<?php 
require_once './cheker.php';

session_destroy();
header("Location: index.php");

?>