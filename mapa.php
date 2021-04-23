<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css/style.css">

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
   
</head>

<style>
		#map {
			width: 600px;
			height: 400px;
		}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class='navbar-brand' style='letter-spacing: 3px;' href='http://localhost/TiendaPHP-Ajax/index.php'>LOGO</a>

    <!-- navbar mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <div class="botones-register" style="margin-right: 30px;">
                
            <!-- RECOGEMOS Y VALIDAMOS LA SESION PARA PERMITIR ACCESO Y/O MOSTRAR DISTINTOS ELEMENTOS SI ESTA Y NO LOGUEADO -->
            <?php
                if (!isset($_SESSION['logueado'])) {

                    echo "<a href='http://localhost/TiendaPHP-Ajax/views/login.php' class='btn btn-outline-success ml-5 mr-2' style='font-size:14px;'>AREA PRIVADA</a>"; 
                    
                    echo "<a href='http://localhost/TiendaPHP-Ajax/views/registrate.php' class='btn btn-outline-success' style='font-size:14px;'>REGISTRATE</a>";

                }else{
                    
                    echo "<a href='http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php' class='btn btn-outline-success ml-5 mr-2' style='font-size:14px;'>AREA PRIVADA</a>";
                }
            ?>
            <a class='btn btn-outline-success ml-1 mr-2' style='font-size:14px;' href='http://localhost/TiendaPHP-Ajax/index.php'>INICIO</a>
        </div>
        
        <div class="imagen-user d-flex">

            <!-- RECOGEMOS Y VALIDAMOS LA SESION PARA PERMITIR ACCESO Y/O MOSTRAR DISTINTOS ELEMENTOS SI ESTA Y NO LOGUEADO -->
            <?php 

                if (isset($_SESSION["logueado"])) {

                    echo "<a class='nav-link mt-1' href='http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php'>".$_SESSION["logueado"]."</a>";

                    echo "<a href=''><img src='http://localhost/TiendaPHP-Ajax/img/logophp.png' width='50' height='50' alt='...' class='rounded-circle'></a>";

                }else{

                    echo "<a class='nav-link mt-1' href='http://localhost/TiendaPHP-Ajax/views/login.php'>No identificado</a>";
                }
                
                if (isset($_SESSION["logueado"])) {

                    echo "<a class='nav-link mt-1' href='http://localhost/TiendaPHP-Ajax/controllers/cerrarSesion.php'> cerrar sesion</a>";
                }
            ?>
        </div>
    </div>
    </nav>














	<div class="container pt-5 container-mapa">    
		<h1 class="text-center">Mapa de todos los productos</h1>
		<div class="row h-100">		
			<div class="col-12 py-5 px-5">				
				<div id="map" class="w-100 mapa-todos-productos h-100">
					
				</div> 
			</div>		
		</div>

	</div>


    <style>
    .leaflet-zoom-animated{
        width: 300px;
    }
    .fs-3{
        font-size:2em;
    }
    </style>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<script src="./js/mapaAllProductos.js"></script>
</body>
</html>