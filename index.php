<?php 

  include_once('templates/header.php'); 
  
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
  </div>
</div><!-- fin container -->

<?php include_once('./templates/footer.php');?>