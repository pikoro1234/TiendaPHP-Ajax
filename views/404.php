<?php include_once('../templates/header.php');?>

<h1 class="display-1 text-center m-5">404</h1>

<?php
    /* DEPENDIENDO A LA URL DE ERROR ENVIA MENSAJE DISTINTO */
    if (isset($_GET['error'])) {
        
        if ($_GET['error'] === "actualizar") {

            echo '<h1 class="display-4 text-center mb-5">ERROR!! revisa los datos e intentalo nuevamente.</h1>

                <h2 class="display-4 text-center mb-5">Algun dato de Actualizacion erroneo</h2>';
        }
        
        if ($_GET['error'] === "imagen"){
            echo '<h1 class="display-4 text-center mb-5">ERROR!! revisa los datos e intentalo nuevamente.</h1>

                <h2 class="display-4 text-center mb-5">formato de fotos aceptados PNG/JPEG</h2>';
        }
    }
?>

<?php include_once('../templates/footer.php');?>