<?php

class InformesModel extends Mysql{
    public function __construct(){
    parent::__construct();
    }

    public function chartGroupRazas(){
        $sql = "SELECT COUNT(idMascotas) AS total, nombreRaza AS agrupa FROM mascotas INNER JOIN razas_mascota ON idRaza = raza_idraza GROUP BY agrupa;";
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