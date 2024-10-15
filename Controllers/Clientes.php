<?php 

class Clientes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function clientes(){

        $data['page_id_name'] = "clientes";
        $data['page_title'] = "Clientes";
 
        $this->views->getView($this,"clientes", $data);
    }

    public function getClientes(){
        $clientes = $this->model->selectClientes();

        for ($i=0; $i <count($clientes) ; $i++) { 
            $clientes[$i]['options'] = "

                <button type='button' class='btn btn-danger btn-circle' id='btnEliminar' data-action-type='delete' rel='".$clientes[$i]['idClientes']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' id='btnEditar'  data-action-type='update' rel='".$clientes[$i]['idClientes']."'>
                    <i class='fas fa-pen'></i>
                </button>
            
            ";
        }

        echo json_encode($clientes, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getClienteById($idCliente){
            $idCliente = intval(strClean($idCliente));
            
            $arrCliente = $this->model->selectClienteById($idCliente);

            if(empty($arrCliente)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrCliente);
            }
        
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setClientes(){
        $nombre = strClean($_POST['nombre']);
        $apellido = strClean($_POST['apellido']);
        $correo = $_POST['correo'];
        $telefono = strClean($_POST['telefono']);
        $usuario = strClean($_POST['usuario']);
        $password = strClean($_POST['password']);
        $idCliente = intval(strClean($_POST['idCliente']));

        $arrayPost = ['nombre','apellido','correo','telefono','usuario','password'];

        if (check_post($arrayPost)) {

            if ($idCliente === 0 || $idCliente === "") {
                $requestModel= $this->model->insertarClientes($nombre,$apellido,$correo,$telefono,$usuario,$password);
                $action = "insert";
            } else {
                $requestModel= $this->model->actualizarCliente($nombre,$apellido,$correo,$telefono,$usuario,$password,$idCliente);
                $action = "update";
            }
            
            $array_validate=["user exist","email exist","all exist"];

            if ($requestModel>0 && !in_array($requestModel,$array_validate)) {

                if ($action==="insert") {
                    $arrayResp= array('status'=>true,'msg'=>'Datos guardados correctamente');
                } else {
                    $arrayResp= array('status'=>true,'msg'=>'Datos actualizados correctamente');
                }
                     
            }elseif ($requestModel === 'user exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese usuario ya existe.');
            }elseif ($requestModel==='email exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese email ya existe.');
            }elseif ($requestModel==='all exist') {
                $arrayResp= array('status'=>false,'msg'=>'Email y nombre de usuario ya existentes.');
            }else{
                $arrayResp= array('status'=>false,'msg'=>'No es posible registrar el cliente.');
            }

        }else {
            $arrayResp= array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        }
        
        echo json_encode($arrayResp,JSON_UNESCAPED_UNICODE);
        die();
        
    }

    public function deleteClientes(){
        if ($_POST) {
            $idCliente = intval($_POST['idClientes']);
            $requestDelete = $this->model->borrarClientes($idCliente);
            
            if ($requestDelete=='ok') {
                $arrayResponse = array('status' => true, 'msg' => 'Cliente eliminado correctamente.');
            }else{
                $arrayResponse = array('status' => true, 'msg' => 'No se pudo eliminar el cliente.');
            }
            echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
        }else {
            print_r($_POST);
        }

        die();
    }
}
