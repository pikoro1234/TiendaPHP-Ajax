<?php

require_once("../models/conexion.php");

$conn = conexion();

$usuario = $_POST['userNick'];

$foto1 = $_FILES['image1']['name'];

$foto2 = $_FILES['image2']['name'];
    
$foto3 = $_FILES['image3']['name'];

$nombreProducto = $_POST['nombreProducto'];

$precioProducto = $_POST['precioProducto'];

$descripcionProducto = $_POST['descripcionProducto'];

$pesoProducto = $_POST['pesoProducto'];

$dimensionProducto = $_POST['dimensionProducto'];

$marcaProducto = $_POST['marcaProducto'];

$colorProducto = $_POST['colorProducto'];

$envaseProducto = $_POST['envaseProducto'];

$categoriaProducto = $_POST['categoriaProducto'];

$estadoProducto = $_POST['estadoProducto'];

insertarProducto($conn,$usuario,$foto1,$foto2,$foto3,$nombreProducto,$precioProducto,$descripcionProducto,$pesoProducto,$dimensionProducto,$marcaProducto,$colorProducto,$envaseProducto,$categoriaProducto,$estadoProducto);

/* CREAMOS PRODUCTO PASAMOS COMO PARAMETRO ID CURRENT USER */
function insertarProducto($con,$user,$foto1,$foto2,$foto3,$nombre,$precio,$descripcion,$peso,$dimension,$marca,$color,$envase,$categoria,$estado){

    $fecha = new DateTime();

    $fechaImagen = $fecha->format('dmYHis');

    //URL UPLOADS 
    $link = "http://localhost/TiendaPHP-Ajax/uploads/";

    //VARIABLE OBTIENE ID DEL USUARIO QUE ESTA EN LA SESSION
    $idUsuario = selectSessionId($con,$user);

    //llenamos los valores a insertar
    $valor1 = 0;

    $valor2 = $link.$fechaImagen.$foto1;

    if ($foto2 === "") {
        
        $valor3 = $link.$foto2;

    }else{

        $valor3 = $link.$fechaImagen.$foto2;
    }

    if ($foto3 === "") {

        $valor4 = $link.$foto3;
       
    }else{

        $valor4 = $link.$fechaImagen.$foto3;

    }

    $valor5 = $nombre;

    $valor6 = $precio;

    $valor7 = $descripcion;

    $valor8 = $peso;

    $valor9 = $dimension;

    $valor10 = $marca;

    $valor11 = $color;

    $valor12 = $envase;

    $valor13 = $categoria;

    $valor14 = $estado;

    $valor15 = $fecha->format('d-m-Y');

    $valor16 = 0;

    $valor17 = $idUsuario;

    $sql = "INSERT INTO `producto`(`id`, `imagen_front`, `imagen_back`,`imagen_left`, `nombre`, `precio`, `descripcion`, `peso`, `dimension`, `marca`, `color`, `envase`, `categoria`, `estado`, `fecha`,`numero_visitas`, `id_cliente`)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $consultaPreparada = $con->prepare($sql);

    $consultaPreparada->bind_param("issssdsssssssssii",$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$valor14,$valor15,$valor16,$valor17);

    /* VALIDAMOS PARA ENVIAR MENSAJE DE INSERCION O NO INSERCION DEL PRODUCTO */
    if($consultaPreparada->execute()){

        $directorio = "../uploads/";

        $fichero1 = $directorio.basename($fechaImagen.$_FILES['image1']['name']);
            
        $fichero2 = $directorio.basename($fechaImagen.$_FILES['image2']['name']);
    
        $fichero3 = $directorio.basename($_FILES['image3']['name']);        
        
        /* AQUI MOVEMOS EL ARCHIVO AL SERVIDOR */
        move_uploaded_file($_FILES['image1']['tmp_name'],$fichero1);
    
        move_uploaded_file($_FILES['image2']['tmp_name'],$fichero2);

        move_uploaded_file($_FILES['image3']['tmp_name'],$fichero3);

        $error['result']="true";

        echo json_encode($error);

    }else{

        $error['result']="false";

        echo json_encode($error);
    }
}


/* FUNCION AUXILIAR PARA RECOGER ID DEL CURRENT USER PARA USARLA EN SELECCIONAR MIS PRODUCTOS */
function selectSessionId($con,$user){

    $idUsuario = "--";

    $sql = "SELECT id FROM clientes WHERE nick_user = ? LIMIT 1";

    $valor = $user;

    $consulta = $con->prepare($sql);

    $consulta->bind_param("s",$valor);

    $consulta->execute();

    $consulta->bind_result($user);

    while($consulta->fetch()){

        $idUsuario = $user;
    }

    return $idUsuario;
}
?>