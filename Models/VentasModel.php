<?php

class VentasModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function selectPaymentMethods(){
        $sql = "SELECT * from metodos_pago";
        $request = $this->select_all($sql);
        return $request;
    }

}