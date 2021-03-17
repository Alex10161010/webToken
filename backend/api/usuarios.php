<?php
header("Content-Type:application/json");
include_once("../class/class-usuario.php");


switch ($_POST['opcion']) {
        /* Guardar */
    case 'save':
        # code...
        break;

        /* Obtener */
    case 'getUsuario':
        $data = null;
        if (isset($_POST['id'])) {
            $data = Usuario::getByIdUsuario($_POST['id']);
        } else {
            $data = Usuario::getAllUsuarios();
        }
        echo json_encode($data);
        break;

        /* Actualizar */
    case 'PUT':
        # code...
        break;

        /* Eliminar */
    case 'DELETE':
        # code...
        break;

    default:
        # code...
        break;
}
