<?php 
      /* INCLUIMOS FICHEROS QUE UTILIZAREMOS */
      include_once("../models/conexion.php");
      include_once("../models/consultas.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="http://localhost/TiendaPHP-Ajax/css/style.css">
    <title>Area Privada</title>
</head>
<body>

    <div class="container login mt-5 d-flex justify-content-center">

        <form class="bg-white p-5 m-5 w-50">
            <h3 class="text-center" style="letter-spacing: 3px;">LOGIN</h3>

            <div class="form-group">
              <label for="exampleInputEmail1">User</label>
              <input type="text" class="form-control" name="userRegister" id="userRegister" placeholder="usuario" required>
              <small id="emailHelp" class="form-text text-muted">ingresa tu usuario.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="passRegister" id="passRegister" placeholder="contraseña" required>
              <small id="emailHelp" class="form-text text-muted">ingresa tu contraseña.</small>
            </div>

            <!-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="recuerdame" id="recuerdame" value = "si">
              <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
            </div> -->

            <div class="form-group">
              <!-- VALIDACION DE USUARIO SI NO ESTABLECE EL USER Y EL PASSWORD CORRECTO MUESTRA MENSAJE -->
              <div class="contenedorAlertas"></div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 p-3 btn-login">Entrar</button>
        </form>
   
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="../js/custom.js"></script>

 
</body>
<!-- </html> -->

