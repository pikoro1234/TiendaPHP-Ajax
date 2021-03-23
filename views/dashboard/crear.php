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
        
        <form action="http://localhost/TiendaPHP-Ajax/controllers/crearProducto.php" id="crearForm" method="POST" class="p-5 bg-white m-5" enctype="multipart/form-data">
            
            <h2 class="text-center mb-5">Crear Producto</h2>

            <input type="text" name="user" id="user" value="<?php echo $user;?>">

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
                <div class="form-group">
                    <label for="exampleInputPassword1">Peso</label>
                    <input type="text" class="form-control" name="peso" id="peso" placeholder="00.00 Gr/Kg">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Dimensiones</label>
                    <input type="text" class="form-control" name="dimension" id="dimension" placeholder="alto 0cm ancho 0cm etc...">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Marca</label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="marca blanca, etc.">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" name="color" id="color" placeholder="rojo con blanco, etc.">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Envase</label>
                    <input type="text" class="form-control" name="envase" id="envase" placeholder="envase">
                </div>
            </div>
            <!---
            <div class="card p-4 mt-5 mb-5">
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


                <div class="form-group d-flex flex-wrap">		
                    <h5 class="text-center w-100 my-3">Datos de Ubicación</h5>	
                    <div class="pr-3 w-50">
                        <label for="">Tipo de Via</label>
                        <select class="custom-select" id="via" name="via">                
                            <option value="1">Calle</option>
                            <option value="2">Barrio</option>
                            <option value="3">Avenida</option>
                        </select>
                    </div>
                    <div class="pl-3 w-50">
                        <label for="">Nombre</label>
					    <input type="text" class="form-control" id="nomCarrer" name="nomCarrer">
                    </div>

                    <div class="pr-3 w-50">
                        <label for="">Número</label>
					    <input type="text" class="form-control" id="numCarrer" name="numCarrer">
                    </div>

                    <div class="pl-3 w-50">
                        <label for="">Población</label>
					    <input type="text" class="form-control" id="poblacio" name="poblacio">
                    </div>			                    
                </div>
 -->
                <div class="form-group">
                    <h5 class="text-center my-4">Ubicación del Producto</h5>
                    <input type="text" class="w-50" name="latCrear" id="latCrear">
                    <input type="text" class="w-50" name="longCrear" id="longCrear">
                    <button type="button" class="btn btn-secondary mb-5 w-100 py-3" id="findLoc">Buscar Direccion</button>  
                    <div id="map"></div>
                </div>

        
            <button type="submit" class="btn btn-primary mt-5 mb-5 py-4 w-50" id="enviarDatosProductos">Enviar</button>
            
        </form>
        
    </div>
</div>

<?php include_once('../../templates/footerEspecial.php');?>