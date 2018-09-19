<?php
//require_once($_SERVER['DOCUMENT_ROOT'] .);
class User
{
    private $username;
    private $hash;
    private $salt;

    public function __get($var){
        return $this->$var;
    }

    public function __construct($username, $hash, $salt){
        //construir SOLAMENTE cuando se loguea el usuario
        $this->username = $username;
        $this->hash = $hash;
        $this->salt = $salt;
    }
    /*
     * Busca un usuario, si lo encuentra, hace los chequeos para ver si la password coincide con el input del usuario
     *
     * */
    public static function userLogin($inputUser, $inputPassword){
        $userRetrieved = JSON::fetchUser($inputUser);
        if(is_null($userRetrieved)){
            //Usuario inexistente
            return 1;
        } else{
            $hashToCheck = hash('SHA256', $inputPassword . $userRetrieved->salt);
            if($hashToCheck == $userRetrieved['hash']){
                $loggedUser = new User($userRetrieved['username'], $userRetrieved['hash'], $userRetrieved['salt']);
                return $loggedUser;
            } else{
                //Contraseña incorrecta
                return 2;
            }
        }
    }

    /*
     * Creamos la password en base a un SALT de 32bytes de largo con caracteres binarios aleatorios convertidos a characters
     * y eso se concatena a la password que ingresa el usuario al momento, y se encripta con el algoritmo SHA256, que devuelve una cadena
     * encriptada de 32bytes de largo
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




