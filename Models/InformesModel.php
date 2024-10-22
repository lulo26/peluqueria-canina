<?php

class InformesModel extends Mysql{
    public function __construct(){
    parent::__construct();
    }

    public function chartGroupRazas(){
        $sql = "SELECT COUNT(idMascotas) AS total, razaMascota AS agrupa FROM mascotas GROUP BY agrupa ORDER BY idMascotas ASC;";
        $request = $this->select_all($sql);
        $data = array();
        foreach($request as $row){
            $data[] = $row;
        }
        header('Content-Type: application/json');
 
        return $data;
    }
}
?>