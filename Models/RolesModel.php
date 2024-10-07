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
        $sql = "SELECT * FROM roles WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRol(int $id_rol){
        //Buscar Rol
        $this->intIdRol = $id_rol;
        $sql = "SELECT * FROM roles WHERE id_rol = $this->intIdRol";
        $request = $this->select($sql);
        return $request;
    }

    public function insertRol(string $rol, string $descripcion, int $status){
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM roles WHERE nombre_rol = '{$this->strRol}'";
        $request = $this->select_all($sql);

        if(empty($request)){
            $query_insert = "INSERT INTO roles(nombre_rol, descripcion, status) VALUES(?, ?, ?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function updateRol(int $id_rol, string $rol, string $descripcion, int $status){
        $this->intIdRol = $id_rol;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM roles WHERE nombre_rol = '$this->strRol' AND id_rol != $this->intIdRol";
        $request = $this->select_all($sql);

        if(empty($request)){
            $sql = "UPDATE roles SET nombre_rol = ?, descripcion = ?, status = ? WHERE id_rol = $this->intIdRol ";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        }else{
            $request = "exist";
        }

        return $request;
    }

    public function deleteRol(int $idrol){
        $this->intIdrol = $idrol;
        $sql = "SELECT * FROM personas WHERE rol_id = $this->intIdrol";
        $request = $this->select_all($sql);
        if(empty($request)){
            $sql = "UPDATE roles SET status = ? WHERE id_rol = $this->intIdrol";
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