<?php

    /* FUNCION QUE NOS RETORNA LA CONEXION A LA BASE DE DATOS */
    function conexion(){

        $user = "root";

        $password = "";

        $serve = "localhost";

        $db = "id8972026_webhost";

        $con =new mysqli($serve,$user,$password,$db);

        if (!$con) {

            return "no se pudo establecer la conexion con la base de datos";

        }else{

            return $con;
        }
    }
?>
