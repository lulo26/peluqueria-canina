<?php 


class ServiciosModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectServicios(){
        $sql="SELECT * FROM servicios where estado_servicio = 1 ";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectServicioById(int $id){
        $sql="SELECT * from servicios where id_servicio = $id";

        $request_select = $this->select_all($sql);

        return $request_select;
    }

}