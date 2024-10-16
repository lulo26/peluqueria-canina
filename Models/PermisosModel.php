<?php

class PermisosModel extends Mysql{

    public $intIdPermiso;
    public $intRolid;
    public $intModuloId;
    public $r;
    public $w;
    public $u;
    public $d;

    public function __construct(){
        parent::__construct();
    }

    public function selectModulos(){
        $sql = "SELECT * FROM modulos WHERE status_modulo != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectPermisosRol(int $idrol){
        $this->intRolid = $idrol;
        $sql = "SELECT * FROM permisos WHERE rol_id = $this->intRolid";
        $request = $this->select_all($sql);
        return $request;
    }

    public function deletePermisos(int $idrol){
        $this->intRolid = $idrol;
        $sql = "DELETE FROM permisos WHERE rol_id = $this->intRolid";
        $request = $this->delete($sql);
        return $request;
    }

    public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d){
        $this->intRolid = $idrol;
        $this->intModuloid = $idmodulo;
        $this->r = $r;
        $this->w = $w;
        $this->u = $u;
        $this->d = $d;
        $query_insert = "INSERT INTO permisos(rol_id,modulo_id,r,w,u,d) VALUES(?,?,?,?,?,?)";
        $arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
    
}