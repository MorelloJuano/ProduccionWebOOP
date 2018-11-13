<?php
require_once('backend/classes/database.class.php');
require_once('backend/classes/user.class.php');

$userTest = new User("testeo0", "3d9dfa242e13cf43b2196354637413b731de9fd0e58d2108d6e79e0efe711296", "1cd2a3fa25e313d2ea70ddb4af4668dd2d6e6ea90561be8035def315c93ff10e");

$dba = new DBA();
echo "<pre>";
$dba->insertUserLogs($userTest, "LOGIN");
















//User::userSignUp("testeo1", "testeo123");