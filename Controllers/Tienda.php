<?php

class Tienda extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function tienda()
    {


        $data['page_title'] = "Página Tienda";
        $data['page_name'] = "tienda";
        $data['page_id_name'] = "tienda";
        $data['page_tag'] = "Tiendita :3";
        $this->views->getView($this, "tienda", $data);
    }

    public function productoTienda($id){
        $intId = intval(strClean($id));
        $arrData = $this->model->selectProducto($intId);
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'datos no encontrados');
        }else{
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        $data = json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        echo $data;
        //$this->views->getView($this, "productoTienda", $data);
    }
}
