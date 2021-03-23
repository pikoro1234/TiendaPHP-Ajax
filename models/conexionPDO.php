<?php

    /* CONEXION A LA BASE DE DATOS PDO RETORNA LA CONEXION */
    function conexionPDO(){

        $user = "root";

        $password = "";

        $serve = "localhost";

        $db = "id8972026_webhost";

        try {
            
            $con=new PDO("mysql:host=$serve;dbname=$db", "$user", "$password");

            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            die ($e->getMessage());
        }

        return $con;

    }

?>