<?php 
    include("conexion.php");
    $con=conectar();

$id_cliente = $_GET['id'];
$sql="SELECT * FROM cliente WHERE id_cliente='$id_cliente'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>
<!-- en el codigo de arriba primero tenemos que incluir la conexion siempre, 
luego creamos una variable $con que sera la encargada de crearnos la conexion a la bd y
de llevar tambien la sentencia sql para actualizar los datos en la bd donde se coincida con el campo id_cliente -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5"> <!-- Creamos un semi formulario donde se van a cambiar uno datos 
                                                o mas datos de un registro ya creado -->
                    <form action="update.php" method="POST">
                                <!-- para evitarnos conflictos con la base de datos no dejaremos que el usuario pueda cambiar el id
                                    ya que esto nos puede traer problemas de relacionalidad de algunas tablas con otras tablas -->
                                <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'];  ?>">
                                <!-- por otro lado los demas campos si podemos editarlos o dejarlos igual -->
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $row['nombre'];  ?>">
                                <input type="text" class="form-control mb-3" name="telefono" placeholder="telefono" value="<?php echo $row['telefono'];  ?>">
                                <input type="text" class="form-control mb-3" name="direccion" placeholder="direccion" value="<?php echo $row['direccion'];  ?>">
                                <!-- luego de tener estos cambios realizados se los enviamos a update.php por medio del metodo POST como se especifico arriba -->
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>