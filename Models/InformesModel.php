<?php

class InformesModel extends mysqli{
    public function __construct(){
    parent::__construct();
    }

    public function chartGroupRazas(){
        $sql = "SELECT COUNT(mascotas.idMascotas) AS total, mascotas.razaMascota AS agrupa FROM mascotas GROUP BY agrupa;";
        $request = $this->select_all($sql);
        $data = array();
        foreach($request as $row){
            $data[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        return $data;
    }
}
?>