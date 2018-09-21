<?php

class Testing
{
    private $path = "users.json";

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function FetchUser() //recibe un nameUser String como parametro
    {
        if (!file_exists($this->path)) {
            return "Ruta de archivo inexistente";
        }
        $users = json_decode(file_get_contents($this->path), true);

        $user["NuevoUser321"] = [
            "name" => "nicomolina",
            'hash' => 'niconiconiconiconiconico',
            'salt' => 'nico2nico2niconiconico2',
            'email' => 'nico3@nico4.nico5'
        ];
//////////////////////////////////////////////////////////////////////////////////////////////////
        /*Chequea que el objeto usuario no exista en el array objetos usuarios, si no esta, lo crea y retorna
        si existe lo retorna
        if(!in_array($user, $users, true)){
            echo "estas en el true, por que no existe <br>";
            $this->CreateUser($user);
            return $user;
        }else{
            echo "estas en el false, por que existe <br>";
            return $user;
        }
        echo "echo fuera del if";
        */
///////////////////////////////////////////////////////////////////////////////////////////////////

        /*Recibe como parametro un String que es el nombre del usuario, chequea si existe ese index en el array
                 usuarios, si no lo encuentra avisa que no existe, si lo encuentra, retorna el objeto usuario
                 con todos sus datos
        */
        $nameUser = "Nuevo_De_Usuario56+789";
        foreach ($users as $elemento) {
            if (!array_key_exists($nameUser, $elemento)) {
                echo "estas en el true, por que no existe <br>";
                return "Nombre de usuario inexistente";
            } else {
                echo "estas en el false, por que existe <br>";
                //var_dump($elemento[$nameUser]);
                return $elemento[$nameUser];
            }
        }
    }

    public function CreateUser($user) //recibe usuario
    {

        if (!file_exists($this->path)) {
            return "Ruta de archivo inexistente";
        }
        $users = json_decode(file_get_contents($this->path), true);

        /*
                $user["Nuevo_De_Usuario94"] = [
                    "name" => "nicomolina",
                    'hash' => 'niconiconiconiconiconico',
                    'salt' => 'nico2nico2niconiconico2',
                    'email' => 'nico3@nico4.nico5'
                ];
        */
        if (!in_array($user, $users, true)) {
            $users[] = $user;
        } else {
            return "Usuario existente";
        }

        $save_changes = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents($this->path, $save_changes);

    }
}
$test = new Testing("users.json");

echo $test->FetchUser();
//$test->FetchUser();
//$test->CreateUser();
//----------------------------
/*TEST FINALIZADO Nico M*/
/////////////////////////////////////////////////////////////////
require_once('backend/classes/user.class.php');
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

//$data = CreateUser('users.json');

$user = User::userLogin('Juano', 'testeo');
var_dump($user);






























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