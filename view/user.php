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

                            <?php require_once('../controller/userController.php'); ?>
                            <!-- Incluye el controlador de usuario (probablemente contiene la lógica de validación del formulario) -->

                            <form action="" method="post">
                                <!-- Inicia un formulario con método POST y acción vacía (actualizará la misma página) -->

                                <div>
                                    <!-- Espacio para mostrar mensajes de éxito o error -->
                                    <?php if (!empty($envioCorrecto)) { ?>
                                        <span class="text-success">
                                            <?php echo $envioCorrecto; ?>
                                            <!-- Muestra el mensaje de éxito si la variable $envioCorrecto no está vacía -->
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar el nombre de usuario -->
                                    <label>Nombre usuario</label>
                                    <input type="text" class="form-control mt-2 w-75" name="user"
                                        value="<?php echo isset($user) ? $user : ''; ?>">
                                    <!-- Se muestra el valor previo del campo "user" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($userError)) { ?>
                                        <span class="text-danger">
                                            <?php echo $userError; ?>
                                            <!-- Muestra el mensaje de error si la variable $userError no está vacía -->
                                        </span>
                                    <?php } ?>
                                </div>

                                <div>
                                    <!-- Campo para ingresar la contraseña -->
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control mt-2 w-75" name="password"
                                        value="<?php echo isset($password) ? $password : ''; ?>">
                                    <!-- Se muestra el valor previo del campo "password" si está disponible (probablemente para retenerlo después de enviar el formulario) -->

                                    <?php if (!empty($passwordError)) { ?>
                                        <span class="text-danger">
                                            <?php echo $passwordError; ?>
                                            <!-- Muestra el mensaje de error si la variable $passwordError no está vacía -->
                                        </span>
                                    <?php } ?>
                                </div>

                                <!-- Botón para enviar el formulario con la clase "btn btn-primary" de Bootstrap -->
                                <input type="submit" value="Enviar" id="enviar" name="enviar"
                                    class="btn btn-primary mt-4 w-100">
                            </form>
                            <!-- Fin del formulario -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin de la sección principal del contenido -->
    </main>
</body>

</html>
