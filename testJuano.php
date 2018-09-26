<?php
require_once('backend/classes/user.class.php');
require_once('backend/classes/data.class.php');
require_once('config.php');



echo '<pre>';
var_dump(User::userLogin('Juano', 'testeo'));

echo $rootPath;
echo '</pre>';
