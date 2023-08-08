<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Encabezado del documento con metadatos y título -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluye el archivo CSS de Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Cuerpo del documento -->
    <main>
        <!-- Etiqueta para marcar el inicio de la sección principal del contenido -->
        <section class="container ">
            <!-- Inicia un contenedor con clases de Bootstrap para centrar el contenido -->
            <div class="row justify-content-center mt-4">
                <!-- Inicia una fila con clases de Bootstrap para alinear el contenido al centro -->

                <div class="col-6">
                    <!-- Inicia una columna con ancho "col-6" (6 columnas de las 12 disponibles) -->

                    <div class="card">
                        <!-- Inicia una tarjeta con estilo de Bootstrap -->

                        <div class="card-header bg-primary">
                            <!-- Encabezado de la tarjeta con fondo azul (bg-primary) -->
                            <h1 class="card-title text-center text-white">Registro Usuario</h1>
                            <!-- Título del formulario con texto centrado y color blanco -->
                        </div>

                        <div class="card-body">
                            <!-- Cuerpo de la tarjeta -->

                            <?php require_once('../controller/profileController.php'); ?>
                            <!-- Incluye el controlador de perfil de usuario (probablemente contiene la lógica de validación del formulario) -->

                            <form action="" method="post">
                                <!-- Inicia un formulario con método POST y acción vacía (actualizará la misma página) -->

                                <?php if (!empty($envioCorrecto)) { ?>
                                    <!-- Si la variable $envioCorrecto no está vacía, muestra un mensaje de éxito -->
                                    <span class="text-success">
                                        <?php echo $envioCorrecto; ?>
                                    </span>
                                <?php } ?>

                                <div>
                                    <!-- Campo para ingresar el nombre -->
                                    <label>Nombre </label>
                                    <input type="text" class="form-control mt-2 w-75" name="nombre">
                                    <!-- Se muestra el valor previo del campo "nombre" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($nameError)) { ?>
                                        <!-- Si la variable $nameError no está vacía, muestra un mensaje de error -->
                                        <span class="text-danger">
                                            <?php echo $nameError; ?>
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar el apellido -->
                                    <label>Apellido</label>
                                    <input type="text" class="form-control mt-2 w-75" name="apellido">
                                    <!-- Se muestra el valor previo del campo "apellido" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($apellidoError)) { ?>
                                        <!-- Si la variable $apellidoError no está vacía, muestra un mensaje de error -->
                                        <span class="text-danger">
                                            <?php echo $apellidoError; ?>
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar el correo electrónico -->
                                    <label>Email</label>
                                    <input type="text" class="form-control mt-2 w-75" name="email">
                                    <!-- Se muestra el valor previo del campo "email" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($emailError)) { ?>
                                        <!-- Si la variable $emailError no está vacía, muestra un mensaje de error -->
                                        <span class="text-danger">
                                            <?php echo $emailError; ?>
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar el teléfono -->
                                    <label>Phone</label>
                                    <input type="text" class="form-control mt-2 w-75" name="phone">
                                    <!-- Se muestra el valor previo del campo "phone" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($phoneError)) { ?>
                                        <!-- Si la variable $phoneError no está vacía, muestra un mensaje de error -->
                                        <span class="text-danger">
                                            <?php echo $phoneError; ?>
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar la fecha de nacimiento -->
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" class="form-control mt-2 w-75" name="date_birth">
                                    <!-- Se muestra el valor previo del campo "date_birth" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($dateError)) { ?>
                                        <!-- Si la variable $dateError no está vacía, muestra un mensaje de error -->
                                        <span class="text-danger">
                                            <?php echo $dateError; ?>
                                        </span>
                                    <?php } ?>
                                </div>

                                <!-- Botón para enviar el formulario con la clase "btn btn-primary" de Bootstrap -->
                                <input type="submit" value="Enviar" id="enviar" name="enviar"
                                    class="btn btn-primary mt-4 w-100">
                            </form>
                            <!-- Fin del formulario -->

                            <div>
                                <!-- Enlace para listar perfiles de usuario con la clase "btn btn-warning" de Bootstrap -->
                                <a class="btn btn-warning w-100 mt-4" href="listar.php">Listar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin de la sección principal del contenido -->
    </main>
</body>

</html>
