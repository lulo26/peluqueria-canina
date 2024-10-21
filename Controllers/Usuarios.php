<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function usuarios(){

        $data['page_title'] = "Usuarios";
        $data['page_id_name'] = "usuarios";
 
        $this->views->getView($this,"usuarios", $data);
    }

    public function setUsuario(){
 
        if($_POST){

            $arrPost = ['txtIdentificacion','txtNombres','txtApellidos','txtEmail','txtTelefono','listRolId'];

            if (check_post($arrPost)) {
                $strIdentificacion = strClean($_POST['txtIdentificacion']);
                $strNombre = ucwords(strClean($_POST['txtNombres']));
                $strApellido = ucwords(strClean($_POST['txtApellidos']));
                $intTelefono = intval($_POST['txtTelefono']);
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                $intTipoId = intval($_POST['listRolId']);
                $intStatus = strClean($_POST['listStatus']);

                $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                //$strPassword = "123456";
                try {
                    $request_user = $this->model->insertarUsuario(
                        $strIdentificacion,
                        $strNombre,
                        $strApellido,
                        $intTelefono,
                        $strEmail,
                        $strPassword,
                        $intTipoId,
                        $intStatus
                    );

                    if ($request_user != 'exist') {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    }else if($request_user == 'exist'){
                        $arrResponse = array("status" => false, "msg" => 'El email o la identificacion ya existe');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No esposible almacenar los datos');
                    }

                } catch (\Throwable $th) {
                    $arrResponse = array("status" => false, "msg" => "No es posible relizar la insercion de datos");
                }
                
            }else{
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}

// hash("SHA256", $_POST['']) : hash("SHA256", passgeneratos())