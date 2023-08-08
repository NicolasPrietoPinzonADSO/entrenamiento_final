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

// Si se ha enviado un formulario con el botón "eliminar" (probablemente desde la página "listar.php")
if(isset($_POST['eliminar'])){
    // Obtenemos el dato del identificador del formulario enviado por POST
    $dato = $_POST['identificador'];
    
    // Imprimimos el valor del identificador (probablemente para depuración)
    print_r($dato);
    
    // Llamamos al método "deleteUsuario()" del modelo "datos" para eliminar el usuario de la base de datos
    $model->deleteUsuario($dato);

    // Redireccionamos a la página "listar.php" después de eliminar el usuario
    header('Location: ../view/listar.php');
}
?>
