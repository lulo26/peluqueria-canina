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

    public function getUsuario($idUsuario){
        $intIdUsuario = intval(strClean($idUsuario));

        if ($intIdUsuario > 0) {
            $arrData = $this->model->selectUserById($intIdUsuario);
            if (!empty($arrData)) {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getUsuarios(){

        $arrData = $this->model->selectUsuarios();

        for($i = 0; $i < count($arrData); $i++){

            if($arrData[$i]['status'] == 1){
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $arrData[$i]['options'] = "

                <button type='button' class='btn btn-secondary btn-circle' data-action-type='viewUsuario' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-info'></i>
                </button>
                <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' data-action-type='update' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
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