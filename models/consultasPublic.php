<?php

    /* RETORNA ARRAY CON TODOS LOS PRODUCTOS */
    function selectProductos($con,$variable){

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $resultado = array();

        
        switch ($variable) {
            
            default:
                $sql = "SELECT *FROM producto";
                break;
        }

        $consulta = $con->prepare($sql);

        $consulta->execute();

        $preCargaElementos = $consulta->get_result();

        while ($row = $preCargaElementos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        return $resultado;
    }

    /* METODO PARA FILTRAR LOS PRODUCTOS RETORNA UN ARRAY FILTRADO */
    function selectFiltradosNombre($con, $nombre){

        $resultado = array();
 
        $valorNombre = substr($nombre,0,1);

        $sql = "SELECT * FROM producto WHERE nombre LIKE CONCAT(?,'%')";

        $consulta = $con->prepare($sql);

        $consulta->bind_param("s",$valorNombre);

        $consulta->execute();

        $datos = $consulta->get_result();

        while ($row = $datos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        return $resultado;
    }


    /* DEVUELVE UN ARRAY FILTRADO POR CATEGORIA AL INDEX */
    function selectFiltradosCategoria($con, $categoria){

        $resultado = array();
            
        $valorNombre = $categoria;

        $sql = "SELECT * FROM producto WHERE categoria = ?";

        $consulta = $con->prepare($sql);

        $consulta->bind_param("s",$valorNombre);

        $consulta->execute();

        $datos = $consulta->get_result();

        while ($row = $datos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        return $resultado;
    }

    
    /* DEVUELVE UN ARRAY FILTRADO DEACUERDO CON LOS DOS PARAMETROS DE LIMITE */
    function selectFiltradosBettween($con,$primero,$segundo){

        $resultado = array();

        $desde = $primero;

        $hasta = $segundo;

        $sql = "SELECT * FROM producto WHERE precio BETWEEN ? AND ?";
        
        $consulta = $con->prepare($sql);

        $consulta->bind_param("ii",$desde,$hasta);

        $consulta->execute();

        $datos = $consulta->get_result();

        while ($row = $datos->fetch_assoc()) {
            
            array_push($resultado,$row);
        }

        return $resultado;
    }


    /* MOSTRAMOS PRODUCTO SOLO DEPENDIENDO DEL ID DEL PRODUCTO RECIBIDO POR PARAMETRO EN SINGLEPAGE */
    function selectSinglePageProducto($con, $id){
        
        $resultado = array();

        $valor = $id;

        $sql = "SELECT * FROM producto WHERE id = ?";

        $consulta = $con->prepare($sql);

        $consulta->bind_param("i",$valor);

        $consulta->execute();

        $getElementos = $consulta->get_result();

        while ($row = $getElementos->fetch_assoc()) {

            array_push($resultado,$row);
        }

        return $resultado;
    }


    /* CONTADOR DE VISITAS AL VISITAR SINGLEPAGE EJECUTA LA FUNCION LA CUAL HACE UPDATE A LA BASE DE DATOS */
    function contadorVisitas($con,$parametro,$valor){

        $valorVisitas = $valor;

        $idProducto = $parametro;

        $sql = "UPDATE producto SET numero_visitas = ? WHERE id = ?";

        $consulta = mysqli_prepare($con,$sql);

        mysqli_stmt_bind_param($consulta,'ii',$valorVisitas,$idProducto);

        mysqli_stmt_execute($consulta);

    }

?>