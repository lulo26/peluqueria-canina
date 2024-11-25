<?php

class ProductosModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectProductos(){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectProductoByCode(string $code){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, idInventario FROM productos WHERE codigoSKU = '{$code}' AND estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectProducto(int $id){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU FROM productos WHERE idInventario = $id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function traerProductos(){

        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;

    }

    public function insertarProducto(string $nombreProducto, int $precioProducto, string $codigoProducto, string $imagenProducto){
        $return = "";

        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;
        $this->imagenProducto = $imagenProducto;

        $sql = "SELECT * FROM productos WHERE nombreProducto = '{$this->nombreProducto}' OR codigoSKU = '{$this->codigoProducto}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO productos(nombreProducto, cantidadProducto, estado, precio, codigoSKU, imagen_productos) VALUES(?, ?, ?, ?, ?, ?)";
            $arrData = array($this->nombreProducto, 0, 1, $this->precioProducto, $this->codigoProducto, $this->imagenProducto);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else {
            $return = "exist";
        }
        return $return;
    }

    public function actualizarProducto(int $idProducto, string $nombreProducto, int $precioProducto, string $codigoProducto, string $imagenProducto){
        $return = "";

        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;
        $this->imagenProducto = $imagenProducto;
// SELECT * FROM productos WHERE idInventario != 2 AND (nombreProducto = 'perro' OR codigoSKU = '001-001-002');
        $sql = "SELECT * FROM productos WHERE idInventario != {$this->idProducto} AND (nombreProducto = '{$this->nombreProducto}' OR codigoSKU = '{$this->codigoProducto}')";
        $request = $this->select_all($sql);
        //$request;

        if (empty($request)) {
            $query_insert = "UPDATE productos SET nombreProducto = ?, estado = ?, precio = ?, codigoSKU = ?, imagen_productos = ? WHERE idInventario = $this->idProducto";
            $arrData = array($this->nombreProducto, 1, $this->precioProducto, $this->codigoProducto, $this->imagenProducto);
            $request_insert = $this->update($query_insert, $arrData);
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