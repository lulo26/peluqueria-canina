<?php

class RazasModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        function selectRazas(){
            $sql = "SELECT * FROM razas_mascota";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectRazaID($id){
            $sql = "SELECT * FROM razas_mascota WHERE idraza = $id";
            $request = $this->select_all($sql);
            return $request;
        }

        public function insertarRaza(string $nombre, string $size){

            $this->nombre = $nombre;
            $this->size = $size;
    
            $sql = "INSERT INTO razas_mascota (nombreRaza, sizeRaza) VALUES (?, ?)";
            $arrData = array($this->nombre, $this->size);
            return $this->insert($sql, $arrData);
            
        }
    
        public function editarRaza(int $id, string $nombre, string $size){
            $return = "";
            $this->id = $id;
            $this->nombre = $nombre;
            $this->size = $size;
    
            $sql = "SELECT idRaza FROM razas_mascota WHERE idRaza = '{$this->id}'";
            $request = $this->select_all($sql);
    
            if(!empty($request)){
                $query = "UPDATE razas_mascota SET nombreRaza = ?, sizeRaza = ? WHERE idraza = ?";
                $arrData = array($this->nombre, $this->size, $this->id);
                $request_insert = $this->insert($query, $arrData);
                $return = $request_insert;
            } else {
                $return = "empty";
            }
            return $return;
        }
    
        public function deleteRaza(int $id){
            $return = "";
    
            $this->id = $id;
    
            $sql = "SELECT * FROM razas_mascota WHERE idRaza = '{$this->id}'";
            $request = $this->select_all($sql);
            if(!empty($request)){
                $query = "DELETE FROM razas_mascota WHERE idRaza = ?";
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