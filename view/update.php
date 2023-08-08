<?php
// Incluimos el fichero de configuración
require_once('../config/config.php');

// Incluimos la clase conexión a la base de datos
require_once('../libs/Database.php');

// Incluimos la clase Usuario (probablemente se refiere a la tabla "datos")
require_once('../model/datos.php');

// Creamos la instancia de la clase conexión a la base de datos
$database = new Database();

// Llamamos al método "getConnection" que nos retorna la conexión a la base de datos
$connection = $database->getConnection();

// Creamos la instancia del modelo "datos" y pasamos la conexión a la base de datos
$model = new datos($connection);

// Obtenemos los datos para mostrarlos en la vista de actualización (probablemente corresponda a los datos de un perfil)
// $actualizar = $model->mostrarUpdate();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Encabezado del documento con metadatos y título -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Incluye el archivo CSS de Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Cuerpo del documento -->
    <section class="container">
        <!-- Inicia un contenedor con clases de Bootstrap para centrar el contenido -->
        <div class="row justify-content-center">
            <!-- Inicia una fila con clases de Bootstrap para alinear el contenido al centro -->
            <div class="col-md-6">
                <!-- Inicia una columna con ancho medio (col-md-6) -->
                <div class="card mt-4">
                    <!-- Inicia una tarjeta con margen superior (mt-4) -->
                    <div class="card-header">
                        <!-- Encabezado de la tarjeta -->
                        <h1>Actualizar datos</h1>
                    </div>
                    <div class="card-body">
                        <!-- Cuerpo de la tarjeta -->


                        <!-- Inicia un formulario con método POST y acción vacía (actualizará la misma página) -->
                        <form action="../controller/updateProfileController.php" method="POST">
                            
                            <?php 
                            // var_dump($actualizar);
                        
                            // foreach ($actualizar as $key) { ?>
                                <!-- Iteración a través del arreglo $actualizar -->

                                <!-- Se muestra un campo oculto (hidden) para almacenar el identificador -->
                                <input class="form-control" type="hidden" name="id" value="<?= $actualizar['id_profiles']; ?>">

                                <!-- Se muestra un campo para editar el nombre -->
                                <label for="" class="form-label mb-2">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="<?= $actualizar['firs_name'] ?>">

                                <!-- Se muestra un campo para editar el apellido -->
                                <label for="" class="form-label">Apellido</label>
                                <input class="form-control" type="text" name="apellido" value="<?= $actualizar['last_name'] ?>">

                                <!-- Se muestra un campo para editar el correo electrónico -->
                                <label for="" class="form-label">Email</label>
                                <input class="form-control" type="text" name="email" value="<?= $actualizar['email'] ?>">

                                <!-- Se muestra un campo para editar el teléfono -->
                                <label for="" class="form-label">Telefono</label>
                                <input class="form-control" type="text" name="phone" value="<?= $actualizar['phone'] ?>">

                                <!-- Se muestra un campo para editar la fecha de nacimiento -->
                                <label for="" class="form-label">Fecha de nacimiento</label>
                                <input class="form-control" type="date" name="date_birth" value="<?= $actualizar['date_birth'] ?>"> 

                                <!-- Se muestra un botón para enviar el formulario con la clase "btn btn-warning" de Bootstrap -->
                                <div class="mt-4 mb-4">
                                <input type="hidden" name="identificador" value="<?= $actualizar['id_profiles']; ?>">
                                    <input type="submit" name="envio_edit" class="btn btn-warning w-100">
                                </div>
                            <?php #} ?>
                            <!-- Fin del bucle foreach -->

                        </form>
                        <!-- Fin del formulario -->

                        <!-- Enlace para volver a la página de listar, con la clase "btn btn-dark" de Bootstrap -->
                        <div class="text-center mt-2">
                            <a href="../view/listar.php" class="btn btn-dark text-white w-100">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
