<?php

class Login extends Controllers{
    public function __construct(){
        session_start();
        if(isset($_SESSION['login'])){
            header('Location: ' . base_url().'/dashboard' );
        }
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
            if (!check_post($arrPost)) {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strUsuario = strtolower(strClean($_POST['txtEmail']));
                $strPassword = hash("SHA256", $_POST['txtPassword']);
                //$strPassword = $_POST['txtPassword'];
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
                if (empty($requestUser)) {
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto');
                }else{
                    $arrData = $requestUser;
                    if ($arrData['status'] == 1) {
                        $_SESSION['idUser'] = $arrData['id_persona'];
                        $_SESSION['login'] = true;

                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                        $_SESSION['userData'] = $arrData;

                        $arrResponse = array('status' => true, 'msg' => 'ok');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo');
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}