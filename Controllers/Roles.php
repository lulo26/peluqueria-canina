<?php 

class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function roles(){


        $data['page_title'] = "Roles";
        $data['page_name'] = "roles";
        $data['page_id_name'] = "roles";
        $this->views->getView($this,"roles", $data);
    }
}
