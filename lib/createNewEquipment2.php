<?php
require_once '../cheker.php';
include_once '../BD/equipment.inc.php';



$nombre= $_GET['nombre'];
$numSerie =$_GET['numSerie'];
$idAula =$_GET['idAula'];

try{
    createEquipment($nombre,$numSerie,$idAula);
    echo 'creado equipamiento con exito';
    header("refresh:4;url=../views/createNewEquipment.php");
}catch(PDOException $e){
    throw new Exception('Error al crear equipamiento');
}
