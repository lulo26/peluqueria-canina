<?php

class UsuariosModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function insertarUsuario(int $identificacion, string $nombre, string $apellido, string $email, string $telefono, int $tipoId, string $password, int $status){        
        $return = "";
        $this->strIdentificacion = $identificacion;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strpassword = $password;
        $this->intTipoId = $tipoId;
        $this->intStatus = $status;


        $sql = "SELECT * FROM personas WHERE email_user = '{$this->strEmail}' OR identificacion = $this->strIdentificacion";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO persona (identificacion, nombres, apellidos, telefono, email_user, `password`, rolid, `status`)
            VALUES (?,?,?,?,?,?,?,?)";
            $arrData = array(
                $this->strIdentificacion,
                $this->strNombre,
                $this->strApellido,
                $this->strTelefono,
                $this->strEmail,
                $this->strPassword,
                $this->intTipoId,
                $this->intStatus
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }
    }

}