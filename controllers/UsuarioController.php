<?php
require_once 'models/usuario.php';

class usuarioController
{

    public function index()
    {
        echo "<h1>viendo en la ruta index de usuario</h1>";
    }
    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
    public function save()
    {
        if (isset($_POST)) {
            $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false;

            if ($nombre && $apellidos && $email && $contrasena) {
                $usuario = new Usuario();
                $usuario->setNombre(ucwords($nombre));
                $usuario->setApellidos(ucwords($apellidos));
                $usuario->setEmail($email);
                $usuario->setContrasena($contrasena);
                $save = $usuario->save();

                if ($save) {
                    $_SESSION['registro'] = "completado";
                } else {
                    $_SESSION['registro'] = "fallido";
                }
            } else {
                $_SESSION['registro'] = "fallido";
            }
        } else {
            $_SESSION['registro'] = "fallido";
        }
        header("Location:" . base_url . "usuario/registro");
    }

    public function login()
    {

        if (isset($_POST)) {

            // identificar al usuario 
            // consulta a la base de datos 
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setContrasena($_POST['contrasena']);

            $identificar = $usuario->login();
           
            if ($identificar && is_object($identificar)) {
              
                $_SESSION['identificar'] = $identificar;
                if ($identificar->rol == "admin") {
                    $_SESSION['admin'] = true;
                   
                }
            } else {
                $_SESSION['error_login'] = 'Error al ingresar, verificar email/contraseña';
            }
        }

        header("Location:" . base_url);
    }

    public function cerrar(){
        if (isset($_SESSION['identificar'])) {
            unset($_SESSION['identificar']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}
