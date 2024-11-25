<?php 

class Ventas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/dashboard' );
        }
        getPermisos(M_VENTAS);
    }

    //Muestra la view principal de ventas
    public function ventas(){

        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }

        $data['page_title'] = "Ventas";
        $data['page_id_name'] = "ventas";
        $data['page_functions_js'] = "ventas/ventas.js";
 
        $this->views->getView($this,"ventas", $data);
    }

    public function getPaymentMethods(){
        try{
            $arrData = $this->model->selectPaymentMethods();

            if (!empty($arrData)) {
                $arrRespuesta = array('status' => true, 'data' => $arrData);
            }else{
                $arrRespuesta = array('status' => false, 'msg' => 'No se encontraron datos');
            }
        }catch(Exception $e){
            $arrRespuesta = array('status' => false, 'msg' => 'Error desconocido');
        }

        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
}
