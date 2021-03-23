<?php 

    /* ARCHIVOS QUE NECESITAREMOS */
  include_once('templates/header.php'); 

  include_once('models/conexion.php');

  include_once('./modelsJS/todosProductos.php');
  
?>

<div class="container" style="margin-bottom: 160px;">

  <h1 class="text-center mt-5 mb-3">My store</h1>
  <div class="row">
    <div class="col-4">
      <select class="form-select w-100" name="fecha" aria-label="Default select example">
        <option value="">Ordenar por Fecha</option>
        <option value="descendente">nuevo - antiguo</option>
        <option value="ascendente">antiguo - nuevo</option>
      </select>
    </div>
    
    <div class="col-4">
      <select class="form-select w-100" name="precio" aria-label="Default select example">
        <option value="">Ordenar por Precio</option>
        <option value="barato">barato - caro</option>
        <option value="caro">caro - barato</option>
      </select>
    </div>

    <div class="col-4">
      <select class="form-select w-100" name="categoria" aria-label="Default select example">
        <option value="">Filtrar Categorias</option>
        <option value="1">Categoria #1</option>
        <option value="2">Categoria #2</option>
        <option value="3">Categoria #3</option>
        <option value="4">Categoria #4</option>
        <option value="5">Categoria #5</option>
      </select>
    </div>
  </div>

  <div class="post-header mb-4 d-flex justify-content-between ml-2 mr-2">
  <div class="row">
    <div class="col-6">
      <div class="content-forms">
        <form class="form-inline mt-3 w-100">
          <p class="text-center w-100 m-0">buscar producto</p>
          <input name="producto" id="producto" class="form-control m-0 mb-3 w-100" type="search" placeholder="Buscar..." aria-label="Search">
          <input class="btn btn-outline-success my-2 my-sm-0 mt-4 btn-buscar w-100" id="btn-buscar" type="button" value="Buscar">
        </form>
      </div>
    </div>
    <div class="col-6">
        <div class="elements-bottom w-100 d-flex">
          
        </div>
      <div class="content-forms">
        <form class="form-inline my-2 my-lg-0">
        <div class="elements-top d-flex justify-content-center flex-wrap w-100">
          <div class="content-inputs d-flex flex-wrap w-100">
            <p class="text-center w-100 mb-0 mt-3">filtra por el precio</p>
            <div class="input-group mb-3 w-50">          
              <input type="number" name="desde" id="desde" min="0" class="form-control mr-1" placeholder="desde" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 w-50">
              <input type="number"  name="hasta" id="hasta" max="3000" class="form-control ml-1" placeholder="hasta" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </div>
          <input class="btn btn-outline-success my-2 my-sm-0 w-100 btn-filtrar" id="btn-filtrar" type="button" value="Filtrar">
        </div>

        </form>
      </div>
    </div>
  </div>
    
  </div>
    
  <div class="content-productos d-flex mb-5">

    <?php

        /* GUARDAMOS CONEXION PARA ENVIARLA POR PARAMETRO */
        $conn = conexion();

        /* TRAEMOS TODOS LOS PRODUCTOS A PAGINA PRINCIPAL */
        $arrayProductos = selectProductos($conn,"");

        /* CREAMOS UN HTML DEPENDIENDO A LOS DATOS QUE NOS RETORNE EL ARRAY E IMPRIMIMOS VALORES DE PRODUCTOS */
        foreach($arrayProductos as $prod){

          echo "
                <div class='card' style='width: 18rem; position: relative;'>";
                if ($prod['estado'] === 'descuento') {
                  echo "<span class='pt-2 pb-2 pl-3 pr-3 badge bg-danger text-white' style='position: absolute;z-index: 115;top: -1px;right: -12px; font-size: 18px;'>".$prod['estado']."</span>";
                }

                if ($prod['estado'] === 'reservado') {
                  echo "<span class='pt-2 pb-2 pl-3 pr-3 badge bg-success text-white' style='position: absolute;z-index: 115;top: -1px;right: -12px; font-size: 18px;'>".$prod['estado']."</span>";
                } 

                if ($prod['estado'] === 'oferta') {
                  echo "<span class='pt-2 pb-2 pl-3 pr-3 badge bg-warning text-white' style='position: absolute;z-index: 115;top: -1px;right: -12px; font-size: 18px;'>".$prod['estado']."</span>";
                }

                if ($prod['estado'] === 'activo') {
                  echo "<span class='pt-2 pb-2 pl-3 pr-3 badge bg-primary text-white' style='position: absolute;z-index: 115;top: -1px;right: -12px; font-size: 18px;'>".$prod['estado']."</span>";
                }

                if ($prod['estado'] === 'stock') {
                  echo "<span class='pt-2 pb-2 pl-3 pr-3 badge bg-dark text-white' style='position: absolute;z-index: 115;top: -1px;right: -12px; font-size: 18px;'>".$prod['estado']."</span>";
                }

                if ($prod['estado'] === 'vendido') {

                  echo "<div class='spam-stock' style='position: relative;'>
                    <div class='text-stock' style='background-color: #fff; height: 100%; width: 100%;
                    text-align: center;position: absolute;z-index: 100;opacity: 0.5;font-size: 40px;font-weight: bold;padding-top: 60px;'>";

                  echo "<p class='card-text'>".$prod['estado']."</p>";

                }else{

                  echo "<div class='spam-stock' style='position: relative;'>
                    <div class='text-stock' height: 100%; width: 100%;
                    text-align: center;position: absolute;z-index: 100;opacity: 0.2;font-size: 40px;font-weight: bold;padding-top: 60px;'>";
                }

                    echo"</div>
                    <img style='height: 180px!important;' src='".$prod['imagen_front']."' class='card-img-top' alt='...'>
                  </div>
                  <div class='card-body'>
                    <h5 class='card-title'>".$prod['nombre']."</h5>
                      <p class='card-text'><strong>categoria: </strong>".$prod['categoria']."</p>
                      <p class='card-text'>".$prod['descripcion']."</p>
                      <div class='pree-footer mb-3' style='display:flex;'>
                        <h2 style='display: flex;justify-content: end;'> 
                          <span class=' text-white badge bg-secondary'>€ ".$prod['precio']."</span>
                        </h2>                        
                      </div>                      
                      <a href='http://localhost/TiendaPHP-Ajax/views/singlepage.php?param=".$prod['id']."' class='btn btn-primary'>Leer mas...</a>
                  </div>
                </div>";
        }
    ?>   
  </div>
</div><!-- fin container -->

<?php include_once('./templates/footer.php');?>