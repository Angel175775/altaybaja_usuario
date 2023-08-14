<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validación de Formulario con JS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-body-secondary">

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-6">  
                <h1 class="text-center">Formulario</h1>
                <p class="text-center text-body-secondary fst-italic">Formulario centrado de forma vertical y horizontal</p>

                <div class="card">
                    <div class="card-body">
                        <form id="form" action="alta_usuario.php" method="post" >
                            <label for="full-name">Nombre y Apellido completo: </label>
                            <input type="text" id="full-name"  name="usu_apenom" class="form-control">
                            <div id="full-name-validation" class="form-text text-danger"></div>

                            <label for="email" class="form-label">Correo electrónico: </label>
                            <input type="email" id="email" name="usu_email" class="form-control">
                            <div id="email-validation" class="form-text text-danger"></div>

                            <label for="full-usuario">Usuario </label>
                            <input type="text" id="full-usuario" name="usu_usuario" class="form-control">
                            <div id="full-usu-validation" class="form-text text-danger"></div>


                            <label for="password" class="form-label">Contraseña: </label>
                            <input type="password" id="password"
                            name="usu_clave" class="form-control">
                            <div id="password-validation" class="form-text text-danger"></div>

                            <button type="submit" class="btn btn-success text-uppercase mt-3">Registrarme</button>
                        </form>
                       
                    </div>
                </div>
  
                
            </div>
        </div>
    </div>

   
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
      <!--<script src="main.js"></script>--> 
    
</body>

</html>