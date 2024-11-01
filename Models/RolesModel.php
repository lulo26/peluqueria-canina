<?php

class RolesModel extends Mysql{

    public $intIdRol;
    public $strRol;
    public $strDescripcion;
    public $intStatus;

    public function __construct(){
        parent::__construct();
    }

    public function selectRoles(){
        $whereAdmin = "";
        if ($_SESSION['idUser'] != 1) {
            $whereAdmin = " AND id_rol != 1 ";
        }
        $sql = "SELECT * FROM roles WHERE status_rol != 0".$whereAdmin;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRolesActivos(){
        $whereAdmin = "";
        if ($_SESSION['idUser'] != 1) {
            $whereAdmin = " AND id_rol != 1 ";
        }
        $sql = "SELECT id_rol, nombre_rol, status_rol FROM roles WHERE status_rol != 0 AND status_rol = 1".$whereAdmin;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRol(int $id_rol){
        $this->intIdRol = $id_rol;
        $sql = "SELECT * FROM roles WHERE id_rol = $this->intIdRol";
        $request = $this->select($sql);
        return $request;
    }

    public function insertarRol(string $rol, string $descripcion, int $status){
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM roles WHERE nombre_rol = '{$this->strRol}'";
        $request = $this->select_all($sql);

        if(empty($request)){
            $query_insert = "INSERT INTO roles(nombre_rol, descripcion_rol, status_rol) VALUES(?, ?, ?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function actualizarRol(int $id_rol, string $rol, string $descripcion, int $status){
        $this->intIdRol = $id_rol;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;
        
        $sql = "UPDATE roles SET nombre_rol = ?, descripcion_rol = ?, status_rol = ? WHERE id_rol = $this->intIdRol ";
        $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
        $request = $this->update($sql, $arrData);

        return $request;
    }

    public function deleteRol(int $idrol){
        
        $this->intIdrol = $idrol;
        $sql = "SELECT * FROM personas WHERE rol_id = {$this->intIdrol}";
        $request = $this->select_all($sql);

        if(empty($request)){
            $sql = "UPDATE roles SET status_rol = ? WHERE id_rol = {$this->intIdrol}";
            $arrData = array(0);
            $request = $this->update($sql, $arrData);
            if($request){
                $request = 'ok';
            }else{
                $request = 'error';
            }
        }else{
            $request = 'exist';
        }

        return $request;
        
    }

}