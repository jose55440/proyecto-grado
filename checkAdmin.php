<?php 
require_once '../cheker.php';
include_once '../BD/user.inc.php';
// Aqui llamo al metodo para saber si es admin o no
if (!checkAdmin($_SESSION['userCheked']['nre'])){
    header("location:./inicio.php");
}
