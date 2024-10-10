<?php

class InventarioModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectProductos(){
        $sql = "SELECT * FROM productos";
        $request = $this->select_all($sql);
        return $request;    
    }

    public function insertarProducto(string $nombreProducto, string $estadoProducto, int $precioProducto, string $codigoProducto){
        $return = "";

        $this->nombreProducto = $nombreProducto;
        $this->estadoProducto = $estadoProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;

        $sql = "SELECT nombreProducto, cantidadProducto, estado, precio, codigoSKU FROM productos WHERE nombreProducto = '{$this->nombreProducto}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO productos(nombreProducto, cantidadProducto, estado, precio, codigoSKU) VALUES(?, ?, ?, ?, ?)";
            $arrData = array($this->nombreProducto, 0, $this->estadoProducto, $this->precioProducto, $this->codigoProducto);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else {
            $return = "exist";
        }
        return $return;
    }
}