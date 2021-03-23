<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_POST['precio'])) {
        $precio = $_POST['precio'];
    }

    selectProductos($conn, $precio);

    function selectProductos($con,$variable){

        $resultado = array();

        switch ($variable) {
            case 'barato':

                $sql = "SELECT * FROM producto order by precio ASC";

                break;            
            case 'caro':

                $sql = "SELECT * FROM producto order by precio DESC";
                
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