<?php

class InventarioModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectProductos(){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertarProducto(string $nombreProducto, int $precioProducto, string $codigoProducto){
        $return = "";

        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;

        $sql = "SELECT * FROM productos WHERE nombreProducto = '{$this->nombreProducto}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO productos(nombreProducto, cantidadProducto, estado, precio, codigoSKU) VALUES(?, ?, ?, ?, ?)";
            $arrData = array($this->nombreProducto, 0, 1, $this->precioProducto, $this->codigoProducto);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else {
            $return = "exist";
        }
        return $return;
    }

    public function deleteProducto(int $idProducto){
        $this->intIdProducto = $idProducto;
        $sql = "UPDATE productos SET estado = ? WHERE idInventario = $this->intIdProducto";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        if($request){
            $request = 'ok';
        }else{
            $request = 'error';
        }

        return $request;
    }
}