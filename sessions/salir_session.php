<?php
require_once("../backend/classes/user.class.php");
session_start();
$user = $_SESSION['ingreso'];
$user->logout();
session_unset();
header("Location: ../index.php");
?>