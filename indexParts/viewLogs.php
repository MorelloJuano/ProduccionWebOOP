<?php
require_once("../backend/classes/user.class.php");
session_start();


echo "<pre>";
$user = $_SESSION['ingreso'];

$rawLogs = $user->getLogs();
var_dump($rawLogs);




