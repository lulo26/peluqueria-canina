<?php

class CitasModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function selectCitas(){
        $sql = "SELECT id_cita,fecha_inicio, 
        fecha_final,lugar_cita,
        nombre_servicio as nombre_servicio,
        clientes.nombre as nombre_cliente,
        clientes.apellido as apellido_cliente,
        empleados.nombre_empleado,
        empleados.apellido_empleado
        FROM citas
        INNER JOIN clientes on clientes.idClientes = citas.clientes_idClientes
        INNER JOIN empleados on empleados.id_empleado = citas.empleados_idEmpleados
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_idCitas = citas.id_cita
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_idServicios
        WHERE estado_cita != 0 and estado_empleado != 0 and estado_cliente != 'inactivo'";

        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectServicios(){
        $sql = "SELECT * from servicios where estado_servicio != 0";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectClientes(){
        $sql = "SELECT * from clientes where estado_cliente != 'inactivo'";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectEmpleados(){
        $sql = "SELECT * from empleados where estado_empleado != 0";
        $request_select = $this->select_all($sql);
        return $request_select;
    }



}