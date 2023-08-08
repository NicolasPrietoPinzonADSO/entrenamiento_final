<?php
// Incluimos el archivo de configuración
require_once('../config/config.php');

// Incluimos la clase conexión a la base de datos
require_once('../libs/Database.php');

// Incluimos la clase "datos" (probablemente contiene métodos para interactuar con la tabla de perfiles)
require_once('../model/datos.php');

// Creamos una instancia de la clase conexión a la base de datos
$database = new Database();

// Obtenemos la conexión a la base de datos llamando al método "getConnection()"
$connection = $database->getConnection();

// Creamos una instancia del modelo "datos" y le pasamos la conexión a la base de datos
$model = new datos($connection);

// Variables para mostrar mensajes de éxito o error
$envioCorrecto = $userError = $passwordError = "";

// Comprobamos si se envió una solicitud POST (se envió el formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los valores de usuario y contraseña enviados desde el formulario
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);

    // Validamos que el campo "Nombre usuario" no esté vacío
    if (empty($user)) {
        $userError = "El campo 'Nombre usuario' no puede estar vacío.";
    }

    // Validamos que el campo "Contraseña" no esté vacío
    if (empty($password)) {
        $passwordError = "El campo 'Contraseña' no puede estar vacío.";
    }

    // Si no hay errores en la validación, procedemos con las acciones adicionales
    if (empty($userError) && empty($passwordError)) {
        // Mostramos un mensaje de éxito
        $envioCorrecto = "Se enviaron correctamente los datos";

        // Generamos un token aleatorio de 16 bytes en formato hexadecimal
        $token = bin2hex(random_bytes(16));

        // Asignamos los valores de usuario, token y contraseña a la instancia del modelo "datos"
        $model->setUsername($user);
        $model->setToken($token);
        $model->setPassword($password);

        // Agregamos los datos de usuario a la base de datos llamando al método "addDatosUser()"
        $model->addDatosUser();
    }
    // También podría incluirse aquí una redirección a otra página, por ejemplo: include_once '../view/user.php';
}
?>
