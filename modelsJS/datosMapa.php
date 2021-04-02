<?php

/* REQUERIMOS LA CONEXION */
require_once('../models/conexion.php');

$conn = conexion();

selectdatosMapa($conn);

function selectdatosMapa($con){        

    $resultado = array();

    $sql = "SELECT latitud,longitud,nick_user,id FROM clientes";        
    
    $consulta = $con->prepare($sql);
    
    $consulta->execute();
    
    $preCargaElementos = $consulta->get_result();
    
    while ($row = $preCargaElementos->fetch_assoc()) {
    
        array_push($resultado,$row);
    }
    
    echo  json_encode($resultado);
}
?>