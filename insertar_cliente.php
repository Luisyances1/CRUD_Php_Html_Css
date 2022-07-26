<?php
include("conexion.php");
$con=conectar();
//del formulario que tenemos en el index.php recojemos lo que se encuentra dentro de los input
//con el metodo post y lo metemos a una nuevas variables(recomendable que sean del mismo nombre que los campos de la tabla en la BD)
$id_cliente=$_POST['id_cliente'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

//creamos la sentencia SQL para la insercion de datos y le pasamos las variables que acabamos de crear
$sql="INSERT INTO cliente VALUES('$id_cliente','$nombre','$telefono','$direccion')";
$query= mysqli_query($con,$sql);
//validamos todo con $query=mysqli_query($con,$sql)
//y si todo esta correcto volveremos al formulario para agregar nuevos clientes
//si queremos ver los datos insertados debemos ir a la navegacion en la pestaña leer
if($query){
    Header("Location: index.php");
    
}else {
}
?>