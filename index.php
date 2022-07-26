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
    <link rel="stylesheet" href="estilos/estilos.css" type="text/css">
    <link rel="stylesheet" href="estilos/estilo_drop.css" type="text/css">
    <!-- este es un estilo en linea de boostrap que utilizamos para el formulario y el estilos de las tablas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <img src="imagenes/fondo.jpeg" alt="fondo">
        </div>
        <div class="post">
        <h1>Bienvenido</h1>
        <p>Bienvenido a la aplicacion web de control, aqui podra actualizar, añadir,
            eliminar o  registrar productos en la base de datos, para tener una mejor organizacion
            espresarial.
        </p>
        </div>
        <div class="navegacion">
            <ul>
                <li><a href="index.php">Crear</a></li>
                <li><a href="leer.php">Leer</a></li>
                <li><a href="actualizar.php">Actualizar</a></li>
                <li><a href="eliminar_cliente.php">Borrar</a></li>
              </ul>
        </div>
        <h1>Ingrese datos</h1>   <!-- creamos un formulario, para guardar todos los datos que necesitamos para
                                      Hacer una insercion dentro de la tabla cliente y le pasamos el metodo de recepcion de php _POST -->
                                <form action="insertar_cliente.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="id_cliente" placeholder="identificacion cliente">
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre del cliente">
                                    <input type="text" class="form-control mb-3" name="telefono" placeholder="telefono">
                                    <input type="text" class="form-control mb-3" name="direccion" placeholder="direccion">
                                    <!-- por ultimo añadimos un boton que sera el encargado de hacer que se envien los datos a insertar_cliente.php -->
                                    <input type="submit" class="btn btn-primary">
                                </form><br>
                                <br>
                                <h1>Crear una factura dentro de la BD</h1>   <!-- creamos un formulario, para guardar todos los datos que necesitamos para
                                      Hacer una insercion dentro de la tabla factura y le pasamos el metodo de recepcion de php _POST -->
                                <form action="insertar_factura.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="nit" placeholder="NIT de la factura">
                                    <input type="text" class="form-control mb-3" name="encargado" placeholder="Encargado">
                                    <input type="text" class="form-control mb-3" name="medicamento" placeholder="Medicamento">
                                    <input type="text" class="form-control mb-3" name="precio_venta" placeholder="Precio de la venta">
                                    <style>
                                    </style>
                                    <select name="cliente" class="select-css">
                                    <?php 
                                        $con=conectar();
                                        #consulta de todos los paises
                                        $sql='SELECT * FROM cliente';
                                        $query=mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($query)){
                                        $id_cliente=$row['id_cliente'];
                                        $nombre=$row['nombre'];
                                    ?>
                                        <option value="<?php echo $id_cliente ?>"><?php echo $nombre ?></option>
                                    <?php
                                        }
            
                                    ?>
            
                                    </select></br></br>
                                    <input type="submit" class="btn btn-primary">
                                </form>
        </div>
    </div>
</body>
</html>