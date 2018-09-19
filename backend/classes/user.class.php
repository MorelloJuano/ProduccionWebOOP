<?php
//require_once('data.class.php');
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

        //$userRetrieved = JSON::fetchUser($inputUser);
        $userRetrieved = self::getVal($inputUser, 'users.json');

        if($userRetrieved == false){
            //Usuario inexistente
            return 'noUser';
        } else{
            $hashToCheck = hash('SHA256', $inputPassword . $userRetrieved->salt);
            if($hashToCheck == $userRetrieved->hash){
                $loggedUser = new User($userRetrieved->username, $userRetrieved->hash, $userRetrieved->salt);
                return $loggedUser;
            } else{
                //Contraseña incorrecta
                return 'wrongPassword';
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

    public static function getVal($inputUser, $filePath){
        $data = json_decode(file_get_contents($filePath), true);

        echo '<br> Array devuelto <pre>';
        print_r($data);
        echo '<pre><br>';



        foreach($data as $key => $value){
            if($key == $inputUser){
                $user = new User($key, $value['hash'], $value['salt']);
                return $user;
            }
            else{
                return false;
            }
        }
    }
}




