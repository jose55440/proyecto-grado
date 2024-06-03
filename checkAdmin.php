<?php 
require_once '../comprobador.php';
include_once '../BD/user.inc.php';
if (!checkAdmin($_SESSION['userCheked']['nre'])){
    header("location:./inicio.php");
}
