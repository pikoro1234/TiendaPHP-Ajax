<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    function selectProductos($conn){        
    
        $resultado = array();
        
        $sql = "SELECT * FROM producto";        
        
        $consulta = $con->prepare($sql);
        
        $consulta->execute();
        
        $preCargaElementos = $consulta->get_result();
        
        while ($row = $preCargaElementos->fetch_assoc()) {
        
            array_push($resultado,$row);
        }
        
        echo  $resultado ;
    }