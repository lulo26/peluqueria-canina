<?php

class CitasModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function insertarCitas(string $fecha_inicio, string $fecha_final, string $lugar, int $id_cliente, int $id_empleado){
        $this->fecha_inicio=$fecha_inicio;
        $this->fecha_final=$fecha_final;
        $this->lugar=$lugar;
        $this->id_cliente=$id_cliente;
        $this->id_empleado=$id_empleado;

        $sql = "INSERT INTO citas(fecha_inicio,fecha_final,lugar_cita,estado_cita,clientes_idClientes,empleados_idEmpleados) 
        values (?,?,?,?,?,?)";
        $arrayData = array($this->fecha_inicio,$this->fecha_final,$this->lugar,1,$this->id_cliente,$this->id_empleado);
        $request_insert = $this->insert($sql, $arrayData);
        $result = $request_insert;

        return $result;
    }

    public function insertarCitaServicios(int $id_servicio){
        $sql_last_id = "SELECT id_cita from citas
        ORDER BY id_cita desc limit 1";
        $request_select = $this->select($sql_last_id);

        if (!empty($request_select)) {
            $last_id = $request_select["id_cita"];

            $this->last_id = $last_id;
            $this->id_servicio = $id_servicio;

            $sql="INSERT INTO citas_has_servicios
            VALUES(?,?)";

            $arrayData = array($this->last_id,$this->id_servicio);
            $request_insert = $this->insert($sql, $arrayData);
            $result = $request_insert;

        }else {
            $result = "error";   
        }

        return $result;
    }

    public function actualizarCitas(string $fecha_inicio, string $fecha_final, string $lugar, int $id_cliente, int $id_empleado,int $id_cita){

        $this->fecha_inicio=$fecha_inicio;
        $this->fecha_final=$fecha_final;
        $this->lugar=$lugar;
        $this->id_cliente=$id_cliente;
        $this->id_empleado=$id_empleado;
        $this->id_cita=$id_cita;

        $sql = "UPDATE citas set fecha_inicio = ? ,fecha_final = ?,lugar_cita = ?,estado_cita = ?,clientes_idClientes = ?,empleados_idEmpleados = ? WHERE id_cita = ?";

        $arrayData = array($this->fecha_inicio,$this->fecha_final,$this->lugar,1,$this->id_cliente,$this->id_empleado,$this->id_cita);

        $request_insert = $this->insert($sql, $arrayData);

        $result = $request_insert;

        return $result;
    }

    public function actCitaServicios(int $id_cita,int $id_servicio){

        $this->id_cita = $id_cita;
        $this->id_servicio = $id_servicio;

        $sql="UPDATE citas_has_servicios SET servicios_idServicios = ? WHERE citas_idCitas = ?";

        $arrayData = array($this->id_servicio,$this->id_cita);
        $request_update = $this->update($sql, $arrayData);
        $result = $request_update;

        return $result;
    }

    public function deleteCitas(int $id_cita){
        $this->id_cita = $id_cita;
        $sql = "UPDATE citas set estado_cita = ? 
        WHERE id_cita = {$this->id_cita}";

        $arrayData= array(0);

        $requestDelete = $this->update($sql,$arrayData);

        if ($requestDelete) {
            $requestDelete="ok";
        }

        return $requestDelete;
        
    }

    public function selectCitas(){
        $sql = "SELECT id_cita,fecha_inicio, 
        fecha_final,lugar_cita,
        clientes.nombre as nombre_cliente,
        clientes.apellido as apellido_cliente,
        empleados.nombre_empleado,
        empleados.apellido_empleado
        FROM citas
        INNER JOIN clientes on clientes.idClientes = citas.clientes_idClientes
        INNER JOIN empleados on empleados.id_empleado = citas.empleados_idEmpleados
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_idCitas = citas.id_cita
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_idServicios
        WHERE estado_cita != 0 and estado_empleado != 0 and estado_cliente != 'inactivo'
        GROUP BY id_cita
        ";

        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectCitasByID(int $id_cita){
        $sql = "SELECT id_cita,fecha_inicio, fecha_final, lugar_cita, clientes_idClientes, empleados_idEmpleados, servicios.nombre_servicio AS servicio
        from citas 
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_idCitas = citas.id_cita
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_idServicios
        WHERE id_cita = $id_cita";

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