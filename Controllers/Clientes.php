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

    public function setClientes(){
        $nombre = strClean($_POST['nombre']);
        $apellido = strClean($_POST['apellido']);
        $correo = $_POST['correo'];
        $telefono = strClean($_POST['telefono']);
        $usuario = strClean($_POST['usuario']);
        $password = strClean($_POST['password']);

        $arrayPost = ['nombre','apellido','correo','telefono','usuario','password'];

        if (check_post($arrayPost)) {
            $requestModel= $this->model->insertarClientes($nombre,$apellido,$correo,$telefono,$usuario,$password);

            if ($requestModel>0 && $requestModel != 'exist') {
                $arrayResp= array('status'=>true,'msg'=>'Datos guardados correctamente');
            }elseif ($requestModel === 'exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese usuario ya existe');
            }/* elseif ($requestModel=='email exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese email ya existe');
            } */else{
                $arrayResp= array('status'=>false,'msg'=>'No es posible registrar el cliente');
            }

        }else {
            $arrayResp= array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        }
        
        echo json_encode($arrayResp,JSON_UNESCAPED_UNICODE);
        die();
        
    }
}
