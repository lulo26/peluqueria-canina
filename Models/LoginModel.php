<?php

class LoginModel extends Mysql{

    private $intIdUsuario;
    private $strUsuario;
    private $strToken;

    public function __construct(){
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password){
        $this->strUsuario = $usuario;
        $this->strPassword = $password;
        $sql = "SELECT id_persona, status FROM personas WHERE
        email_user = '{$this->strUsuario}' AND
        password = '{$this->strPassword}' AND
        status != 0";
        
        $request = $this->select($sql);
        return $request;        
    }

    public function sessionLogin(int $idUser){
        $this->intUsuario = $idUser;

        $sql = "SELECT p.id_persona, 
        p.identificacion,
        p.nombres,
        p.apellidos,
        p.email_user,
        p.nit,
        p.razon_social,
        r.id_rol, r.nombre_rol,
        p.status
        FROM personas p
        INNER JOIN roles r
        ON p.rol_id = r.id_rol
        WHERE p.id_persona = {$this->intUsuario}";

        $request = $this->select($sql);
        return $request;
    }

}