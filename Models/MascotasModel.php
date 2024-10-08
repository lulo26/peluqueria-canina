<?php

class MascotasModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function selectMascotas(){
        $sql = "SELECT * FROM mascotas";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectMascotaID($id){
        $return = "";

        $this->id = $id;

        $sql = "SELECT * FROM mascotas WHERE idMascotas = '{$this->id}'";
        $request = $this->select_all($sql);
        $return = $request;
        if(!empty($request)){
            return $return;
        } else {
            $return = "empty";
        }
    }

    public function insertarMascota(string $nombre, string $raza, int $edad, string $comentario){

        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->comentario = $comentario;

        $sql = "INSERT INTO mascotas (nombre, raza, edad, comentario) VALUES (?, ?, ?, ?)";
        $arrData = array($this->nombre, $this->raza, $this->edad, $this->comentario);
        return $this->insert($sql, $arrData);
        
    }

    public function editarMascota(int $id, string $nombre, string $raza, int $edad, string $comentario){
        $return = "";

        $this->id = $id;
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->comentario = $comentario;

        $sql = "SELECT idMascotas FROM mascotas WHERE idMascotas = '{$this->id}'";
        $request = $this->select_all($sql);

        if(!empty($request)){
            $query = "UPDATE mascotas SET nombre = ?, raza = ?, edad = ?, comentario = ? WHERE idMascotas = ?";
            $arrData = array($this->nombre, $this->raza, $this->edad, $this->comentario, $this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    }

    public function eliminarMascota(int $id){
        $return = "";

        $this->id = $id;

        $sql = "SELECT * FROM mascotas WHERE idMascotas = '{$this->id}'";
        $request = $this->select_all($sql);
        if(!empty($request)){
            $query = "DELETE FROM mascotas WHERE idMascotas = ?";
            $arrData = array($this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert
        } else {
            $return = "empty";
        }
    }

}

?>