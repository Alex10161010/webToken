<?php
header("Content-Type:application/json");
require_once("../class/class-usuario.php");
require_once('../class/class-token.php');



switch ($_POST['opcion']) {
        // Verificar si existe el usaurio
    case 'validarUsuario':
        $data = null;
        $usuario = Usuario::verificarUsuarios($_POST['email'], $_POST['password']);
        if (is_null($usuario)) {
            $data = array('opc' => 0, 'msj' => 'Usuario o Password Incorrecto.');
        } else {
            $data = array('opc' => 1, 'msj' => 'Usuario autenticado.', 'token' => Auth::SignIn($usuario));
        }
        echo json_encode($data);
        break;

    case 'verificarToken':
        echo json_encode(Auth::GetData($_POST['token']));
        break;

    default:
        echo "Opcion no definida login" . $_POST['opcion'];
        break;
}
