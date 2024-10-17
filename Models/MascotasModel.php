<?php

class MascotasModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function selectMascotas(){
        $sql = "SELECT * FROM mascotas
        INNER JOIN clientes
        ON clientes.idClientes = mascotas.clientes_idClientes";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectMascotaID($id){
        $sql = "SELECT idMascotas,nombreMascota, razaMascota, edadMascota, comentarioMascota, nombre, idClientes FROM mascotas
        INNER JOIN clientes
        ON clientes.idClientes = mascotas.clientes_idClientes
        WHERE idMascotas = $id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertarMascota(int $clienteId, string $nombre, string $raza, int $edad, string $comentario){

        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->comentario = $comentario;
        $this->clienteId = $clienteId;

        $sql = "INSERT INTO mascotas (nombreMascota, razaMascota, edadMascota, comentarioMascota, clientes_idClientes) VALUES (?, ?, ?, ?, ?)";
        $arrData = array($this->nombre, $this->raza, $this->edad, $this->comentario, $this->clienteId);
        return $this->insert($sql, $arrData);
        
    }

    public function editarMascota(int $id, int $clienteId, string $nombre, string $raza, int $edad, string $comentario){
        $return = "";

        $this->clienteId = $clienteId;
        $this->id = $id;
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->comentario = $comentario;

        $sql = "SELECT idMascotas FROM mascotas WHERE idMascotas = '{$this->id}'";
        $request = $this->select_all($sql);

        if(!empty($request)){
            $query = "UPDATE mascotas SET nombreMascota = ?, razaMascota = ?, edadMascota = ?, comentarioMascota = ?, clientes_idClientes = ? WHERE idMascotas = ?";
            $arrData = array($this->nombre, $this->raza, $this->edad, $this->comentario, $this->clienteId, $this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    }

    public function deleteMascota(int $id){
        $return = "";

        $this->id = $id;

        $sql = "SELECT * FROM mascotas WHERE idMascotas = '{$this->id}'";
        $request = $this->select_all($sql);
        if(!empty($request)){
            $query = "DELETE FROM mascotas WHERE idMascotas = ?";
            $arrData = array($this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    }

}

?>