<?php
    require_once '../comprobador.php';
    include_once '../BD/aula.inc.php';


    $idAula=$_GET['idAula'];
    $idPabellon=$_GET['idPabellon'];
    $nombre=$_GET['nombre'];
    $capacidad=$_GET['capacidad'];




    try{
        createAula($idAula,$idPabellon,$nombre,$capacidad);
        echo 'Generando Aula Nueva';
        
        header("refresh:4;url=../views/createNewAula.php");
    }catch(PDOException $e){
        throw new Exception("Error al generar el aula");
        
        header("refresh:10;url=../views/createNewAula.php");
    }