<?php
    session_start();

    if (!isset($_SESSION['userCheked'])){
        header("location:../index.php");
    }

?>