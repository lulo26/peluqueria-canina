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
            $idCliente = intval($idCliente);
            
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
        $correo = strtolower(strClean($_POST['correo']));
        $telefono = strClean($_POST['telefono']);
        $usuario = strClean($_POST['usuario']);
        $password = strClean($_POST['password']);
        $idCliente = intval($_POST['idCliente']);

        $arrayPost = ['nombre','apellido','correo','telefono','usuario','password'];

        if (check_post($arrayPost)) {

            if ($idCliente === 0 || $idCliente === "") {
                $requestModel= $this->model->insertarClientes($nombre,$apellido,$correo,$telefono,$usuario,$password);
                $action = "insert";

            } else {
                $requestModel= $this->model->actualizarCliente($nombre,$apellido,$correo,$telefono,$usuario,$password,$idCliente);
                $action = "update";
                
            }

            switch ($action) {
                case 'insert':
                    if (is_numeric($requestModel) && $requestModel>0) {
                        $arrayResp = array('status'=>true,'msg'=>'Registro completo');
                    }elseif ($requestModel == "exist") {
                        $arrayResp = array('status'=>false,'msg'=>'El campo usuario, teléfono o correo ya existen en el sistema.');
                    } else {
                        $arrayResp= array('status'=>false,'msg'=>'No se pudo registrar este cliente');
                    }
                    break;
                
                case 'update':

                    if ($requestModel === true ) {
                        $arrayResp = array('status'=>true,'msg'=>"Actualización completa");
                    }elseif ($requestModel === "exist") {
                        $arrayResp= array('status'=>false,'msg'=>'El campo usuario, teléfono o correo ya existen en el sistema.');
                    } else{
                        $arrayResp= array('status'=>false,'msg'=>'No se pudo actualizar este cliente');
                    }
                    break;

                default:
                    $arrayResp= array('status'=>false,'msg'=>'Accion no esperada');
                    break;
            }

        }else {
            $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
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
                $arrayResponse = array('status' => false, 'msg' => 'No se pudo eliminar el cliente.');
            }
            echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
        }else {
            print_r($_POST);
        }

        die();
    }
}
