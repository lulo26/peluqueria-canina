<?php

class Tienda extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Tienda()
    {


        $data['page_title'] = "Página Tienda";
        $data['page_name'] = "tienda";
        $data['page_id_name'] = "tienda";
        $data['page_tag'] = "Tiendita :3";
        $this->views->getView($this, "tienda", $data);
    }
}
