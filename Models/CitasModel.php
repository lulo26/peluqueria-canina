<?php

class CitasModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function selectCitas(){
        $sql = "SELECT id_cita,fecha_inicio, 
        fecha_final,lugar_cita,
        nombre_servicio as nombre_servicio,
        clientes_idClientes,
        empleados_idEmpleados FROM citas
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_idCitas = citas.id_cita
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_idServicios";

        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectServicios(){
        $sql = "SELECT * from servicios where estado_servicio != 0";
        $request_select = $this->select_all($sql);
        return $request_select;
    }



}