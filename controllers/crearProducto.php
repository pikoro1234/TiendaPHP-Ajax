<?php
    require_once('../models/conexion.php');

    require_once('../models/consultas.php');

    //RECOGEMOS EL USUARIO DE LA SESSION YA INICIADA
    session_start();

    if (isset($_SESSION["logueado"])) {
       $user = $_SESSION["logueado"];
    }

    if (isset($_FILES['foto1'])) {
        $foto1 = $_FILES['foto1']['name'];
    }
 
    if(isset($_FILES['foto2'])){
        $foto2 = $_FILES['foto2']['name'];
    }

    if(isset($_FILES['foto3'])){
        $foto3 = $_FILES['foto3']['name'];
    }

    if (isset($_POST['nombreProducto'])) {
        $nombre = $_POST['nombreProducto'];
    }
    if (isset($_POST['precio'])) {
        $precio = $_POST['precio'];
    }

    if (isset($_POST['descripcion'])) {
        $descripcion = $_POST['descripcion'];
    }

    if (isset($_POST['peso'])) {
        $peso = $_POST['peso'];
    }

    if (isset($_POST['dimension'])) {
        $dimension = $_POST['dimension'];
    }

    if (isset($_POST['marca'])) {
        $marca = $_POST['marca'];
    }

    if (isset($_POST['color'])) {
        $color = $_POST['color'];
    }

    if (isset($_POST['envase'])) {
        $envase = $_POST['envase'];
    }

    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
    }

    if (isset($_POST['estado'])) {
        $estado = $_POST['estado'];
    }

    $conn = conexion();

    /* VALIDAMOS QUE EL ARCHIVO SEA UNA IMAGEN */
    if ($_FILES['foto1']['type'] === "image/png" || $_FILES['foto1']['type'] === "image/jpeg") {

        /* VALIDACION PARA LA INSERCION DEL PRODUCTO */
        if(insertarProducto($conn,$user,$foto1,$foto2,$foto3,$nombre,$precio,$descripcion,$peso,$dimension,$marca,$color,$envase,$categoria,$estado)){

            $fecha = new DateTime();

            $fechaImagen = $fecha->format('dmYHis');

            $directorio = "../uploads/";
    
            /* GUARDAMOS LA IMAGEN CON LA FECHA PARAQUE TODAS TENGAN UN NOMBRE DISTINTO */
            $fichero1 = $directorio.basename($fechaImagen.$_FILES['foto1']['name']);

            /* ESTA VALIDACION ES SI EXISTE FOTO LE PONE EL NOMBRE PORQUE SI NO EXISTE SE LE COLOCA NOMBRE PARA LA IMAGEN POR DEFECTO */
            if ($_FILES['foto2']['size'] > 0) {

                $fichero2 = $directorio.basename($fechaImagen.$_FILES['foto2']['name']);

            }else{

                $fichero2 = $directorio.basename($_FILES['foto2']['name']);
            }

            if ($_FILES['foto3']['size'] > 0) {

                $fichero3 = $directorio.basename($fechaImagen.$_FILES['foto3']['name']);

            }else{

                $fichero3 = $directorio.basename($_FILES['foto3']['name']);
            }
    
            /* AQUI MOVEMOS EL ARCHIVO AL SERVIDOR */
            move_uploaded_file($_FILES['foto1']['tmp_name'],$fichero1);
    
            move_uploaded_file($_FILES['foto2']['tmp_name'],$fichero2);
    
            move_uploaded_file($_FILES['foto3']['tmp_name'],$fichero3);
            
            header('Location: http://localhost/Tiendaphp/views/dashboard/principal.php');
            
        }else{

            /* REDIRECCION POR SI EXISTE ALGUN ERROR */
            header('Location: http://localhost/Tiendaphp/views/404.php?error=imagen');
            // echo "no se pudo insertar producto error 1" . mysqli_error($conn);
        } 

    }else{
    
            header('Location: http://localhost/Tiendaphp/views/404.php?error=imagen');
            // echo "no se pudo insertar producto error 2" . mysqli_error($conn);
    }
?>