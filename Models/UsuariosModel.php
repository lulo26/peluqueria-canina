<?php

class UsuariosModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function selectUsuarios(){
        
        $sql = "SELECT p.id_persona , p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, p.status, r.nombre_rol 
        FROM personas p 
        INNER JOIN roles r 
        ON p.rol_id = r.id_rol 
        WHERE p.status != 0";

        $request = $this->select_all($sql);

        return $request;
    }

    public function insertarUsuario(int $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoId, int $status){        
        $return = "";
        $this->strIdentificacion = $identificacion;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->intTelefono = $telefono;
        $this->strEmail = $email;
        $this->strpassword = $password;
        $this->intTipoId = $tipoId;
        $this->intStatus = $status;
        $return = 0;


        $sql = "SELECT * FROM personas WHERE email_user = '{$this->strEmail}' OR identificacion = '{$this->strIdentificacion}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO personas(identificacion, nombres, apellidos, telefono, email_user, `password`, rol_id, `status`)
            VALUES (?,?,?,?,?,?,?,?)";
            $arrData = array(
                $this->strIdentificacion,
                $this->strNombre,
                $this->strApellido,
                $this->intTelefono,
                $this->strEmail,
                $this->strpassword,
                $this->intTipoId,
                $this->intStatus
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }
}