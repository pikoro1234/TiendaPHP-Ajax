<?php 

    /* INCLUIMOS LOS ARCHIVOS QUE UTILIZAREMOS */
    require_once('../../templates/header.php');

    require_once('../../models/conexion.php');

    require_once('../../models/conexionPDO.php');

    require_once('../../modelsJS/single-page-cont-visitas.php');

    /* VERIFICAMOS SI ESTA LOGUEADO, SI NO LO ESTA LO SACAMOS HACIA EL LOGIN */
    if (!isset($_SESSION["logueado"])) {
        
        // header("Location: http://localhost/Tiendaphp/views/login.php");
        print "<script>window.location = '../login.php';</script>";
    }

    $conn = conexion();  

    $connPDO = conexionPDO();

    /* FUNCION QUE TRAE MIS PRODUCTOS DE LA BASE DE DATOS PASANDO MI ID */
    $arrayProductos = selectMisProductos($conn,$_SESSION["logueado"]);
?>

<div class="content-dashboard d-flex position-relative">

    <!-- INCLUIMOS SIDEBAR SOLO POR ESTETICA NO ES NECESARIO -->
    <?php require_once('../../templates/sidebarsecond.php');?>

    <?php 
        
        /* VERIFICAMOS SI EXISTE EL PARAMETRO ELIMINAR EN LA URL */
        if (isset($_GET['eliminar'])) {

            $idEliminar = $_GET['eliminar'];

            $productoVerificado = verificarProducto($connPDO, $idEliminar);

            /* SI EL PRODUCTO ID EXISTE EN LA BASE DE DATOS DEJA ELIMINAR SI LO HACE MEDIANTE LA URL SOLO EJECUTA UN MENSAJE DE ERROR*/
            if (count($productoVerificado) > 0) {

                $eliminarProducto = eliminarProducto($connPDO, $idEliminar);

                /* SI ELIMINA BIEN EL PRODUCTO NOS REDIRECCIONA AL AREA PRINCIPAL */
                if ($eliminarProducto) {

                    print "<script>window.location = 'http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';</script>";
                    // header('Location: http://localhost/Tiendaphp/views/dashboard/principal.php');
                }
                
            }else{ 

                echo "<div class='alert alert-danger position-absolute p-4' style='right:40%; top:0px' role='alert'><strong>Acción no se puede realizar por medio URL</strong></div>";
                        
            }

        }?> 

   

    <div class="content-rigth p-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr style='text-align: center;'>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
                <th scope="col">Visitas</th>
                <th scope="col">Imagen</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Actualizar</th>
                </tr>
            </thead>
            <tbody>
            <?php

                /* SOLO PARA LISTAR LOS PRODUCTOS  */
                $contador = 1;

                /* CREAMOS UNA TABLA DE PRODUCTOS DEACUERDO CON LOS DATOS RECIBIDOS EN EL ARRAY */

                /* 
                +
                + EN LA TABLA CREAMOS PAGINA ACTUALIZAR MEDIANTE URL PASANDO EL ID DEL PRODUCTO PARA ACTUALIZAR
                + Y PARA ELIMINAR SOLO PASAMOS A LA MISMA PAGINA UN PARAMETRO ELIMINAR CON EL CUAL REALIZAMOS LA ELIMINACION DEL PRODUCTO
                + 
                */
                foreach($arrayProductos as $elemento){

                    echo "<tr style='text-align: center;'>
                            <th scope='row' style='vertical-align: inherit;'>$contador</th>
                            <th scope='row' style='vertical-align: inherit;'>".$elemento['nombre']."</th>
                            <td style='vertical-align: inherit;'>".$elemento['precio']."</td>
                            <td style='vertical-align: inherit;'>".$elemento['categoria']."</td>
                            <td style='vertical-align: inherit;'>".$elemento['estado']."</td>
                            <td style='vertical-align: inherit;'>".$elemento['numero_visitas']."</td>
                            <td>
                                <img style='width: 250px;height: 150px;' src='".$elemento['imagen_front']."' class='img-thumbnail'  alt='...'>
                            </td>                                                        
                            <td class='align-middle'>
                                <a class= 'btn btn-outline-secondary' href='http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php?eliminar=".$elemento['id']."'>Eliminar</a>
                            </td>
                            <td class='align-middle'>
                                <a class= 'btn btn-outline-success' href='http://localhost/TiendaPHP-Ajax/views/dashboard/actualizar.php?id=".$elemento['id']."'>Actualizar</a>
                            </td>
                            </tr>";
                    $contador++;
                }
            ?>
            </tbody>
        </table>  
    </div>
</div>

<?php include_once('../../templates/footer-page-dash-princial.php');?>