<?php

/* REQUERIMOS LA CONEXION */
require_once('../models/conexion.php');

$conn = conexion();

$idUser = $_POST['id']; 

selecMisProductos($conn, $idUser);

/* MOSTRAMOS PRODUCTO SOLO DEPENDIENDO DEL ID DEL PRODUCTO RECIBIDO POR PARAMETRO EN SINGLEPAGE */
function selecMisProductos($con, $id){
        
    $resultado = array();

    $valor = $id;

    $sql = "SELECT * FROM producto WHERE id_cliente = ?";

    $consulta = $con->prepare($sql);

    $consulta->bind_param("i",$valor);

    $consulta->execute();

    $getElementos = $consulta->get_result();

    while ($row = $getElementos->fetch_assoc()) {

        array_push($resultado,$row);
    }

    echo  json_encode($resultado);
}
?>