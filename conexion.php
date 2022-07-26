<?php
//definimos una funcion para crear la conexion a la base de datos
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";
//Le pasamos los parametros necesarios para el acceso al BD estos los puedes ver desde su phpMyAdmin
    $bd="farmacia";
//importante pasar el nombre de la BD que vamos a manipular
    $con=mysqli_connect($host,$user,$pass);
//invocamos un metodo de mysql encargado de validar que la informacion anterior este correcta
    mysqli_select_db($con,$bd);
//si todo es correcto ya tendremos acceso a nuestra BD y ya podremos ejecutar comandos desde nuestra web
    return $con;
}
?>