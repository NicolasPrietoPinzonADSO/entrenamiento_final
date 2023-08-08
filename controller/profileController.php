<?php
// Incluimos el archivo de configuración
require_once('../config/config.php');

// Incluimos la clase de conexión a la base de datos
require_once('../libs/Database.php');

// Incluimos la clase "datos" (probablemente contiene métodos para interactuar con la base de datos)
require_once('../model/datos.php');

// Creamos una instancia de la clase "Database" para gestionar la conexión
$database = new Database();

// Obtenemos la conexión a la base de datos llamando al método "getConnection()"
$connection = $database->getConnection();

// Creamos una instancia del modelo "datos" y le pasamos la conexión a la base de datos
$model = new datos($connection);

// Si se ha enviado un formulario con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los valores enviados desde el formulario y los limpiamos de espacios en blanco con "trim()"
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $date_birth = trim($_POST['date_birth']);

    // Obtenemos la fecha y hora actual
    $ahora = new DateTime(date("2023-02-08"));

    // Validamos que el campo "Nombre" no esté vacío
    if (empty($nombre)) {
        $nameError = "El campo 'Nombre' no puede estar vacío.";
    }

    // Validamos que el campo "Apellido" no esté vacío
    if (empty($apellido)) {
        $apellidoError = "El campo 'Apellido' no puede estar vacío.";
    }

    // Validamos que el campo "Email" no esté vacío
    if (empty($email)) {
        $emailError = "El campo 'Email' no puede estar vacío.";
    }

    // Validamos que el campo "Phone" no esté vacío
    if (empty($phone)) {
        $phoneError = "El campo 'Phone' no puede estar vacío.";
    }

    // Validamos que el campo "Fecha de nacimiento" no esté vacío
    if (empty($date_birth)) {
        $dateError = "El campo 'Fecha de nacimiento' no puede estar vacío.";
    }

    // Validamos que la fecha de nacimiento no sea mayor a la fecha actual
    if ($date_birth > $ahora) {
        $dateError = "El campo 'Fecha de nacimiento' no puede ser mayor a la fecha actual.";
    }

    // Si no hay errores en la validación, procedemos con las acciones adicionales
    if (empty($nameError) && empty($apellidoError) && empty($apellidoError) && empty($phoneError) && empty($dateError)) {
        // Mostramos un mensaje de éxito
        $envioCorrecto = "Se enviaron correctamente los datos";

        // Asignamos los valores obtenidos del formulario al modelo "datos"
        $model->setNombre($nombre);
        $model->setApellido($apellido);
        $model->setEmail($email);
        $model->setPhone($phone);
        $model->setFecha($date_birth);

        // Agregamos los datos del perfil a la base de datos llamando al método "addDatosProfile()"
        $model->addDatosProfile();
    }
    // También podría incluirse aquí una redirección a otra página, por ejemplo: include_once '../view/profile.php';
}
?>
