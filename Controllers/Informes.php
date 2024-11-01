<?php

class Informes extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start(); 
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }
        getPermisos(5);
    }

    //Muestra la view principal de citas
    public function informes(){

        $data['page_title'] = "Informes y estadísticas";
        $data['page_id_name'] = "informes";
        $data['page_functions_js'] = "informes/informes.js";
 
        $this->views->getView($this,"informes", $data);
    }

    public function getCharts(){
        $arrData = $this->model->chartGroupRazas();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }
}
