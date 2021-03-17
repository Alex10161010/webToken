<?php
/*
La mejor forma de encriptar contraseñas | Curso PHP y MySQL #56
    https://www.youtube.com/watch?v=mYDzEjQsVtk
*/

$password = 'PU*6o0!FPub#';
$password2 = "!79^hmROyc&h";

$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
echo $hash . "<br>";
if (password_verify($password, $hash)) {
    echo 'El password es correcto';
}
