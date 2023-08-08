<?php

class datos
{
    // Propiedades de la clase
    protected $db;
    private $id;
    private $username;
    private $token;
    private $password;
    private $nombre;
    private $apellido;
    private $email;
    private $phone;
    private $fecha_nacimiento;

    // Constructor de la clase
    public function __construct(PDO $connection)
    {
        // Asigna la conexión a la base de datos a la propiedad $db
        $this->db = $connection;
    }

    // Métodos para establecer los valores de las propiedades (setters)
    function setUsername($username)
    {
        $this->username = $username;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setToken($token)
    {
        $this->token = $token;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setFecha($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    // Métodos para obtener los valores de las propiedades (getters)
    function getToken()
    {
        return $this->token;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getFecha()
    {
        return $this->fecha_nacimiento;
    }

    function getId()
    {
        return $this->id;
    }

    // Método para mostrar un mensaje de error
    function mostrarError()
    {
        echo "<span class='text-danger'> Ingresa </span>";
    }

    // Método para mostrar todos los perfiles (probablemente para listarlos en una tabla)
    function mostrarUpdate()
    {
        $stm = $this->db->prepare("SELECT * FROM profiles WHERE id_profiles = :id");
        $stm->bindValue(':id', $this->id);
        $stm->execute();
        return $stm->fetch();
    }

    // Método para mostrar todos los perfiles con información adicional de edad
    function mostrar()
    {
        $stm = $this->db->prepare("SELECT id_profiles, firs_name, last_name, email, phone, date_birth, FLOOR(DATEDIFF(CURDATE(), date_birth) / 365) + CASE WHEN MOD(DATEDIFF(CURDATE(), date_birth), 365) = 0 THEN 1 ELSE 0 END AS edad FROM profiles; ");
        $stm->execute();
        return $stm->fetchAll();
    }

    // Método para agregar datos de usuario a la tabla "users"
    function addDatosUser()
    {
        $stm = $this->db->prepare("INSERT INTO users (username, token, password) VALUES (:user, :token, :password)");
        $stm->bindValue(':user', $this->username);
        $stm->bindValue(':token', $this->token);
        $stm->bindValue(':password', $this->password);
        $stm->execute();
        return $stm->fetchAll();
    }

    // Método para agregar datos de perfil a la tabla "profiles"
    function addDatosProfile()
    {
        $stm = $this->db->prepare("INSERT INTO profiles (firs_name, last_name, email, phone, date_birth, id_users_fk) values (:nom, :apellido, :email, :phone, :date_birth, :id_user)");
        $stm->bindValue(':nom', $this->nombre);
        $stm->bindValue(':apellido', $this->apellido);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':phone', $this->phone);
        $stm->bindValue(':date_birth', $this->fecha_nacimiento);
        $stm->bindValue(':id_user', 1); // Valor fijo para id_users_fk, probablemente una clave foránea que indica el usuario relacionado
        $stm->execute();
        return $stm->fetchAll();
    }

    // Método para eliminar un perfil de usuario por su ID
    function deleteUsuario($id)
    {
        $consulta = $this->db->prepare("DELETE FROM profiles WHERE id_profiles = :id");
        $consulta->bindValue(":id", $id);
        $consulta->execute();
    }

    // Método para actualizar los datos de un perfil de usuario
        function actualizarUsuario()
        {
            $stm = $this->db->prepare('UPDATE profiles SET firs_name = :nom , last_name = :apellido, email= :email, phone = :phone , date_birth = :date_birth WHERE id_profiles = :id');
            $stm->bindValue(':nom', $this->nombre);
            $stm->bindValue(':apellido', $this->apellido);
            $stm->bindValue(':email', $this->email);
            $stm->bindValue(':phone', $this->phone);
            $stm->bindValue(':date_birth', $this->fecha_nacimiento);
            $stm->bindValue(':id', $this->id);
            $stm->execute();
            // header('Location:../view/listar.php');
        }
    }

?>
