<?php

require_once("../models/conexion.php");

$conn = conexion();

$nick = $_POST['nickUser'];

$password = password_hash($_POST['passUser'],PASSWORD_DEFAULT);

$nombre = $_POST['nombreUser'];

$dni = $_POST['dniUser'];

$email = $_POST['emailUser'];

$direccion = $_POST['direcUser'];

$telefono = $_POST['telfUser'];

$ciudad = $_POST['cityUser'];

$recuerdame = "si";

$latitud = $_POST['latiUser'];

$longitud = $_POST['longiUser'];


insertarCliente($conn, $nick, $password, $nombre, $email, $telefono, $direccion, $ciudad, $recuerdame, "nofoto", $latitud, $longitud, $dni);

/* REGISTRAR NUEVO USUARIO A LA BASE DE DATOS */
function insertarCliente($con,$nick,$contrasenha,$nombre,$correo,$telefono,$direccion,$ciudad,$recuerdame,$foto,$latitud,$longitud,$dni){

    //CONSULTA PARA VERIFICAR SI EL USUARIO EXISTE EN LA TABLA
    $userSql = "SELECT nick_user FROM clientes WHERE nick_user = ?";

    $valorUser = $nick;

    $consultaUser = $con->prepare($userSql);

    $consultaUser->bind_param("s",$valorUser);

    $consultaUser->execute();

    $consultaUser->store_result();

    $filas = $consultaUser->num_rows;

    //VALIDAMOS SI EXISTE EL USUARIO EN LA BASE DE DATOS
    if ($filas > 0) {

        $error['result']="false";

        echo json_encode($error);

    }else{
        //SI NO EXISTE EL USUARIO REALIZAMOS LA INSERCION
        $fecha = new DateTime();

        $valor1 = 0;

        $valor2 = $nick;

        $valor3 = $contrasenha;

        $valor4 = $nombre;

        $valor5 = $correo;

        $valor6 = $telefono;

        $valor7 = $direccion;

        $valor8 = $ciudad;

        $valor9 = $recuerdame;

        $valor10 = "on";

        $valor11 = $foto;

        $valor12 = $fecha->format('D-d-m-Y');

        $valor13 = $latitud;

        $valor14 = $longitud;

        $valor15 = $dni;

        $sql = "INSERT INTO `clientes`(`id`, `nick_user`, `contrasenha`, `nombre`, `correo`, `telefono`, `direccion`, `ciudad`, `recuerdame`, `estado`, `foto`, `alta`, `latitud`, `longitud`, `dni`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       
        $consultaPreparada = $con->prepare($sql);

        $consultaPreparada->bind_param("issssssssssssss",$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$valor14,$valor15);

        //REGISTRAMOS AL CLIENTE Y LUEGO LO REDIRECCIONAMOS AL INDEX
        if($consultaPreparada->execute()){

            $error['result']="true";

            echo json_encode($error);                        

        }else{

            $error['result']="false";

            echo json_encode($error);
        }
    }
}


?>