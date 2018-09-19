<?php

function CreateUser($filePath){
    /*Hardcodeo un array de un logueo(user) que voy a recibir por parametro.
        Se testea su introduccion dentro del array data(json.decode) con exito.
        Falta agregar los \n para que se vea con orden.
        Inconveniente al intentar escribir el users.json, ya que lo escribe por fuera
        de los logueos registrados.
    */
    $data = json_decode(file_get_contents($filePath), true);
    echo 'Datos originales <pre>';
    print_r( $data );
    echo '</pre>';

    echo '<br>Array con el nuevo usuario pusheado al final (aunque es irrelevante donde lo inserta en este caso)<br>';

    $data['Testeo'] = [
        'hash'   => '3d9dfa242e13cf43b2196354637413b731de9fd0e58d2108d6e79e0efe711296',
        'salt'   => '1cd2a3fa25e313d2ea70ddb4af4668dd2d6e6ea90561be8035def315c93ff10e',
        'email'  => 'testerin@testeando.test'
    ];

    echo '<pre>';
    print_r( $data );
    echo '</pre>';
}
$data = CreateUser('users.json');

























/*
function FetchDataAssoc(){
    //testeo
    $nameUser = "testeo1";
    $file_name = "users.json";
    $file = fopen($file_name, 'r');
    $data = json_decode(fread($file, filesize($file_name)));
    foreach ($data as $elemento){
        //var_dump($elemento);
        if($nameUser == $elemento->name){
            echo 'Tengo que retornar un objeto usuario con sus atributos';
            //retornar el usuario con sus datos encapsulados
            //Si se encuentra el user, creamos un usuario
            //$user = new User($valor['username'], $valor['hash'], $valor['salt']);
            //return $user;
        }
    }
    fclose($file);
}

$data = FetchDataAssoc();

/*

function fetchDataAssoc($filePath){
    $file = fopen($filePath, 'r');
    $data = json_decode(fread($file, filesize($filePath)), true);
    fclose($file);
    return $data;
}

$var = fetchDataAssoc('users.json');
//var_dump($var);

$connection = new PDO("mysql:host=localhost;dbname=produccionweb", 'root', ''); //Meter esto en un try catch
$statement = $connection->prepare("SELECT * FROM usuarios WHERE username = ?");
$statement->execute(['testeo1']);
$user = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($user);
//$connection = null;
//var_dump($connection);
//var_dump($statement);
//var_dump($result);
<<<<<<< HEAD
=======
*/
/*
$host = '127.0.0.1';
$db   = 'produccionweb';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$email = 'testeo2@davinci.edu.ar';


$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
var_dump($user);
/*
while ($row = $stmt->fetch())
{
    echo $row['name'] . "<br>";
}
>>>>>>> aaa411bf4e6dfe6ef84412d3413e720b23347dbd
*/