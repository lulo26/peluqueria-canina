<?php

class Login extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function login(){


        $data['page_title'] = "Página Login";
        $data['page_name'] = "login";
        $data['page_id_name'] = "login";
        $data['page_functions_js'] = "login/login.js";
        $this->views->getView($this,"login", $data);
    }

    public function loginUser(){
        //dep($_POST);
        if ($_POST) {
            $arrPost = ['txtEmail','txtPassword'];
            if (check_post($arrPost)) {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strUsuario = strtolower(strClean($_POST['txtEmail']));
                $strPassword = hash("SHA256", $_POST['txtPassword']);
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
            }
        }
        die();
    }
}