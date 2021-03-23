<?php 


    /* PARA VERIFICAR SI EL USUARIO EXISTE EN LA BASE DE DATOS USER Y PASSWORD */
    function verificarUserRegistrado($con,$user,$pass){

        //VARIABLES GLOBALES
        $contraOriginal = $pass;

        $userOriginal = $user;

        $auxPassword = "";

        //CONSULTA PARA TRAER Y VERIFICAR LA CONTRASEÑA
        $sql = "SELECT contrasenha FROM clientes WHERE nick_user = ? LIMIT 1";

        $valor1 = $user;

        $consulta = $con->prepare($sql);

        $consulta->bind_param("s",$valor1);

        $consulta->execute();

        $consulta->bind_result($pass);

        while ($consulta->fetch()) {

            $auxPassword = $pass;
        }

        //VALIDAMOS SI LOS DATOS DEL USUARIO SON CORRECTO REDIRECCIONAMOS AL DASHBOARD Y SI NO EXISTE VOLVEMOS A PEDIRLE LAS CREDENCIALES
        if (password_verify($contraOriginal, $auxPassword)) {

            session_start();

            $_SESSION["logueado"] = $userOriginal;

            header("Location: http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php");

            // print "<script>window.location = '../views/dashboard/principal.php';</script>";
        }else{
           
            header('Location: http://localhost/TiendaPHP-Ajax/views/login.php?error=error');
        }
    }


    /* REGISTRAR NUEVO USUARIO A LA BASE DE DATOS */
    function insertarCliente($con,$nick,$contrasenha,$nombre,$correo,$telefono,$direccion,$ciudad,$recuerdame,$foto){


        // echo "datos ".$nick." ".$contrasenha." ".$nombre." ".$correo." ".$telefono." ".$direccion." ".$ciudad." ".$recuerdame." ".$foto;

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

            echo "<h1 style='text-align: center;margin-top: 100px;font-size: 50px;'>USUARIO YA ESTA SIENDO USADO<H1>";

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
    
            $sql = "INSERT INTO `clientes`(`id`, `nick_user`, `contrasenha`, `nombre`, `correo`, `telefono`, `direccion`, `ciudad`, `recuerdame`, `estado`, `foto`, `alta`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
           
            $consultaPreparada = $con->prepare($sql);
    
            $consultaPreparada->bind_param("isssssssssss",$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12);
    
            //REGISTRAMOS AL CLIENTE Y LUEGO LO REDIRECCIONAMOS AL INDEX
            if($consultaPreparada->execute()){
                
                // header('Location: http://localhost/Tiendaphp/index.php');
                header('Location: http://localhost/TiendaPHP-Ajax/views/login.php');
    
            }else{

                header('Location: http://localhost/TiendaPHP-Ajax/views/404.php');
                // echo "no se pudo insertar revisa los datos" . mysqli_error($con);
            }
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


    /* SELECCIONAMOS MIS PRODUCTOS PARA MOSTRARLOS EN EL DASHBOARD Y USAMOS EL ID RECOGIDO ANTERIORMENTE RETORNA ARRAY DE MIS PRODUCTOS */
    function selectMisProductos($con,$usuario){

        $arrayMisProductos = array();

        $idUsuario = selectSessionId($con,$usuario);

        $sql = "SELECT producto.id, producto.nombre, producto.precio, producto.categoria, producto.estado, producto.numero_visitas, producto.fecha, producto.imagen_front FROM producto JOIN clientes ON clientes.id = producto.id_cliente WHERE clientes.id = ?";

        $valorUsuario = $idUsuario;

        $consulta = $con->prepare($sql);

        $consulta->bind_param("i",$valorUsuario);

        $consulta->execute();

        $productosMios = $consulta->get_result();

        while ($row = $productosMios->fetch_assoc()) {

            array_push($arrayMisProductos,$row);
        }

        return $arrayMisProductos;
    }


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

            return true;

        }else{

            return false;
        }
    }


    /* VERIFICAMOS PRODUCTO ANTES DE ELIMINARLO */ // ------ USO DE PDO
    function verificarProducto($conPDO, $idEliminar){

        try {

            $arrayProductosVerificados = array();

            $sql = "SELECT id FROM producto as resultado where ? IN (SELECT id FROM producto)";

            $statement = $conPDO->prepare($sql);

            $statement->execute(array($idEliminar));

            while($fila = $statement->fetch(PDO::FETCH_ASSOC)){

                array_push($arrayProductosVerificados,$fila['id']);

            }

            $statement->closeCursor();    
            
            return $arrayProductosVerificados;

        } catch (PDOException $e) {
            
            die($e->getMessage());
        }

    }

    /* ELIMINAMOS EL PRODUCTO YA VERIFICADO QUE EXISTE */ // ----- USO DE PDO
    function eliminarProducto($conPDO, $idEliminar){

        try {

            $sql = "DELETE FROM producto where id = ? LIMIT 1";

            $statement = $conPDO->prepare($sql);

            $statement->execute(array($idEliminar));

            if ($statement->rowCount() > 0) {

                return true;
            }

            return false;

        } catch (PDOException $e) {
            
            die($e->getMessage());
        }

    }


    /* TRAER MIS PRODUCTOS PARA PAGINA ACTUALIZAR */ // ---- USO DE PDO
    function traerMisProductos($conPDO, $idActualiar){

        $arrayMisProductosPDO = array();

        try {

            $sql = "SELECT * FROM producto WHERE id = ?";

            $statement = $conPDO->prepare($sql);

            $statement->execute(array($idActualiar));

            while($fila = $statement->fetch(PDO::FETCH_ASSOC)){

                array_push($arrayMisProductosPDO,
                $fila['nombre'], $fila['precio'], $fila['descripcion'], 
                $fila['peso'], $fila['dimension'], $fila['marca'],
                $fila['color'], $fila['envase'], $fila['categoria'],
                $fila['estado']);

            }

            $statement->closeCursor();    
            
            return $arrayMisProductosPDO;

        } catch (PDOException $e) {
            
            die($e->getMessage());
        }

    }

    /* ACTUALIZAMOS EL PRODUCTO YA COMPROBADO */ // ---  USO DE PDO
    function actualizarMiProducto($conPDO, $id, $nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado){

        try {

            $sql = "UPDATE  producto SET nombre = ?, precio = ?, descripcion = ?, peso = ?, dimension = ?, marca= ?, color = ?, envase = ?, categoria = ?, estado = ? WHERE id = ? LIMIT 1";

            $statement = $conPDO->prepare($sql);

            $statement->execute(array($nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado,$id));

            if ($statement->rowCount() > 0) {
                
                return true;
            }

        } catch (PDOException $e) {
            
            die($e->getMessage());
        } 
        
        /* consulta UPDATE  producto SET descripcion = 'descripcion actualizada', marca='la zanahoria' WHERE id = 49 LIMIT 1*/

       //return $nombre."<br>".$precio."<br>".$descripcion."<br>".$peso."<br>".$dimension."<br>".$marca."<br>".$color."<br>".$envase."<br>".$categoria."<br>".$estado;
    }
?>