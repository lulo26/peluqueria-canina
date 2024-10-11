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

            $array_validate=["user exist","email exist","both exist"];

            if ($requestModel>0 && !in_array($requestModel,$array_validate)) {
                $arrayResp= array('status'=>true,'msg'=>'Datos guardados correctamente');
            }elseif ($requestModel === 'user exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese usuario ya existe');
            }elseif ($requestModel==='email exist') {
                $arrayResp= array('status'=>false,'msg'=>'Ese email ya existe');
            }elseif ($requestModel==='both exist') {
                $arrayResp= array('status'=>false,'msg'=>'Email y nombre de usuario ya existentes');
            }else{
                $arrayResp= array('status'=>false,'msg'=>'No es posible registrar el cliente');
            }

        }else {
            $arrayResp= array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        }
        
        echo json_encode($arrayResp,JSON_UNESCAPED_UNICODE);
        die();
        
    }
}
