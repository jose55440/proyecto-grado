<?php  
    include 'bd.inc.php';


    function getDatosOkupacionById($idAula){
        $sql=conectar()->prepare('select * from okupacion where idAula=:idAula');
        $sql->bindValue(':idAula',$idAula);
        try{
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $e){
            throw new Exception('Error al acceder a la base de datos');
        }
    }

    function getIdAulas(){
        $sql=conectar()->prepare('SELECT DISTINCT( idAula) FROM `okupacion`  ');
        try{
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $e){
            throw new Exception('Error al acceder a la base de datos');
        }
    }

