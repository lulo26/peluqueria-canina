<?php

class CitasModel extends Mysql{


    public function __construct(){
        parent::__construct();
    }

    public function insertarCitas(string $dia_cita,string $hora_inicio, string $hora_final, string $lugar, int $id_mascota, int $id_empleado){
        $this->dia_cita=$dia_cita;
        $this->hora_inicio=$hora_inicio;
        $this->hora_final=$hora_final;
        $this->lugar=$lugar;
        $this->id_mascota=$id_mascota;
        $this->id_empleado=$id_empleado;

        $sql = "INSERT INTO citas(dia_cita,hora_inicio,hora_final,lugar_cita,estado_cita,mascotas_idMascotas,personas_id_persona) 
        values (?,?,?,?,?,?,?)";
        $arrayData = array($this->dia_cita,$this->hora_inicio,$this->hora_final,$this->lugar,1,$this->id_mascota,$this->id_empleado);
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

    public function actualizarCitas(string $dia_cita,string $hora_inicio, string $hora_final, string $lugar, int $id_mascota, int $id_empleado,int $id_cita){
        $this->dia_cita=$dia_cita;
        $this->hora_inicio=$hora_inicio;
        $this->hora_final=$hora_final;
        $this->lugar=$lugar;
        $this->id_mascota=$id_mascota;
        $this->id_empleado=$id_empleado;
        $this->id_cita=$id_cita;

        $sql = "UPDATE citas set  dia_cita = ?,hora_inicio = ? ,hora_final = ?,lugar_cita = ?,estado_cita = ?,mascotas_idMascotas  = ?,personas_id_persona = ? WHERE id_cita = ?";

        $arrayData = array($this->dia_cita,$this->hora_inicio,$this->hora_final,$this->lugar,1,$this->id_mascota,$this->id_empleado,$this->id_cita);

        $request_insert = $this->insert($sql, $arrayData);

        $result = $request_insert;

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
        $sql = 'SELECT id_cita,
        dia_cita,
		hora_inicio,
		hora_final,
		lugar_cita,
        mascotas.nombreMascota as nombre_mascota,
        CONCAT(personas.nombres," ",personas.apellidos) as nombre_empleado
        FROM citas
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_id_cita = citas.id_cita
        INNER JOIN mascotas on mascotas.idMascotas = citas.mascotas_idMascotas
        INNER JOIN personas on personas.id_persona = citas.personas_id_persona
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_id_servicio
        WHERE estado_cita != 0
        GROUP BY id_cita';

        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectCitasByID(int $id_cita){
        $sql = "SELECT id_cita,dia_cita, hora_inicio,hora_final, lugar_cita,mascotas_idMascotas,personas_id_persona 
        from citas 
        INNER JOIN citas_has_servicios ON citas_has_servicios.citas_id_cita = citas.id_cita
        INNER JOIN servicios ON servicios.id_servicio = citas_has_servicios.servicios_id_servicio
        WHERE id_cita = $id_cita";

        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function ViewCita(int $id_cita){
        $sql = 'SELECT CONCAT(clientes.nombre," ",clientes.apellido) as cliente,
                mascotas.nombreMascota,
                citas.dia_cita,
                citas.hora_inicio,
                citas.hora_final,
                citas.lugar_cita,
                CONCAT(personas.nombres," ",personas.apellidos) as empleado
                FROM citas
                JOIN mascotas on mascotas.idMascotas = citas.mascotas_idMascotas
                JOIN clientes on clientes.idClientes = mascotas.clientes_idClientes
                JOIN personas on personas.id_persona = citas.personas_id_persona
                JOIN citas_has_servicios on citas_has_servicios.citas_id_cita = citas.id_cita
                WHERE citas.id_cita = '.$id_cita;

        $request_select = $this->select_all($sql);
        return $request_select;
        
    }

    public function selectServiciosByID(int $id_cita){
        $sql="SELECT servicios_id_servicio,servicios.nombre_servicio
        FROM citas_has_servicios
        inner join servicios on servicios.id_servicio = servicios_id_servicio
        WHERE citas_id_cita = $id_cita";
        
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectServicios(){
        $sql = "SELECT * from servicios where estado_servicio != 0";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectMascotas(){
        $sql = "SELECT * from mascotas";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectEmpleados(){
        $sql = 'SELECT * from personas
        INNER JOIN roles on roles.id_rol = personas.rol_id
        WHERE roles.nombre_rol = "Vendedor" ';
        $request_select = $this->select_all($sql);
        return $request_select;
    }



}