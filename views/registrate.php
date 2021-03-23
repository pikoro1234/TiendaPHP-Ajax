<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="http://localhost/TiendaPHP-Ajax/css/style.css">
    <title>Registrate</title>
</head>
<body>

    <div class="container registrate m-auto d-flex justify-content-center w-100">

        <form action="http://localhost/TiendaPHP-Ajax/controllers/registro.php" class="bg-white p-5 w-50 mt-5 mb-5" method="POST">
            <h3 class="text-center" style="letter-spacing: 3px;">REGISTRATE</h3>

            <div class="form-group">
              <label for="exampleInputEmail1">User</label>
              <input type="text" class="form-control" name="user" id="user" placeholder="usuario" required>
              <small id="emailHelp" class="form-text text-muted">crea tu usuario.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
              <small id="emailHelp" class="form-text text-muted">crea tu contraseña.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre completo" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="telefono" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Addess</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="direccion completa">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="ciudad">
            </div>

            <!--<div class="form-group">
                <label for="exampleFormControlFile1">Subir foto perfil</label>
                <input type="file" class="form-control-file" name="fotoperfil" id="fotoperfil">
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="check" id="check">
              <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
            </div>-->
            <button type="submit" class="btn btn-primary w-100 p-3">Guardar</button>
        </form>
   
    </div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>