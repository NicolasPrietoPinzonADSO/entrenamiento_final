<?php
// Incluimos la clase "datos" que probablemente contiene métodos para interactuar con la base de datos
require_once('../model/datos.php');

// Incluimos el archivo de configuración
require_once('../config/config.php');

// Incluimos la clase de conexión a la base de datos
require_once('../libs/Database.php');

// Creamos una instancia de la clase "Database" para gestionar la conexión
$database = new Database();

// Obtenemos la conexión a la base de datos llamando al método "getConnection()"
$connection = $database->getConnection();
$actualizar= "";
// Creamos una instancia del modelo "datos" y le pasamos la conexión a la base de datos
$userModel = new datos($connection);

// Si se ha enviado el formulario con el botón "actualizar" (probablemente desde la página "update.php")
if (isset($_POST['actualizar'])) {
    // Obtenemos el dato del identificador del formulario enviado por POST
    $dato = $_POST['identificador'];

    // Asignamos el identificador al modelo "datos" mediante el método "setId()"
    $userModel->setId($dato);

    // Llamamos al método "mostrar()" del modelo "datos" para obtener la información del usuario correspondiente al identificador
    // No se hace nada con el resultado devuelto por "mostrar()" en esta sección del código
    $actualizar = $userModel->mostrarUpdate();
    require_once('../view/update.php');
}

// Incluimos la vista "update.php" para mostrar el formulario de actualización

// Si se ha enviado el formulario de actualización con el botón "envio_edit"
if (isset($_POST['envio_edit'])) {
    
    // Obtenemos los valores del formulario enviados por POST
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $edad = $_POST['date_birth'];
    $id = $_POST["identificador"];



    // Pasamos los datos a los métodos del modelo "datos" para actualizar el perfil del usuario
    $userModel->setId($id);
    $userModel->setNombre($nombre);
    $userModel->setApellido($apellido);
    $userModel->setEmail($email);
    $userModel->setPhone($phone);
    $userModel->setFecha($edad);

    // Llamamos al método "actualizarUsuario()" del modelo "datos" para actualizar los datos en la base de datos
    // Después de la actualización, se redirige a la página "listar.php"
    $userModel->actualizarUsuario();
    require_once('../view/listar.php');

}else{
    require_once('../view/update.php');
}



?>
