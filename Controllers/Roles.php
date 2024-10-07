<?php

class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function roles(){
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles de usuario";
        $data['page_title'] = "Roles de usuario";
        $data['page_name'] = "roles_usuario";
        $data['page_content'] = "";
        $this->views->getView($this,"roles", $data);
    }

    public function getRoles(){
        $arrData = $this->model->selectRoles();


        for($i = 0; $i < count($arrData); $i++){
            if($arrData[$i]['status'] == 1){
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $arrData[$i]['options'] = "
            <button class='dropbtn btn-secondary' onclick='btnDropdown(\"action".$i."\")'></button>

            <div id='action".$i."' class='dropdown-content'>
                <a class='btnPermisosRol' rel='".$arrData[$i]['id_rol']."'>
                    <span class='icon'><i class='fa-solid fa-user-check'></i></span>
                    <span class='title'>Permisos</span>
                </a>
                <a class='btnEditRol' rel='".$arrData[$i]['id_rol']."'>
                    <span class='icon'><i class='fa-solid fa-pen'></i></span>
                    <span class='title'>Editar</span>
                </a>
                <a class='btnDelRol' rel='".$arrData[$i]['id_rol']."'>
                    <span class='icon'><i class='fa-solid fa-trash'></i></span>
                    <span class='title'>Eliminar</span>
                </a>
            </div>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRol(int $id_rol){
        $intIdRol = intval(strClean($id_rol));
        if($intIdRol > 0){
    
            $arrData = $this->model->selectRol($intIdRol);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
                }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setRol(){
        $intIdRol = intval($_POST['idRol']);
        $strRol = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intval($_POST['listStatus']);

        if($intIdRol == 0 || $intIdRol == ""){
            //crear
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateRol($intIdRol, $strRol, $strDescripcion, $intStatus);
            $option = 2;
        }

        if($request_rol > 0){

            if($option == 1){
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }

        }else if($request_rol == 'exist'){
            $arrResponse = array('status' => false, 'msg' => 'Atención: El Rol ya existe');

        }else{
            $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
        }
        
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delRol(){
        if($_POST){
            $intIdrol = intval($_POST['idrol']);
            $requestDelete = $this->model->deleteRol($intIdrol);
            if($requestDelete == 'ok'){
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado el rol.');
            }else if($requestDelete == 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asociado a usuarios.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el rol.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

}