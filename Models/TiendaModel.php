<?php

class TiendaModel extends Mysql{

    public function selectProducto(int $id){
        $this->intId = $id;
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE idInventario = $this->intId";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectProductos(){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectProductosLimit(){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE estado = 1 LIMIT 4";
        $request = $this->select_all($sql);
        return $request;
    }


}