<?php

    /*
    * 
    + ESTE ARCHIVO LO USAMOS COMO PUENTE ENTRE LAS CONSULTAS Y LAS VISTAS
    *
    *
    */

    /* REQUERIMOS LA CONEXION Y ARCHIVO DONDE TENEMOS LAS CONSULTAS */
    require_once('../models/conexion.php');

    require_once('../models/consultas.php');

    $conn = conexion();

    /* RECOJEMOS EL USUARIO Y EL PASSWORD DEL LOGIN */
    if (isset($_POST['userRegister'])) {
        $user = $_POST['userRegister'];
    }

    if (isset($_POST['passRegister'])) {
        $password = $_POST['passRegister'];
    }

    /* FUNCION CON LA CUAL VERIFICAMOS EL USUARIO PASANDOLE LA CONEXION Y LOS VALORES */
    verificarUserRegistrado($conn,$user,$password);


?>