<?php 

    /* INCLUIMOS LOS ARCHIVOS QUE UTILIZAREMOS */
    require_once('../../templates/header.php');

    require_once('../../models/conexion.php');

    require_once('../../modelsJS/single-page-cont-visitas.php');

    /* VERIFICAMOS SI ESTA LOGUEADO, SI NO LO ESTA LO SACAMOS HACIA EL LOGIN */
    if (!isset($_SESSION["logueado"])) {
        
        // header("Location: http://localhost/Tiendaphp/views/login.php");
        print "<script>window.location = '../login.php';</script>";
    }

    $conn = conexion();  

    /* FUNCION QUE TRAE MIS PRODUCTOS DE LA BASE DE DATOS PASANDO MI ID */
    $arrayProductos = selectMisProductos($conn,$_SESSION["logueado"]);
?>

<div class="content-dashboard d-flex position-relative">

    <!-- INCLUIMOS SIDEBAR SOLO POR ESTETICA NO ES NECESARIO -->
    <?php require_once('../../templates/sidebarsecond.php');?>
   

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
                                <button type='button' onclick = modalProducto(".$elemento['id'].") class='btn btn-outline-primary btn-eliminar-produc' data-toggle='modal' data-target='#exampleModal'>
                                    Eliminar
                                </button>
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


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-producto">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </div>
            </div>
        </div>

<?php include_once('../../templates/footer-page-dash-princial.php');?>