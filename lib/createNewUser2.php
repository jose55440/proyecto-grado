<?php
    require_once '../comprobador.php';
    include_once '../BD/user.inc.php';

    $nre=$_POST['nre'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $admin=$_POST['admin'];

    try{
        createUser($nre, $contrasena, $nombre, $apellidos, $admin);
        header("Location: ./views/inicio.php");
    }catch(PDOException $e){
        $e->getMessage();
        
    }

    