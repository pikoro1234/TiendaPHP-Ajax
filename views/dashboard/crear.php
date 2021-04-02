<?php 
    require_once('../../templates/header.php');

    /* VERIFICAMOS LA VARIABLE DE SESSION SI NO EXISTE SACAMOS DE LA WEB REDIRECCION A LOGIN */ 
    if (!isset($_SESSION["logueado"])) {

        // header("Location: http://localhost/Tiendaphp/views/login.php");
        print "<script>window.location = '../login.php';</script>";
    }else{

        $user = $_SESSION['logueado'];
    }
?>

<div class="content-dashboard d-flex">

    <?php require_once('../../templates/sidebarsecond.php');?>

    <div class="content-rigth p-5">

        <div class=" px-5 py-5 alert alert-success alerta-flotante" role="alert">Producto creado verificalo en tu dashboard</div>
        
        <form action="http://localhost/TiendaPHP-Ajax/controllers/crearProducto.php" id="crearForm" method="POST" class="p-5 bg-white m-5" enctype="multipart/form-data">
            
            <h2 class="text-center mb-5">Crear Producto</h2>

            <input type="hidden" name="user" id="user" value="<?php echo $user;?>">

            <div class="form-group">
                <label for="exampleFormControlFile1">Subir foto producto</label>
                <input type="file" class="form-control-file" name="foto1" id="foto1" required>
            </div>

           <div class="form-group">
                <label for="exampleFormControlFile1">Subir foto producto</label>
                <input type="file" class="form-control-file" name="foto2" id="foto2" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Subir foto producto</label>
                <input type="file" class="form-control-file" name="foto3" id="foto3" required>
            </div>            

            <div class="form-group d-flex flex-wrap">
                <div class="pr-3 w-50">
                    <label for="exampleInputEmail1">Nombre producto</label>
                    <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" aria-describedby="emailHelp" required>
                </div>
                <div class="pl-3 w-50">
                    <div class="input-group-prepend">                    
                        <span class="input-group-text">Precio €</span>
                        <span class="input-group-text">00.00 - 00.0 dato decial (6,2)</span>
                    </div>               
                        <input type="text" class="form-control" placeholder="00.00 - 00.0 dato decial (6,2)" name="precio" id="precio" aria-label="Dollar amount (with dot and two decimal places)" required>                
                </div>            
            </div>        
            <div class="form-group">
                <label for="exampleInputPassword1">Descripción</label>
                <textarea class="form-control" placeholder="descripcion" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
            </div>
            <div class="card p-4 mt-5 mb-5">
                <h5 class="text-center">Caracteristicas</h5>
                <div class="content-productos d-flex flex-wrap">
                    <div class="form-group w-50 px-3 py-2">
                        <label for="exampleInputPassword1">Peso</label>
                        <input type="text" class="form-control" name="peso" id="peso" placeholder="00.00 Gr/Kg">
                    </div>

                    <div class="form-group w-50 px-3 py-2">
                        <label for="exampleInputPassword1">Dimensiones</label>
                        <input type="text" class="form-control" name="dimension" id="dimension" placeholder="alto 0cm ancho 0cm etc...">
                    </div>

                    <div class="form-group w-50 px-3 py-2">
                        <label for="exampleInputPassword1">Marca</label>
                        <input type="text" class="form-control" name="marca" id="marca" placeholder="marca blanca, etc.">
                    </div>

                    <div class="form-group w-50 px-3 py-2">
                        <label for="exampleInputPassword1">Color</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="rojo con blanco, etc.">
                    </div>

                    <div class="form-group w-50 px-3 py-2">
                        <label for="exampleInputPassword1">Envase</label>
                        <input type="text" class="form-control" name="envase" id="envase" placeholder="envase">
                    </div>
                    <div class="form-group w-50 px-3 py-2">
                       
                    </div>
                </div>
                
            </div>
            <div class="card p-4 mt-5 mb-1">
                <h5 class="text-center w-100 my-3">Categorias y Estados</h5>	
                <div class="form-group d-flex flex-wrap">
                    <div class="pr-3 w-50">
                        <label for="exampleInputPassword1">Categoria</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" name="categoriaCrear" id="categoriaCrear" required>                        
                                <option value="">Selecciona categoria</option>
                                <option value="1">categoria #1</option>
                                <option value="2">categoria #2</option>
                                <option value="3">categoria #3</option>
                                <option value="4">categoria #4</option>
                                <option value="5">categoria #5</option>
                            </select>
                        </div>
                    </div>

                    <div class="pl-3 w-50">
                        <label for="exampleInputPassword1">Estado</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" name="estado" id="estado" required>
                                <option value="">Selecciona estado</option>
                                <option value="activo">activo</option>
                                <option value="reservado">reservado</option>
                                <option value="vendido">vendido</option>
                                <option value="stock">en stock</option>                        
                                <option value="oferta">oferta</option>
                                <option value="descuento">descuento</option>
                            </select>
                        </div>
                    </div>
                    
                </div>                      
            <button type="submit" class="btn btn-primary mt-2 mb-2 py-4 w-50" id="enviarDatosProductos">Enviar</button>
            
        </form>
        
    </div>
</div>

<?php include_once('../../templates/footerEspecial.php');?>