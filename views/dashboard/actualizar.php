<?php 
    require_once('../../templates/header.php');

    require_once('../../models/conexionPDO.php');

    require_once('../../modelsJS/single-page-cont-visitas.php');

    /* VERIFICAMOS SI EXISTE LA SESSION SI NO EXISTE REDIRECCIONAMOS A LOGIN */
    if (!isset($_SESSION["logueado"])) {

        // header("Location: http://localhost/Tiendaphp/views/login.php");
        print "<script>window.location = '../login.php';</script>";
    }

    

    $conPDO = conexionPDO();

    /* RECOGEMOS ID DE PRODUCTO PASADO POR URL */
    if (isset($_GET['id'])) {
        
        $idActualizar = $_GET['id'];
    }

    /* VERIFICAMOS QUE LA URL SEA CORRECTA CONTROLANDO QUE NO SEAN LETRAS */
    if (preg_match("/[a-z]/",$_GET['id'])) {
      
        print "<script>window.location = 'http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';</script>";
    }

    /* VERIFICAMOS SI EXISTE EL PRODUCTO CON ID ENVIADO POR PARAMETRO */
    $productoVerificado = verificarProducto($conPDO, $idActualizar);

    /* SI EXISTE EL PRODUCTO TRAEMOS LOS DATOS SINO REDIRECCIONAMOS*/
    if (count($productoVerificado) > 0) {

        $misProductos = traerMisProductos($conPDO, $idActualizar);
        
    }else{ 

        print "<script>window.location = 'http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';</script>";
                  
    }
?>

