<!DOCTYPE html>
<html lang="es">

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
        <!-- Inicia un contenedor con clases de Bootstrap -->

        <div class="row">
            <!-- Inicia una fila con clases de Bootstrap -->

            <div class="col-md-6">
                <!-- Inicia una columna con ancho "col-md-6" (6 columnas de las 12 disponibles) -->

                <?php
                // Incluye el archivo de configuración
                require_once('../config/config.php');

                // Incluye la clase conexión a la base de datos
                require_once('../libs/Database.php');

                // Incluye la clase "datos" (probablemente contiene métodos para interactuar con la tabla de perfiles)
                require_once('../model/datos.php');

                // Crea una instancia de la clase conexión a la base de datos
                $database = new Database();

                // Obtiene la conexión a la base de datos
                $connection = $database->getConnection();

                // Crea una instancia del modelo "datos" y le pasa la conexión a la base de datos
                $model = new datos($connection);

                // Obtiene todos los perfiles de usuarios (probablemente con la función "mostrar" del modelo)
                $users = $model->mostrar();
                ?>

                <!-- Crea una tabla con estilos de Bootstrap -->
                <table class="table table-hover table-dark mt-5">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellido
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Teléfono
                            </th>
                            <th>
                                Fecha de nacimiento
                            </th>
                            <th>
                                Eliminar
                            </th>
                            <th>
                                Actualizar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera a través de los perfiles de usuarios -->
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <!-- Muestra los datos de cada perfil en una fila de la tabla -->
                                <td>
                                    <?php echo $user['firs_name']; ?>
                                </td>
                                <td>
                                    <?php echo $user['last_name']; ?>
                                </td>
                                <td>
                                    <?php echo $user['email']; ?>
                                </td>
                                <td>
                                    <?php echo $user['phone']; ?>
                                </td>
                                <td>
                                    <?php echo $user['edad']; ?>
                                </td>
                                <td>
                                    <!-- Formulario para eliminar un perfil de usuario -->
                                    <form action="../controller/deleteProfileController.php" method="post">
                                        <input type="hidden" name="identificador" value="<?= $user['id_profiles']; ?>">
                                        <!-- Se envía un identificador oculto del perfil a eliminar -->
                                        <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                                <td>
                                    <!-- Formulario para actualizar/editar un perfil de usuario -->
                                    <form action="../controller/updateProfileController.php" method="post">
                                        <input type="hidden" name="identificador" value="<?= $user['id_profiles']; ?>">
                                        <!-- Se envía un identificador oculto del perfil a actualizar -->
                                        <button type="submit" name="actualizar" class="btn btn-danger">Editar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="">
                <!-- Enlace para volver a la página de creación de perfil (profile.php) con la clase "btn btn-warning" de Bootstrap -->
                <a class="btn btn-warning  mt-4" href="profile.php">Volver</a>
            </div>
        </div>
        <!-- Fin de la fila -->
    </section>
    <!-- Fin del contenedor -->
</body>

</html>
