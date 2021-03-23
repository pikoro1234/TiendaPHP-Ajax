<?php

    /* REQUERIMOS LA CONEXION */
    require_once('../models/conexion.php');

    $conn = conexion();

    if (isset($_POST['user'])) {
        
        $user = $_POST['user'];
    }

    if (isset($_POST['password'])) {

        $password = $_POST['password'];
    }

    verificarUserRegistrado($conn,$user,$password);
    
    /* PARA VERIFICAR SI EL USUARIO EXISTE EN LA BASE DE DATOS USER Y PASSWORD */
    function verificarUserRegistrado($conn,$user,$password){

        //VARIABLES GLOBALES
        $contraOriginal = $password;

        $userOriginal = $user;

        $auxPassword = "";

        //CONSULTA PARA TRAER Y VERIFICAR LA CONTRASEÑA
        $sql = "SELECT contrasenha FROM clientes WHERE nick_user = ? LIMIT 1";

        $valor1 = $user;

        $consulta = $conn->prepare($sql);

        $consulta->bind_param("s",$valor1);

        $consulta->execute();

        $consulta->bind_result($password);

        while ($consulta->fetch()) {

            $auxPassword = $password;
        }

        //VALIDAMOS SI LOS DATOS DEL USUARIO SON CORRECTO REDIRECCIONAMOS AL DASHBOARD Y SI NO EXISTE VOLVEMOS A PEDIRLE LAS CREDENCIALES
        if (password_verify($contraOriginal, $auxPassword)) {

            session_start();

            $_SESSION["logueado"] = $userOriginal;

            $error['result']="true";

            echo json_encode($error);

        }else{
           
            $error['result']="false";

            echo json_encode($error);
        }
    }
?>