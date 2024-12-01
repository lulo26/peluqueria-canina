<?php

class CarritoModel extends Mysql{


public function selectProductos(){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }
}