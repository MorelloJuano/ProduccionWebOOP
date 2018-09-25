<?php
class JSON
{
    private static $userPath = "./users.json";
    private static $logsPath = "../../logs.json";

/*Recibe como parametro un String que es el nombre del usuario, chequea si existe ese index en el array
  usuarios, si no lo encuentra avisa que no existe, si lo encuentra, retorna el objeto usuario
  con todos sus datos
*/
    public static function FetchUser($nameUser)
    {
        if(!file_exists(self::$userPath)){
            return "Ruta de archivo inexistente";
            die();
        }
        $users = json_decode(file_get_contents(self::$userPath), true);
        
        if(!array_key_exists($nameUser, $users)){
            return 'Nombre de usuario inexistente';
        } else{
            $foundUser = new User($nameUser, $users[$nameUser]['hash'], $users[$nameUser]['salt']);
            return $foundUser;
        }
    }
/*Recibe objeto usuario, chequea si existe en el JSON, si no existe lo crea ingresandolo al JSON
 * */
    public static function CreateUser(User $user)
    {
        if(!file_exists(self::$userPath)){
            return "Ruta de archivo inexistente";
            die();
        }
        $users = json_decode(file_get_contents($self->userPath), true);

        if (!in_array($user, $users, true)) {
            $users[] = $user;
        }else{
            return "Usuario existente";
        }
        $save_changes = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents(self::$userPath, $save_changes);

    }

    public static function getUserLog(User $user){
        $rawLogs = json_decode(file_get_contents(self::$logsPath), true);
        $userLogs = [];
    }

    public static function writeUserLog(User $user){

    }
}