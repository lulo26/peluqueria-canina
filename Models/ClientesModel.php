<?php
class ClientesModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function insertarClientes(string $nombre, string $apellido, string $correo ,string $telefono, string $usuario, string $password){
        $result="";

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->usuario=$usuario;
        $this->password=$password;

        $sql=["SELECT * from clientes Where usuario='{$this->usuario}'","SELECT * from clientes where correo='{$this->correo}'"];

        $array_request=[
            "user"=>$this->select_all($sql[0]),
            "email"=>$this->select_all($sql[1])
        ];

        if (empty($array_request["user"]) && empty($array_request["email"])) {

            $query_insert = "INSERT INTO clientes(nombre,apellido,correo,telefono,usuario,`password`) VALUES(?, ?, ?, ?, ?, ?)";
            $arrData = array($this->nombre,$this->apellido,$this->correo,$this->telefono,$this->usuario,$this->password);
            $request_insert = $this->insert($query_insert, $arrData);
            $result = $request_insert;
            
        }else {

            if (empty($array_request["user"])) {
                $result="email exist";
            } elseif (empty($array_request["email"])) {
                $result="user exist";
            }else {
                $result="both exist";
            }
        }

        return $result;
        
    }

}