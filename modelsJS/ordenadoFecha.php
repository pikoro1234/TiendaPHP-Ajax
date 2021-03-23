<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
    }

    selectProductos($conn, $fecha);

    function selectProductos($con,$variable){

        $resultado = array();

        switch ($variable) {
            case 'descendente':

                $sql = "SELECT * FROM producto ORDER by fecha DESC";

                break;
            case 'ascendente':

                $sql = "SELECT * FROM producto ORDER by fecha ASC";

                break;
        }

        $consulta = $con->prepare($sql);

        $consulta->execute();

        $preCargaElementos = $consulta->get_result();

        while ($row = $preCargaElementos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        echo json_encode($resultado);
    }

?>