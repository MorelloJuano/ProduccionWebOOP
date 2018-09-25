<?php
require_once('backend/classes/user.class.php');
require_once('backend/classes/data.class.php');


//echo User::userLogin('Juano', 'testeo');
echo '<pre>';
//var_dump(JSON::FetchUser('Juano'));
var_dump(User::userLogin('Juano', 'testeo'));
echo '</pre>';
