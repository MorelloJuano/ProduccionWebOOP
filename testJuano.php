<?php
require_once('backend/classes/user.class.php');

//User::userSignUp('Juano', 'testeo123');

$data = (array) json_decode(file_get_contents('users.json'));

echo 'datos recibidos crudos de users.json <br>';

var_dump($data);

echo '<br>datos datos que van a ser pusheados a users.json <br>';

array_push($data, array("user5" => array("name" => "testeo",
    "hash" => "3d9dfa242e13cf43b2196354637413b731de9fd0e58d2108d6e79e0efe711296",
    "salt" => "1cd2a3fa25e313d2ea70ddb4af4668dd2d6e6ea90561be8035def315c93ff10e",
    "mail" => "testeo@testeando.test")));
echo '<br><br>';
$writeData = json_encode($data);
var_dump($writeData);



$handle = fopen('users.json', 'w+');
fwrite($handle, $writeData);

$check = (array) json_decode(file_get_contents('users.json'));



/*
fwrite($handle, $writeData);
fclose($handle);

echo '<br>Lo que se guardó en users.json <br>';
/*
fwrite($handle, $writeData);
fclose($handle);

$data = (array) json_decode(file_get_contents('users.json'));
var_dump($data);
*/

/*
 * array_push_after
 *
 *
 * file_get_content('user_' . 'nico' . '.json');
 *
 * user_nico.json
 * user_juano.json
 * */
