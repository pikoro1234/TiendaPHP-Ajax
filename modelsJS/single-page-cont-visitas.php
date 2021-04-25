<?php 
   
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

    /* VERIFICAMOS PRODUCTO ANTES DE ELIMINARLO */ // ------ USO DE PDO
    /* function verificarProducto($conPDO, $idEliminar){

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

    } */

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

    /* ELIMINAMOS EL PRODUCTO YA VERIFICADO QUE EXISTE */ // ----- USO DE PDO
    /* function eliminarProducto($conPDO, $idEliminar){

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

    } */
?>