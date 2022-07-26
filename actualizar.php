<?php 
    include("conexion.php");
    $con=conectar();
    
    $sql="SELECT *  FROM cliente";
    $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agregamos el titulo de la pestaña -->
    <title>Home</title>
    <!-- agregamos los estilos individuales para la barra de navegacion -->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- este es un estilo en linea de boostrap que utilizamos para el formulario y el estilos de las tablas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <!-- la etiqueta que va contener todo dentro del body -->
    <div class="container">
        <!-- dividimos la cabezera y asignamos una imagen de fondo -->
        <div class="cabecera">
            <img src="imagenes/fondo.jpeg" alt="fondo">
        </div>
        <!-- Agregamos una pequeña descripcion del negocio al que le estamos creando el CRUD -->
        <div class="post">
        <h1>Bienvenido</h1>
        <p>Bienvenido a la aplicacion web de control, aqui podra actualizar, añadir,
            eliminar o  registrar productos en la base de datos, para tener una mejor organizacion
            espresarial.
        </p>
        </div>
        <!-- este div va a contener los elementos de la barra de navegacion -->
        <div class="navegacion">
            <ul>
                <li><a href="index.php">Crear</a></li>
                <li><a href="leer.php">Leer</a></li>
                <li><a href="actualizar.php">Actualizar</a></li>
                <li><a href="eliminar_cliente.php">Borrar</a></li>
              </ul>
        </div>
        <!-- Creamos la tabla para mostrar los datos -->
            <div class="col-md">
                <table class="table" >  <!-- estos datos son los que iran en la cabecera de la tabla -->
                                        <thead class="table-success table-striped" >
                                            <tr>
                                                <th>id_cliente</th>
                                                <th>nombre</th>
                                                <th>telefono</th>
                                                <th>direccion</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody> <!-- con la siguiente linea de codigo de php creamos un ciclo
                                                    while que va recorrer toda nuestra bd en la tabla cliente
                                                     y nos traera todos los registro que se encuentren en ella -->
                                            <?php
                                                while($row=mysqli_fetch_array($query)){
                                            ?>
                                                <tr>
                                                <th><?php  echo $row['id_cliente']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['telefono']?></th>
                                                <th><?php  echo $row['direccion']?></th>
                                                <!-- añadimos dos botones uno para actualizar y uno para eliminar y le pasamos como parametro el id_cliente -->    
                                                <th><a href="V_actualizar.php?id=<?php echo $row['id_cliente'] ?>" class="btn btn-info">Editar</a></th>
                                                <th></th>                                        
                                            </tr>
                                        <?php 
                                                }
                                        ?>
                                        </tbody>
                </table>
            </div>
    </div>
</body>
</html>