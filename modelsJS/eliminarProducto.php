<?php

/* REQUERIMOS LA CONEXION */
require_once('../models/conexionPDO.php');

$connPDO = conexionPDO();

$id = $_POST['eliminar'];

eliminarProducto($connPDO, $id);

/* ELIMINAMOS EL PRODUCTO YA VERIFICADO QUE EXISTE */ // ----- USO DE PDO
function eliminarProducto($conPDO, $idEliminar){

    try {

        $sql = "DELETE FROM producto where id = ? LIMIT 1";

        $statement = $conPDO->prepare($sql);

        $statement->execute(array($idEliminar));

        if ($statement->rowCount() > 0) {

            echo "true";        

        }else{

            echo "false";
        }

    } catch (PDOException $e) {
        
        die($e->getMessage());
    }

}

?>