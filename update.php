<?php
//siempre tenemos incluir la conexion, si no la hacemos nunca tendremos acceso a la BD
include("conexion.php");
$con=conectar();
//declaramos unas variables nuevas, en este caso para usos practicos les pondremos el mismo nombre
//que los campos a los cuales vamos a fectar en la tabla cliente.
$id_cliente=$_POST['id_cliente'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
//Creamos la sentencia SQL para actualizar los campos que hayan sido modificados en el anterior formulario
//con $query hacemos la validacion de la conexion y de la sentencia.
$sql="UPDATE cliente SET  nombre='$nombre',telefono='$telefono',direccion='$direccion' WHERE id_cliente='$id_cliente'";
$query=mysqli_query($con,$sql);
//si todo lo anterior esta bien escrito, nos devolveremos a la ventana leer.php y veremos los cambios 
//realizados 
    if($query){
        Header("Location: leer.php");
    }
?>
