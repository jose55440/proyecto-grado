<?php
    session_start();
    // Comprueba que la variable de session esta seteada y si no lo esta se redirige otra vez al login
    if (!isset($_SESSION['userCheked'])){
        header("location:../index.php");
    }

?>