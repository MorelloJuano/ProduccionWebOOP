<?php session_start();
require_once('../backend/classes/user.class.php');
require_once('../backend/classes/data.class.php');

$inputUser = $_POST['usuario'];
$inputPassword = $_POST['contraseña'];
$checklogin = User::userLogin($inputUser,$inputPassword);

if(gettype($checklogin) == "object"){

    $_SESSION['ingreso'] = $checklogin;
    header("Location: ../index.php");

}else if($checklogin == "wrongPassword"){
    header("Location: ../index.php?error=wrongPassword");
}else{
    header("Location: ../index.php?error=noFoundUser");
}
