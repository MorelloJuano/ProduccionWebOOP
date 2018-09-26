<?php
require_once('../backend/classes/user.class.php');
require_once('../backend/classes/data.class.php');

$inputUser = $_POST['usuario'];
$inputPassword = $_POST['contraseña'];

$checkLogin = User::userLogin($inputUser, $inputPassword);

if(gettype($checkLogin) == "object"){
    echo "loguear";
} else if($checkLogin == "wrongPassword"){
    echo $checkLogin;
} else{
    echo $checkLogin;
}