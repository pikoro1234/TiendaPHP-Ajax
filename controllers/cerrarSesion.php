<?php

    //RETOMAMOS LA SESION PARA PODER CERRAR LA SESSION EN CONCRETO Y REDIRECCIONAMOS A LA HOME 
    session_start();

    if (isset($_SESSION["logueado"])) {

        session_destroy();
    }

    header("Location: http://localhost/TiendaPHP-Ajax/index.php");
?>