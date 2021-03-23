<?php

/* 
*
* ARCHIVO PUENTE QUE UTILIZAMOS PARA RECOGER Y ENVIAR DATOS PARA ACTUALIZAR
*
*
*/

require_once('../models/conexionPDO.php');

require_once('../models/consultas.php');

//RECOGEMOS EL USUARIO DE LA SESSION YA INICIADA
session_start();

if (isset($_POST['nombreProducto'])) {
    $nombre=$_POST['nombreProducto'];
}

if (isset($_POST['precio'])) {
    $precio=$_POST['precio'];
}

if (isset($_POST['descripcion'])) {
    $descripcion=$_POST['descripcion'];
}

if (isset($_POST['peso'])) {
    $peso=$_POST['peso'];
}

if (isset($_POST['dimension'])) {
    $dimension=$_POST['dimension'];
}

if (isset($_POST['marca'])) {
    $marca=$_POST['marca'];
}

if (isset($_POST['color'])) {
    $color=$_POST['color'];
}

if (isset($_POST['envase'])) {
    $envase=$_POST['envase'];
}

if (isset($_POST['categoria'])) {
    $categoria=$_POST['categoria'];
}

if (isset($_POST['estado'])) {
    $estado=$_POST['estado'];
}

if (isset($_POST['idProducto'])) {
    $id = $_POST['idProducto'];
}

/* RECOGEMOS LA CONEXION CON PDO PARA ENVIARLA POR PARAMETRO */
$conPDO = conexionPDO();

/* CONDICIONAL QUE VERIFICA SI HAY ALGUNA FILA AFECTADA Y LUEGO REDIRECCIONA AL DASHBOARD */
if (actualizarMiProducto($conPDO, $id, $nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado)){
    
    /* header('Location: http://localhost/Tiendaphp/views/dashboard/actualizar.php'); */
    print "<script>window.location = ' http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';</script>";
}else{

    print "<script>window.location = ' http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';</script>";
}
?>

