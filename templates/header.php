<?php session_start();?>
<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- icon para barra de herramientas -->
        <link rel="icon" type="image/png" href="http://localhost/Tiendaphp/img/logophp.png"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- style css -->
        <link rel="stylesheet" href="http://localhost/Tiendaphp/css/style.css">

        <!-- Load Leaflet from CDN -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

        <!-- Load Esri Leaflet from CDN -->
        <script src="https://unpkg.com/esri-leaflet@2.5.3/dist/esri-leaflet.js"
            integrity="sha512-K0Vddb4QdnVOAuPJBHkgrua+/A9Moyv8AQEWi0xndQ+fqbRfAFd47z4A9u1AW/spLO0gEaiE1z98PK1gl5mC5Q=="
            crossorigin=""></script>

        <!-- Geocoding Control -->
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
            integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
            crossorigin="">
        <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
            integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
            crossorigin=""></script>
        
        <title>My Store</title>

    </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class='navbar-brand' style='letter-spacing: 3px;' href='http://localhost/Tiendaphp/index.php'>LOGO</a>

        <!-- navbar mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <div class="botones-register" style="margin-right: 30px;">
                    
                <!-- RECOGEMOS Y VALIDAMOS LA SESION PARA PERMITIR ACCESO Y/O MOSTRAR DISTINTOS ELEMENTOS SI ESTA Y NO LOGUEADO -->
                <?php
                    if (!isset($_SESSION['logueado'])) {

                        echo "<a href='http://localhost/Tiendaphp/views/login.php' class='btn btn-outline-success ml-5 mr-2' style='font-size:14px;'>AREA PRIVADA</a>"; 
                        
                        echo "<a href='http://localhost/Tiendaphp/views/registrate.php' class='btn btn-outline-success' style='font-size:14px;'>REGISTRATE</a>";

                    }else{
                        
                        echo "<a href='http://localhost/Tiendaphp/views/dashboard/principal.php' class='btn btn-outline-success ml-5 mr-2' style='font-size:14px;'>AREA PRIVADA</a>";
                    }
                ?>
            </div>
            
            <div class="imagen-user d-flex">

            <!-- RECOGEMOS Y VALIDAMOS LA SESION PARA PERMITIR ACCESO Y/O MOSTRAR DISTINTOS ELEMENTOS SI ESTA Y NO LOGUEADO -->
            <?php 

                if (isset($_SESSION["logueado"])) {

                    echo "<a class='nav-link mt-1' href='http://localhost/Tiendaphp/views/dashboard/principal.php'>".$_SESSION["logueado"]."</a>";

                    echo "<a href=''><img src='http://localhost/Tiendaphp/img/logophp.png' width='50' height='50' alt='...' class='rounded-circle'></a>";

                }else{

                    echo "<a class='nav-link mt-1' href='http://localhost/Tiendaphp/views/login.php'>No identificado</a>";
                }
                
                if (isset($_SESSION["logueado"])) {

                    echo "<a class='nav-link mt-1' href='http://localhost/Tiendaphp/controllers/cerrarSesion.php'> cerrar sesion</a>";
                }
            ?>
            </div>
        </div>
    </nav>