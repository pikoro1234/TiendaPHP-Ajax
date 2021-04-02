<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    selectdatosMapa($conn);

    function selectdatosMapa($con){        
    
        $resultado = array();
        
        $sql = "SELECT clientes.latitud,clientes.longitud,clientes.nick_user,producto.nombre,producto.precio,producto.imagen_front FROM clientes JOIN producto ON clientes.id = producto.id_cliente";        
        
        $consulta = $con->prepare($sql);
        
        $consulta->execute();
        
        $preCargaElementos = $consulta->get_result();
        
        while ($row = $preCargaElementos->fetch_assoc()) {
        
            array_push($resultado,$row);
        }
        
        echo  json_encode($resultado);
    }