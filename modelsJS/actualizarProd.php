<?php

/* REQUERIMOS LA CONEXION */
require_once('../models/conexionPDO.php');

$conn = conexionPDO();

$idProducto = $_POST['idProducto'];

$nombreProducto = $_POST['nombreProducto'];

$precioProducto = $_POST['precioProducto'];

$descripcionProducto = $_POST['descripcionProducto'];

$pesoProducto = $_POST['pesoProducto'];

$dimensionProducto = $_POST['dimensionProducto'];

$marcaProducto = $_POST['marcaProducto'];

$colorProducto = $_POST['colorProducto'];

$envaseProducto = $_POST['envaseProducto'];

$categoriaProducto = $_POST['categoriaProducto'];

$estadoProducto = $_POST['estadoProducto'];

actualizarMiProducto($conn,$idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$pesoProducto,$dimensionProducto,$marcaProducto,$colorProducto,$envaseProducto,$categoriaProducto,$estadoProducto);

/* ACTUALIZAMOS EL PRODUCTO YA COMPROBADO */ // ---  USO DE PDO
function actualizarMiProducto($conPDO, $id, $nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado){

    try {

        $sql = "UPDATE  producto SET nombre = ?, precio = ?, descripcion = ?, peso = ?, dimension = ?, marca= ?, color = ?, envase = ?, categoria = ?, estado = ? WHERE id = ?";

        $statement = $conPDO->prepare($sql);


        $statement->execute(array($nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado,$id));


        if ($statement->rowCount() > 0) {
            
            $error['result']="true";

            echo json_encode($error);

        }else{
            
            $error['result']="false";

            echo json_encode($error);

        }

    } catch (PDOException $e) {
        
        die($e->getMessage());
    } 
}

?>