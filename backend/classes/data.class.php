<?php
class JSON
{
    private $fileName;

    public function __CONSTRUCT($filePath){
        $this->fileName = $filePath;
    }
    //Funcion para levantar y leer json
    public function FetchUser($nameUser)
    {
        $file = fopen($this->fileName, 'r');
        $data = json_decode(fread($file, filesize($this->fileName)));
        foreach ($data as $elemento) {
            if ($nameUser == $elemento->name) {
                echo 'Tengo que retornar un objeto usuario con sus atributos';
                //retornar el usuario con sus datos encapsulados
                //Si se encuentra el user, creamos un usuario
                //$user = new User($valor['username'], $valor['hash'], $valor['salt']);
                //return $user;
            }
        }
        fclose($file);
    }

    public function CreateUser($user){
            //$file_name = "users.json";
            $file = fopen($this->fileName, 'r');
            $data = json_decode(fread($file, filesize($this->fileName)));
            /*Hardcodeo un array de un logueo(user) que voy a recibir por parametro.
            Se testea su introduccion dentro del array data(json.decode) con exito.
            Falta agregar los \n para que se vea con orden.
            Inconveniente al intentar escribir el users.json, ya que lo escribe por fuera
            de los logueos registrados.
            */
            $usu=array(
                "UsuarioNuevo"=>
                    array(
                        "NOMBRE"=>"NICOLAS",
                        "MAIL"=>"NUEVOMAIL")
            );
            //var_dump($usu);

            $usu = 'NuevoUsuario';
            $datosUsuario = array();
            $datosUsuario['name'] = $usu ;
            $data->NuevoRegistro = $datosUsuario;
            //var_dump($data);

            $algo = json_encode($data);
            var_dump($algo);
            //fwrite($file, $salvar);

            fclose($file);
        }

        public function fetchLog(User $user){ //Debería devolver un objeto logs

        }

        public function writeLog(User $user){ //Debería crear una nueva entrada en el archivo de Logs

        }

        public function writeJSON($filePath, $content){
            $rawContent = json_decode(file_get_contents($filePath), true);


        }
}



/*
class Data{
    private $path;

    public function __construct($path){
        $this->path = $path;
}

    public function readData($field, $value){
        $handle = fopen($this->path, 'r');
        $data = fread($handle);
        $data = json_decode($data, true);

        foreach($data as $key => $value){
            //if()
        }
    }


}
*/