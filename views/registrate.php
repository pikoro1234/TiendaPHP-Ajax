<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">

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


    <title>Registrate</title>
</head>
<body>

    <div class="container registrate m-auto d-flex justify-content-center w-100">

        <form action="http://localhost/TiendaPHP-Ajax/controllers/registro.php" class="bg-white p-5 w-100 mt-5 mb-5" method="POST">
            <h3 class="text-center" style="letter-spacing: 3px;">REGISTRATE</h3>
            <div class="contenedor-datos-form d-flex flex-wrap">
                <!-- <div class="form-group w-50 px-3 py-2">
                <label for="exampleInputEmail1">User</label>
                <input type="text" class="form-control" name="user" id="user" placeholder="usuario" required>
                <small id="emailHelp" class="form-text text-muted">crea tu usuario.</small>
                </div>

                <div class="form-group w-50 px-3 py-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
                <small id="emailHelp" class="form-text text-muted">crea tu contraseña.</small>
                </div> -->

                <!-- <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre completo" required>
                </div> -->

                <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">DNI</label>
                    <input type="text" class="form-control" name="dniUser" id="dniUser" placeholder="00000000B" required>
                </div>

               <!-- <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                </div>

                <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="telefono" required>
                </div>

                <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">Addess</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="direccion completa">
                </div>

                <div class="form-group w-50 px-3 py-2">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="ciudad">
                </div>
            </div> -->
            
            <!-- nuevos datos de mapa -->
            <!-- <div class="form-group d-flex flex-wrap">		
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
            </div> -->
            <div class="form-group">
                <h5 class="text-center my-4">Ubicación del Producto</h5>
                <input type="text" class="w-50" name="latCrear" id="latCrear">
                <input type="text" class="w-50" name="longCrear" id="longCrear">
                <button type="button" class="btn btn-secondary mb-5 w-100 py-3" id="findLoc">Buscar Direccion</button>  
                <div id="map"></div>
            </div>
            <button type="submit" class="btn btn-primary w-100 p-3" id="btnRegistroUser">Guardar</button>
        </form>
   
    </div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<script src="../js/custom.js"></script>

<script src="../js/mapa.js"></script>

<script src="../js/app.js"></script>

<script src="../js/userRegister.js"></script>

</body>
</html>