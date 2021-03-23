<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
	<div class="container pt-5">
		<h4 class="text-center">Formulari de registre d'usuaris</h4>
		<div class="row">
			<div class="col-6">
				<form id="form-user-register" action="" method="">															
					<div class="form-row mb-4">
						<div class="col-3">
							<label for="">Tipo de Via</label>
							<select class="custom-select" id="via" name="via">                
								<option value="1">Calle</option>
								<option value="2">Barrio</option>
								<option value="3">Avenida</option>
							</select>
						</div>

						<div class="col-7">
							<label for="">Nombre</label>
							<input type="text" class="form-control" id="nomCarrer" name="nomCarrer">
						</div>

						<div class="col-2">
							<label for="">Número</label>
							<input type="text" class="form-control" id="numCarrer" name="numCarrer">
						</div>
					</div>

					<div class="form-row mb-4">
						<div class="col-6">
							<label for="">Poblacio</label>
							<input type="text" class="form-control" id="poblacio" name="poblacio">
						</div>
					</div>
					<input type="hidden" name="lat" value="" id="latitude" name="latitude"/>  
					<input type="hidden" name="lng" value="" id="longitude" name="longitude"/>  		
	
					<button class="btn btn-primary" type="submit">Registrar</button>
				</form>
			</div>

			<div class="col-6 pt-5">
				<div id="map">
					div pel mapa que ens trobarà la latitud i la longitud mitjançant una api de google.
				</div>
				<button type="button" class="btn btn-secondary mt-2" id="findLoc">Buscar adreça</button>  
				<button type="button" class="btn btn-success mt-2" id="addressOk">Guardar</button>  
			</div>		
		</div>

	</div>

<script src="./js/mapa.js"></script>
</body>
</html>