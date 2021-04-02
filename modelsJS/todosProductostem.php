<?php 
   
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