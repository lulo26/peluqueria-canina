<?php

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function inventario(){


        $data['page_title'] = "Inventario del producto";
        $data['page_name'] = "inventario";
        $data['page_id_name'] = "inventario";
        $data['page_functions_js'] = "inventario/inventario.js";
        $this->views->getView($this,"inventario", $data);
    }
}