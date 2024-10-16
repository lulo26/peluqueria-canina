<?php
class ClientesModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectClientes(){
        $sql="SELECT * FROM clientes where estado = 'activo'";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function borrarClientes(int $id){
        $this->id = $id;
        $sql="UPDATE clientes SET estado=? where idClientes = $this->id";
        $arrayData= array('inactivo');

        $requestDelete = $this->update($sql,$arrayData);
        
        if ($requestDelete) {
            $requestDelete="ok";
        }

        return $requestDelete;
    }

    public function selectClienteById(int $id){
        $sql="SELECT * from clientes where idClientes = $id";

        $request_select = $this->select_all($sql);

        return $request_select;
    }

    public function insertarClientes(string $nombre, string $apellido, string $correo ,string $telefono, string $usuario, string $password){

        $result="";

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->usuario=$usuario;
        $this->password=$password;

        $sql=["SELECT * from clientes Where usuario='{$this->usuario}'","SELECT * from clientes where correo='{$this->correo}'","SELECT * from clientes where telefono='{$this->telefono}'"];

        $array_request=[
            "user"=>$this->select_all($sql[0]),
            "email"=>$this->select_all($sql[1]),
            "tel"=>$this->select_all($sql[2])
        ];

        if (empty($array_request["user"]) && empty($array_request["email"]) && empty($array_request["tel"])) {

            $query_insert = "INSERT INTO clientes(nombre,apellido,correo,telefono,usuario,`password`,estado) VALUES(?, ?, ?, ?, ?, ?,?)";
            $arrData = array($this->nombre,$this->apellido,$this->correo,$this->telefono,$this->usuario,$this->password,'activo');
            $request_insert = $this->insert($query_insert, $arrData);
            $result = $request_insert;
            
        }else {

            if (empty($array_request["user"]) && empty($array_request["email"])) {
                $result = "tel exist";
            }elseif (empty($array_request["user"]) && empty($array_request["tel"])) {
                $result="email exist";
            }elseif (empty($array_request["email"]) && empty($array_request["tel"])) {
                $result="user exist";
            }elseif (empty($array_request["tel"])) {
                $result= "both exist";
            } else{
                $result = "all exist";
            }

        }

        return $result;
        
    }

    public function actualizarCliente(string $nombre, string $apellido, string $correo, string $telefono,string $usuario, string $password,int $idCliente){

        $result = "";
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->idCliente = $idCliente;

        $sql=["SELECT * from clientes Where usuario ='{$this->usuario}' and idClientes != $this->idCliente","SELECT * from clientes where correo='{$this->correo}' and idClientes != $this->idCliente","SELECT * from clientes where telefono='{$this->telefono}' and idClientes != $this->idCliente"];

        $array_request=[
            "user"=>$this->select_all($sql[0]),
            "email"=>$this->select_all($sql[1]),
            "tel"=>$this->select_all($sql[2])
        ];

        if (empty($array_request["user"]) && empty($array_request["email"])) {

            $queryUpdate = "UPDATE clientes SET nombre = ?, apellido = ?, correo=?, telefono = ?,usuario=?, password = ?, estado = ? WHERE idClientes = $this->idCliente";

            $arrayData = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->usuario,$this->password, "activo");

            $requestUpdate = $this->update($queryUpdate, $arrayData);
            $result = $requestUpdate;

        }else {

            if (empty($array_request["user"]) && empty($array_request["email"])) {
                $result = "tel exist";
            }elseif (empty($array_request["user"]) && empty($array_request["tel"])) {
                $result="email exist";
            }elseif (empty($array_request["email"]) && empty($array_request["tel"])) {
                $result="user exist";
            }elseif (empty($array_request["tel"])) {
                $result= "both exist";
            } else{
                $result = "all exist";
            }
        }

        return $result;
    }

}