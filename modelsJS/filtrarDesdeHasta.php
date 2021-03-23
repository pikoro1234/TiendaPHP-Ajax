<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_GET['desde'])) {
        $desde=$_GET['desde'];
    }

    if (isset($_GET['hasta'])) {
        $hasta=$_GET['hasta'];
    }

    selectFiltradosBettween($conn, $desde, $hasta);

    /* DEVUELVE UN ARRAY FILTRADO DEACUERDO CON LOS DOS PARAMETROS DE LIMITE */
    function selectFiltradosBettween($con, $primero, $segundo){

        $resultado = array();

        $desde = $primero;

        $hasta = $segundo;

        $sql = "SELECT * FROM producto WHERE precio BETWEEN ? AND ?";
        
        $consulta = $con->prepare($sql);

        $consulta->bind_param("ii",$desde,$hasta);

        $consulta->execute();

        $datos = $consulta->get_result();

        while ($row = $datos->fetch_assoc()) {
            
            array_push($resultado,$row);
        }

        echo json_encode($resultado);
    }

?>