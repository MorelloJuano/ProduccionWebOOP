<?php session_start();
require_once('../backend/classes/user.class.php');
require_once('../backend/classes/data.class.php');

$inputUser = $_POST['usuario'];
$inputPassword = $_POST['contraseña'];
$checklogin - User::userLogin($inputUser,$inputPassword);

if(gettype($checklogin) == "object"){

    $_SESSION['ingreso'] = "object";
    header("Location: /index.php");

}else if($checklogin == "wrongPassword"){
    echo "error1";
    header("Location: ../index.php");
}else{
    echo "error2";
    header("Location: ../index.php");
}
