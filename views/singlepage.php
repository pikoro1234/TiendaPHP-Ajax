<?php 

    /* INCLUIMOS LOS FICHEROS QUE UTILIZAREMOS */
    require_once('../templates/header.php');
    require_once('../models/conexion.php');
    require_once('../modelsJS/single-page-cont-visitas.php');

    /* GUARDAMOS LA CONEXION EN VARIABLE PARA UTILIZARLA COMO PARAMETRO */
    $conn = conexion();

    /* RECOGEMOS EL ID DEL PRODUCTO POR MEDIO DE LA URL */
    if (isset($_GET['param'])) {

        $idUser = $_GET['param'];
    }

    /* TRAEMOS EL NOUMERO DE VISITAS DESDE DB */
    $numero_visitas = selectSinglePageProducto($conn,$idUser);

    /*INCREMENTAMOS UNO A LAS VISITAS Y LA PASAMOS COMO PARAMETRO */
    $valor = $numero_visitas[0]['numero_visitas']+1;

    contadorVisitas($conn,$idUser,$valor);
?>

<h1 class="text-center mt-2 mb-3 my-4">Single Page</h1>

<input type="hidden" name="idSingle" id="idSingle" value="<?echo $idUser;?>">

<!-- PINTAMOS TODOS LOS DATOS DEL PRODUCTO EN CUESTION MEDIANTE AJAX-->
<div class="container mb-5"></div>

<style>
    /*carrousel singlepage*/
    /*object-fit:cover*/
    html body #carouselExampleDark,
    html body #carouselExampleDark .carousel-inner,
    html body #carouselExampleDark .carousel-inner .carousel-item,
    html body #carouselExampleDark .carousel-inner .carousel-item img{
        height: 500px;
        box-shadow: 0 -6px 20px #00000059;
    }
</style>

<?php require_once('../templates/footer-single.php');?>
