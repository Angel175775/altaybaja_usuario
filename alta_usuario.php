<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validación de Formulario con JS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            .miami{
                text-align: center;
                background-color: grey;
                padding-left: 35%;
                padding-right: 35%;

            }
        </style>
</head>

<body class="bg-body-secondary">
<h3>Añade un nuevo Usuario</h3>
<?php
require('conexion.php');

//si el formulario a sido enviado, procesa los datos del formulario
$apenom = $_POST['usu_apenom'] ?? null;
$email = $_POST['usu_email'] ?? null;
$usuario = $_POST['usu_usuario'] ?? null;
$apenom = $_POST['usu_email'] ?? null;

if(isset($apenom) && isset($email) && isset($usuario) && isset($apenom)){
    //abre bloque de mensajes
    echo '<div id="message" class="alert alert-danger">';

        $inputError=false;
        //recupera y verifica los valores del usuario
        //nombre de apenombre
        if (empty($_POST["usu_apenom"])) {
            echo 'ERROR : Por favor ingrese un apellido y nombre válidos';
            $inputError = true;
        } else {
            $apenom = $conexionDB->escape_string($_POST['usu_apenom']);
        }

        //nombre de email
        if ($inputError != true && empty($_POST["usu_email"])) {
            echo 'ERROR : Por favor ingrese un email válido';
            $inputError = true;
        }
        else{
            $email = $conexionDB->escape_string($_POST['usu_email']);
        }
        //nombre de usuario
        if ($inputError != true && empty($_POST["usu_usuario"])) {
            echo 'ERROR : Por favor ingrese un usuario válido';
            $inputError = true;
        }
        else{
            $usuario = $conexionDB->escape_string($_POST['usu_usuario']);
        }
        //Contraseña
        if ($inputError != true && empty($_POST['usu_clave'])){
            echo "ERROR : Por favor ingrese una clave válida";
            $inputError = true;
            }
        else{
            $clave=$conexionDB->escape_string($_POST["usu_clave"]);
        }

        //añade valores a la base de datos utilizando el consulta INSERT
        if($inputError != true) {
                $sql = "INSERT INTO usuarios (apenom,email,usuario,clave) VALUES ('$apenom', '$email', '$usuario','$clave')";

                if ($conexionDB->query($sql)===true) {
                echo 'Nuevo registo de usuario añadido con ID : '.$conexionDB->insert_id;
                    }
                else 
                    {echo "ERROR : No fue posible ejecutar el consulta : $sql. ". $conexionDB->error;}
        }

    //cierra conexion
    echo '</div>';
}
     
echo "<h3>Obtiene registros y da formato en una tabla HTML</h3>";
        $instruccionSql = "SELECT id_usuario, apenom, email, usuario, clave FROM usuarios";
        if($resultado = $conexionDB-> query($instruccionSql)){
            
            if ($resultado->num_rows > 0) 
            {
            echo '<table class="table">';   
            echo '<thead class="table table-dark table-striped-columns">';     
            echo "<tr>";
                echo "<td>id_usuario</td>";
                echo "<td>apenom</td>";
                echo "<td>email</td>";
                echo "<td>usuario</td>";
                echo "<td>clave</td>";
                echo "</tr>";
            echo '</thead>';
                while($fila = $resultado->fetch_object()){
               
                        echo "<tr>";
                        echo "<td>".$fila->id_usuario."</td>";
                        echo "<td>".$fila->apenom."</td>";
                        echo "<td>".$fila->email."</td>";
                        echo "<td>".$fila->usuario."</td>";
                        echo "<td>".$fila->clave."</td>";  
   
                    }
             
                    
            echo '</table>';
            $resultado->close();
            }   
            else{
                echo "No hay Usuarios registrados en la base de datos";
            }
        }
        else{
            echo "ERROR:No fue posible ejecutar la consulta:$instruccionSql.".$conexionDB->error;
        }
           $conexionDB->close();
    
        
?>

<a href="busq_mod_elim.php">hola</a>
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