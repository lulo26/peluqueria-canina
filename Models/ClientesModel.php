<?php
class ClientesModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function insertarClientes(string $nombre, string $apellido, string $correo , string $usuario, string $password){
        $result="";

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->usuario=$usuario;
        $this->password=$password;

        //ejecutamos consultas para saber si existen o no en la base de datos
        $sql=["SELECT * from clientes Where usuario='{$this->usuario}'","SELECT * from clientes where correo='{$this->correo}'"];

        $array_request=[
            "user"=>$this->select_all($sql[0]),
            "email"=>$this->selectAll($sql[1])
        ];

        if (!empty($array_request["user"]) || !empty($array_request["email"])) {
            
            if (!empty($array_request["user"])) {
                $result="user exist";
            } else {
                $result="email exist";
            }
            
        }else {
            $query_insert = "INSERT INTO clientes(nombre,apellido,correo,usuario,password) VALUES(?, ?, ?, ?, ?)";
            $arrData = array($this->nombre,$this->apellido,$this->correo,$this->usuario,$this->password);
            $request_insert = $this->insert($query_insert, $arrData);
            $result = $request_insert;
        }

        return $result;
        
    }

}