<?php

/* REQUERIMOS LA CONEXION */
require_once('../models/conexion.php');

$conn = conexion();

$idProducto = $_POST['idProduct'];

selectSinglePageProducto($conn,$idProducto);

function selectSinglePageProducto($con, $id){
    
    $resultado = array();

    $valor = $id;

    $sql = "SELECT * FROM producto WHERE id = ?";

    $consulta = $con->prepare($sql);

    $consulta->bind_param("i",$valor);

    $consulta->execute();

    $getElementos = $consulta->get_result();

    while ($row = $getElementos->fetch_assoc()) {

        array_push($resultado,$row);
    }

    echo json_encode($resultado);
}