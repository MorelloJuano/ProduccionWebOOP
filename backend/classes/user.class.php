<?php
require_once('database.class.php');
require_once('logsColl.class.php');
class User
{
    private $username;
    private $hash;
    private $salt;
    private $logs; //LogsColl

    public function __get($var){
        return $this->$var;
    }

    public function __construct($username, $hash, $salt){
        //construir SOLAMENTE cuando se loguea el usuario
        $this->username = $username;
        $this->hash = $hash;
        $this->salt = $salt;
        $this->logs = new logsColl();
    }
    /*
     * Busca un usuario, si lo encuentra, hace los chequeos para ver si la password coincide con el input del usuario
     *
     * */
    public static function userLogin($inputUser, $inputPassword){
        $dataBase = new DBA();

        $userRetrieved = $database->getLoginData($inputUser);
        if($userRetrieved == null){
            //Usuario inexistente
            return 'noUser';
        } else{
            $hashToCheck = hash('SHA256', $inputPassword . $userRetrieved->salt);
            if($hashToCheck == $userRetrieved->hash){
                $loggedUser = new User($userRetrieved->username, $userRetrieved->hash, $userRetrieved->salt);
                $dataBase->insertUserLogs($loggedUser, "LOGIN");
                return $loggedUser;
            } else{
                //Contraseña incorrecta
                return 'wrongPassword';
            }
        }
    }

    public function getLogs(){
        $dataBase = new DBA();
        $this->logs = $dataBase->getUserLogs($this);

        echo "<pre>";
        var_dump($this->logs);
        echo "</pre>";

        return $this->logs;
    }

    /*
     * Creamos la password en base a un SALT de 32bytes de largo con caracteres binarios aleatorios convertidos a characters
     * y eso se concatena a la password que ingresa el usuario al momento, y se encripta con el algoritmo SHA256, que devuelve una cadena
     * encriptada de 32bytes de largo
     * 
     * Esto no va para el TP
     * */
    public static function userSignUp($inputUser, $inputPassword){
        $salt = bin2hex(random_bytes(32));
        $hash = hash('SHA256', $inputPassword . $salt);

        $user = new User($inputUser, $hash, $salt);

        JSON::createUser($user);
    }

    public function viewLogs(){
        $logs = new Logs($this);
    }
}




