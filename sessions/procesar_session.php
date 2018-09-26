<?php
require_once ('../backend/classes/user.class.php');
require_once('../backend/classes/data.class.php');

$inputUser = $_POST['usuario'];
$inputPassword = $_POST['contraseña'];

var_dump(User::userLogin($inputUser, $inputPassword));


