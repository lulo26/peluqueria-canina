<?php

class TiendaModel extends Mysql{

    public function selectProducto(int $id){
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos FROM productos WHERE idInventario = $id";
        $request = $this->select_all($sql);
        return $request;
    }

}