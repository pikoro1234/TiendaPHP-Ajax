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

/* TRAEMOS LAS VISITAS DE USUARIOS POR PAGINA */
function numeroVisitas($con, $id){
        
    $resultado = array();

    $valor = $id;

    $sql = "SELECT numero_visitas FROM producto WHERE id = ?";

    $consulta = $con->prepare($sql);

    $consulta->bind_param("i",$valor);

    $consulta->execute();

    $getElementos = $consulta->get_result();

    while ($row = $getElementos->fetch_assoc()) {

        array_push($resultado,$row);
    }

    return $resultado;
}

/* TRAEMOS EL NOUMERO DE VISITAS DESDE DB */
$numero_visitas = numeroVisitas($conn,$idProducto);

/*INCREMENTAMOS UNO A LAS VISITAS Y LA PASAMOS COMO PARAMETRO */
$valor = $numero_visitas[0]['numero_visitas']+1;

contadorVisitas($conn,$idProducto,$valor);

/* CONTADOR DE VISITAS AL VISITAR SINGLEPAGE EJECUTA LA FUNCION LA CUAL HACE UPDATE A LA BASE DE DATOS */
function contadorVisitas($con,$parametro,$valor){

    $valorVisitas = $valor;

    $idProducto = $parametro;

    $sql = "UPDATE producto SET numero_visitas = ? WHERE id = ?";

    $consulta = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($consulta,'ii',$valorVisitas,$idProducto);

    mysqli_stmt_execute($consulta);

}

