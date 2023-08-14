<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="alta_usuario.php" method="POST" class="miami">
        <h5 style="text-align : center">Datos del Usuario</h5>
        <table>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>Id Usuario</td>     
                    <td>
                        <input type="text" name="nIdUsuario" id="iIdUsuario" value=""> 
                    </td>
                    </tr>
                    <tr>
                    <td>Apellido y nombre</td>
                    <td><input type="text" name="nApenom" id="idApenom" value=""> </td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="nEmail" id="IdEmail" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="nBuscar" id="idBuscar" value="Buscar" style="width:100%">
                            <input type="submit" name="nModificar" id="idModificar" value="Modificar" style="width:100%">
                            <input type="submit" name="nEliminar" id="idEliminar" value="Eliminar" style="width:100%">
                        </td>
                    </tr>
        </table>
              </form>
    
<?php

require('conexion.php');
if (isset($_GET['nBuscar'])) 
{
    $idUsuario = $_GET["nIdUsuario"];
    $instruccionSql="SELECT id_usuario, apenom, email FROM usuarios WHERE id_usuario = '$idUsuario'";
    $resultado = $conexionDB->query($instruccionSql);
    if ($resultado->num_rows > 0) 
    {
        echo "Usuario Encontrado!! </br>";
        echo "</br>";
        while($fila = $resultado->fetch_object())
            {
                echo "IdUsuario : ".$fila->id_usuario."</br>";
                echo "Apellido y Nombre : ".$fila->apenom."</br>";
                echo "E-mail : ".$fila->email."</br>";
            }
    }
    else{
        echo "Usuario No encontrado !!.</br>";
    }
       
}
else
    {
        if(isset($_GET['nModificar']))
        {
            $idUsuario=$_GET['nIdUsuario'];
            $instruccionSql = "SELECT id_usuario, apenom, email FROM usuarios WHERE  id_usuario = '$idUsuario'";
            $resultado=$conexionDB->query($instruccionSql);
            if ($resultado ->num_rows > 0 ) 
            {
                echo "Usuario Encontrado </br>";
                echo "</br>";
                $apenom = $_GET["nApenom"];
                $email = $_GET["nEmail"];
                $instruccionSql = "UPDATE usuarios SET apenom='$apenom', email ='$email' WHERE id_usuario='$idUsuario' ";
                $resultado=$conexionDB->query($instruccionSql);
                if ($resultado) 
                {
                    echo "Datos Actualizados con Exito !!";
                }
                else
                       echo "Los datos no fueron Actualizados";
                    
            }
        }
        else
            {
                    if (isset($_GET["nEliminar"])) 
                    {
                        $idUsuario=$_GET["nIdUsuario"];
                        $instruccionSql="SELECT id_usuario, apenom, email FROM usuarios WHERE id_usuario='$idUsuario' ";
                        $resultado=$conexionDB->query($instruccionSql);
                        if ($resultado->num_rows > 0 ) 
                            {
                            echo "Usuario Encontrado!! </br>";
                            echo "</br>";
                          $instruccionSql="DELETE FROM usuarios WHERE id_usuario = '$idUsuario' ";
                          $resultado = $conexionDB->query($instruccionSql);
                            if ($resultado) 
                            {echo "Usuario eliminado con Exito";}
                            else echo "No se pudo borrar el Usuario";  
                            }
                        else
                            echo "Usuario no encontrado !!</br>";
                    }
            }
    }

?>
<a href="alta_usuario.php">hola</a>
</body>
</html>