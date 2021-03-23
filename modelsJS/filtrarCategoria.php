<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_GET['categoria'])) {
        
        $categoria = $_GET['categoria'];
    }

    selectFiltradosCategoria($conn, $categoria);

    /* DEVUELVE UN ARRAY FILTRADO POR CATEGORIA AL INDEX */
    function selectFiltradosCategoria($con, $categoria){

        $resultado = array();

        $valorNombre = $categoria;

        $sql = "SELECT * FROM producto WHERE categoria = ?";

        $consulta = $con->prepare($sql);

        $consulta->bind_param("s",$valorNombre);

        $consulta->execute();

        $datos = $consulta->get_result();

        while ($row = $datos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        echo json_encode($resultado);
    }