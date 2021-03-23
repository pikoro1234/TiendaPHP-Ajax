<?php 

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_GET['producto'])) {
        
        $producto = $_GET['producto'];
    }

selectFiltradosNombre($conn, $producto);

/* METODO PARA FILTRAR LOS PRODUCTOS RETORNA UN ARRAY FILTRADO */
function selectFiltradosNombre($con, $nombre){

    $resultado = array();
 
    $valorNombre = substr($nombre,0,1);

    $sql = "SELECT * FROM producto WHERE nombre LIKE CONCAT(?,'%')";

    $consulta = $con->prepare($sql);

    $consulta->bind_param("s",$valorNombre);

    $consulta->execute();

    $datos = $consulta->get_result();

    while ($row = $datos->fetch_assoc()) {

        array_push($resultado,$row);
    }

    echo json_encode($resultado);
}