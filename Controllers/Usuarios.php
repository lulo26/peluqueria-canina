<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
        getPermisos(4); 
    }

    //Muestra la view principal de citas
    public function usuarios(){

        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }

        $data['page_title'] = "Usuarios";
        $data['page_id_name'] = "usuarios";
        $data['page_functions_js'] = "usuarios/usuarios.js";
 
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

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getUsuarios(){

        $arrData = $this->model->selectUsuarios();

        for($i = 0; $i < count($arrData); $i++){
            $btnView = '';
            $btnEdit = '';
            $btnDelete = '';

            if($arrData[$i]['status'] == 1){
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }

            if ($_SESSION['permisosMod']['r']) {
                $btnView = "<button type='button' class='btn btn-secondary btn-circle' data-action-type='viewUsuario' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-info'></i>
                </button>";
            }

            if ($_SESSION['permisosMod']['d']) {
                if ( ($_SESSION['idUser'] == 1 and $_SESSION['userData']['id_rol'] == 1) || 
                ($_SESSION['userData']['id_rol'] == 1 and $arrData[$i]['id_rol'] != 1) and
                 ($_SESSION['userData']['id_persona'] != $arrData[$i]['id_persona'])) {
                $btnDelete = "<button type='button' class='btn btn-danger btn-circle' data-action-type='delete' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-trash'></i>
                </button>";
                }else{
                    $btnDelete = "<button type='button' class='btn btn-danger btn-circle disabled'>
                    <i class='fas fa-trash'></i>
                    </button>";
                }
            }

            if ($_SESSION['permisosMod']['u']) {
                if ( ($_SESSION['idUser'] == 1 && $_SESSION['userData']['id_rol'] == 1) || 
                ($_SESSION['userData']['id_rol'] == 1 && $arrData[$i]['id_rol'] != 1)
                ) {
                    $btnEdit = "<button type='button' class='btn btn-primary btn-circle' data-action-type='update' data-id='".$arrData[$i]['id_persona']."'>
                    <i class='fas fa-pen'></i>
                    </button>";
                }else{
                    $btnEdit = "<button type='button' class='btn btn-primary btn-circle disabled'>
                    <i class='fas fa-pen'></i>
                    </button>";
                }
            }
            
            $arrData[$i]['options'] = $btnView . " " . $btnDelete . " " . $btnEdit;
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setUsuario(){
 
        if($_POST){

            $arrPost = ['txtIdentificacion','txtNombres','txtApellidos','txtEmail','txtTelefono','listRolId'];

            if (check_post($arrPost)) {
                
                $strIdUsuario = intval(strClean($_POST['idUsuario']));
                $strIdentificacion = strClean($_POST['txtIdentificacion']);
                $strNombre = ucwords(strClean($_POST['txtNombres']));
                $strApellido = ucwords(strClean($_POST['txtApellidos']));
                $intTelefono = intval($_POST['txtTelefono']);
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                $intTipoId = intval($_POST['listRolId']);
                $intStatus = strClean($_POST['listStatus']);
                //$strPassword = "123456";

                try {

                    if ($strIdUsuario == 0 || $strIdUsuario == "") {
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                        $requestModel = $this->model->insertarUsuario(
                            $strIdentificacion,
                            $strNombre,
                            $strApellido,
                            $intTelefono,
                            $strEmail,
                            $strPassword,
                            $intTipoId,
                            $intStatus
                        );
                        $option = 1;
                    }else{
                        $strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
                        $requestModel = $this->model->actualizarUsuario(
                            $strIdUsuario,
                            $strIdentificacion,
                            $strNombre,
                            $strApellido,
                            $intTelefono,
                            $strEmail,
                            $strPassword,
                            $intTipoId,
                            $intStatus
                        );
                        $option = 2;
                    }

                    if (intval($requestModel) > 0) {

                        if ($option === 1) {
                            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                        }
    
                        if ($option === 2) {
                            $arrResponse = array("status" => true, "msg" => 'Datos actualizados correctamente.');
                        }
                    }elseif($requestModel === 'exist'){
                        $arrResponse = array("status" => false, "msg" => 'El email o la identificacion ya existe');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No esposible almacenar los datos');
                    }

                } catch (\Throwable $th) {
                    $arrResponse = array("status" => false, "msg" => "Error al intentar ejecutar la consulta: ". $th);
                }
                
            }else{
                $arrResponse = array("status" => false, "msg" => 'Debe ingresar todos los datos.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            //dep($requestModel);
            die();
        }
    }

    public function deleteUsuario(){
        if ($_POST) {
            $intIdUsuario = intval($_POST['idUsuario']);
            $requestDelete = $this->model->eliminarUsuario($intIdUsuario);

            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

// hash("SHA256", $_POST['']) : hash("SHA256", passgeneratos())