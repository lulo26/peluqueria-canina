<?php

class Categorias extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function categorias(){


        $data['page_title'] = "Categorias del producto";
        $data['page_name'] = "Categorias";
        $data['page_id_name'] = "categorias";
        $data['page_functions_js'] = "categorias/categorias.js";
        $this->views->getView($this,"categorias", $data);
    }
}