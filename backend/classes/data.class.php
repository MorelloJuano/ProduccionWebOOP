<?php
class JSON
{
    private $path = "../users.json";

    public function __construct($path)
    {
        $this->path = $path;
    }
/*Recibe como parametro un String que es el nombre del usuario, chequea si existe ese index en el array
  usuarios, si no lo encuentra avisa que no existe, si lo encuentra, retorna el objeto usuario
  con todos sus datos
*/
    public function FetchUser($nameUser)
    {
        if(!file_exists($this->path)){
            return "Ruta de archivo inexistente";
            die();
        }
        $users = json_decode(file_get_contents($this->path), true);

        foreach ($users as $elemento) {
            if (!array_key_exists($nameUser, $elemento)) {
                return "Nombre de usuario inexistente";
            } else {
                return $elemento[$nameUser];
            }
        }
    }
/*Recibe objeto usuario, chequea si existe en el JSON, si no existe lo crea ingresandolo al JSON
 * */
    public function CreateUser(User $user)
    {
        if(!file_exists($this->path)){
            return "Ruta de archivo inexistente";
            die();
        }
        $users = json_decode(file_get_contents($this->path), true);

        if (!in_array($user, $users, true)) {
            $users[] = $user;
        }else{
            return "Usuario existente";
        }
        $save_changes = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents($this->path, $save_changes);

    }
}