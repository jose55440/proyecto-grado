<?php
    require_once './comprobador.php';
    include_once '../BD/user.inc.php';

    $user=$_POST['user'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $admin=$_POST['admin'];

    try{
        createUser($nre, $contrasena, $nombre, $apellidos, $admin);
    }catch(PDOException $e){
        $e->getMessage();
    }

    