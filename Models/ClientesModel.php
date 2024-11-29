<?php
class ClientesModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectClientes(){
        $sql="SELECT * FROM clientes where status > 0;";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function borrarClientes(int $id){
        $this->id = $id;
        $sql="UPDATE clientes SET status = ? where idClientes = {$this->id}";
        $arrayData= array(0);

        $requestDelete = $this->update($sql,$arrayData);

        return $requestDelete;
    }

    public function selectClienteById(int $id){
        $sql="SELECT * from clientes where idClientes = $id";

        $request_select = $this->select_all($sql);

        return $request_select;
    }

     public function selectClienteByIdentification(int $identificacion){
        $sql="SELECT * from clientes where identificacion = $identificacion AND status > 0";

        $request_select = $this->select_all($sql);

        return $request_select;
    } 

    public function insertarClientes(string $nombre, string $apellido, string $correo ,string $telefono, int $identificacion){

        $result="";

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->identificacion=$identificacion;

        $sql="SELECT * from clientes Where correo='{$this->correo}' 
        or identificacion = '{$this->identificacion}'";

        $request=$this->select_all($sql);

        if (empty($request)) {

            $query_insert = "INSERT INTO clientes(nombre,apellido,correo,telefono,identificacion,status) VALUES(?, ?, ?, ?, ?, ?)";
            $arrData = array($this->nombre,$this->apellido,$this->correo,$this->telefono,$this->identificacion,1);
            $request_insert = $this->insert($query_insert, $arrData);
            $result = $request_insert;
            
        }else {

            $result="exist";

        }

        return $result;
        
    }

    public function actualizarCliente(string $nombre, string $apellido, string $correo, string $telefono,int $identificacion,int $idCliente){

        $result = "";
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->identificacion = $identificacion;
        $this->idCliente = $idCliente;

        $sql="SELECT * from clientes Where (correo= '{$this->correo}' 
        or identificacion = '{$this->identificacion}')
        and idClientes != {$this->idCliente}";

        $request=$this->select_all($sql);

        if (empty($request)) {

            $queryUpdate = "UPDATE clientes SET nombre = ?, apellido = ?, correo=?, telefono = ?,identificacion=?, status = ? WHERE idClientes = ?";

            $arrayData = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->identificacion,1,$this->idCliente);

            $requestUpdate = $this->update($queryUpdate, $arrayData);
            $result = $requestUpdate;

        }else {

            $result = "exist";
        }

        return $result;
    }

}