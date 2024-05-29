<?php   
include_once 'bd.inc.php';




function getGrupos(){
    $sql =conectar()->prepare("select * from grupo");
    try{
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $e){
        throw new Exception('Error al acceder a los grupos');
    }
}