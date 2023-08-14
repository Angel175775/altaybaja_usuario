<?php
try {
    $conexionDB= new mysqli("localhost","root","","agenda");
    if($conexionDB -> connect_error)
        {
            die("Ocurrio un error al conectar la base de datos!");
        }
        else{
            echo "Conexion exitosa Vamos!";
        }
    }
catch(Exception $ex)
    {
        die("Ocurrio un error al conectarse a la base de datos!".$ex->getMessage()); 
    }
?>