<div class="content-dashboard d-flex position-relative">

    <?php require_once('../../templates/sidebarsecond.php');?>

    <div class="content-rigth p-5">
    <input type="text" name="idProducto" id="idProducto" value="<?php echo $idActualizar;?>">
        
        <form action="http://localhost/TiendaPHP-Ajax/controllers/actualizarProducto.php" method="POST" class="p-5 bg-white m-5">
            
            <h1 class="text-center mb-5">Actualizar Producto (<strong><?php echo $idActualizar ?></strong>)</h1>   

            <div class="form-group">
                <input type="hidden" class="form-control" name="idProducto" id="idProducto" aria-describedby="emailHelp" value="<?php echo $idActualizar ?>" required>
            </div>     

            <div class="form-group">
                <label for="exampleInputEmail1">Nombre producto</label>
                <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" aria-describedby="emailHelp" value="<?php echo $misProductos[0];?>" required>
            </div>

            <div class="form-group">                
                <div class="input-group-prepend">                    
                    <span class="input-group-text">Precio €</span>
                    <span class="input-group-text">00.00 - 00.0 dato decial (6,2)</span>
                </div>               
                <input type="text" class="form-control" placeholder="00.00 - 00.0 dato decial (6,2)" name="precio" id="precio" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $misProductos[1];?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripción</label>
                <textarea class="form-control" placeholder="descripcion" name="descripcion" id="descripcion" cols="30" rows="5" ><?php echo $misProductos[2];?></textarea>
            </div>
            <div class="card p-4 mt-5 mb-5">
                <h5 class="text-center">Caracteristicas</h5>
                <div class="form-group">
                    <label for="exampleInputPassword1">Peso</label>
                    <input type="text" class="form-control" name="peso" id="peso" value="<?php echo $misProductos[3];?>" placeholder="00.00 Gr/Kg">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Dimensiones</label>
                    <input type="text" class="form-control" name="dimension" id="dimension" value="<?php echo $misProductos[4];?>" placeholder="alto 0cm ancho 0cm etc...">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Marca</label>
                    <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $misProductos[5];?>" placeholder="marca blanca, etc.">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" name="color" id="color" value="<?php echo $misProductos[6];?>" placeholder="rojo con blanco, etc.">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Envase</label>
                    <input type="text" class="form-control" name="envase" id="envase" value="<?php echo $misProductos[7];?>" placeholder="envase">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Categoria</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="categoria" id="categoria" required>  
                        <!-- CREAMOS HTML DINAMICO PARA LOS SELECT -->
                        <?php switch ($misProductos[8]) {

                                case '1':
                                    
                                    echo '
                                        <option value="1" selected>categoria #1</option>
                                        <option value="2">categoria #2</option>
                                        <option value="3">categoria #3</option>
                                        <option value="4">categoria #4</option>
                                        <option value="5">categoria #5</option>';

                                    break;

                                case '2':
                                    
                                    echo '
                                        <option value="1">categoria #1</option>
                                        <option value="2" selected>categoria #2</option>
                                        <option value="3">categoria #3</option>
                                        <option value="4">categoria #4</option>
                                        <option value="5">categoria #5</option>';

                                    break;

                                case '3':
                                    
                                    echo '
                                        <option value="1">categoria #1</option>
                                        <option value="2">categoria #2</option>
                                        <option value="3" selected>categoria #3</option>
                                        <option value="4">categoria #4</option>
                                        <option value="5">categoria #5</option>';

                                    break;

                                case '4':
                                    
                                    echo '
                                        <option value="1">categoria #1</option>
                                        <option value="2">categoria #2</option>
                                        <option value="3">categoria #3</option>
                                        <option value="4" selected>categoria #4</option>
                                        <option value="5">categoria #5</option>';

                                    break;

                                case '5':
                                    
                                    echo '
                                        <option value="1">categoria #1</option>
                                        <option value="2">categoria #2</option>
                                        <option value="3">categoria #3</option>
                                        <option value="4">categoria #4</option>
                                        <option value="5" selected>categoria #5</option>';

                                    break;
                            }?>                     
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Estado</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="estado" id="estado" required>
                        <!-- CREAMOS HTML DINAMICO PARA LOS SELECT -->
                        <?php switch ($misProductos[9]) {
                            case 'activo':

                                    echo '

                                    <option value="activo" selected>activo</option>
                                    <option value="reservado">reservado</option>
                                    <option value="vendido">vendido</option>
                                    <option value="stock">en stock</option>                        
                                    <option value="oferta">oferta</option>
                                    <option value="descuento">descuento</option>';

                                break;

                            case 'reservado':

                                    echo '

                                    <option value="activo">activo</option>
                                    <option value="reservado" selected>reservado</option>
                                    <option value="vendido">vendido</option>
                                    <option value="stock">en stock</option>                        
                                    <option value="oferta">oferta</option>
                                    <option value="descuento">descuento</option>';

                                break;

                            case 'vendido':

                                    echo '

                                    <option value="activo">activo</option>
                                    <option value="reservado">reservado</option>
                                    <option value="vendido" selected>vendido</option>
                                    <option value="stock">en stock</option>                        
                                    <option value="oferta">oferta</option>
                                    <option value="descuento">descuento</option>';

                                break;

                            case 'stock':

                                    echo '

                                    <option value="activo">activo</option>
                                    <option value="reservado">reservado</option>
                                    <option value="vendido">vendido</option>
                                    <option value="stock" selected>en stock</option>                        
                                    <option value="oferta">oferta</option>
                                    <option value="descuento">descuento</option>';

                                break;

                            case 'oferta':

                                    echo '

                                    <option value="activo">activo</option>
                                    <option value="reservado">reservado</option>
                                    <option value="vendido">vendido</option>
                                    <option value="stock">en stock</option>                        
                                    <option value="oferta" selected>oferta</option>
                                    <option value="descuento">descuento</option>';

                                break;

                            case 'descuento':

                                    echo '

                                    <option value="activo">activo</option>
                                    <option value="reservado">reservado</option>
                                    <option value="vendido">vendido</option>
                                    <option value="stock">en stock</option>                        
                                    <option value="oferta">oferta</option>
                                    <option value="descuento" selected>descuento</option>';

                                break;
                                                                                                                
                        }?>

                        
                    </select>
                </div>
            </div>
        
            <button type="submit" id="btnActualizarPro" class="btn btn-primary mt-5">Actualizar</button>
            
        </form>
        
    </div>
</div>

<?php include_once('../../templates/footerActualizar.php');?>