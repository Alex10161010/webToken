<?php
class Usuario
{
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $genero;
    private $edad;
    private static $archivo;

    //constructor
    function __construct()
    {
        $this->archivo = file_get_contents('../data/usuarios.json');
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getEdad()
    {
        return $this->edad;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function crearUsuario()
    {
        return null;
    }

    public static function getAllUsuarios()
    {
        $usuarios = json_decode(self::$archivo, true);
        return json_decode($usuarios, true);
    }
    public static function getByIdUsuario($id)
    {
        $usuarios = json_decode(self::$archivo, true);
        foreach ($usuarios  as $user) {
            if ($user["id"] == $id) {
                return $user;
            }
        }
        return null;
    }

    public static function deleteUsuario()
    {
        return null;
    }
    public static function updateUsuario()
    {
        return null;
    }

    public static function verificarUsuarios($email, $pass)
    {
        $archivoUsuario = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($archivoUsuario, true);
        foreach ($usuarios  as $user) {
            if ($user["email"] == $email && password_verify($pass, $user["password"])) {
                return array(
                    'nombre' => $user["nombre"],
                    'apellido' => $user["apellido"],
                    'rol' => $user["rol"]
                );
            }
        }
        return null;
    }
}
