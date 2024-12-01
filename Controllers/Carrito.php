<?php 

class Carrito extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function carrito(){

        $data['page_id_name'] = "Carrito";
        $data['page_title'] = "Carrito";
        $data['page_functions_js'] = "carrito/carrito.js";
 
        $this->views->getView($this,"carrito", $data);
    }

    /*public function productosCarrito($id){
        $data['page_functions_js'] = "carrito/carrito.js";
        $intId = intval(strClean($id));
        $data = $this->model->selectProducto($id);
        $this->views->getView($this, "carrito", $data);
    }*/

    public function listarCarrito(){
        $arrData = $this->model->selectProductos();
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'datos no encontrados');
        }else{
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        $data = json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        echo $data;
    }
}