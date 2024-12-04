<?php

class CarritoModel extends Mysql{


public function selectProductosCarrito(int $id){
        $sql = "SELECT idCarrito, idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos, cantidad_carrito FROM carrito INNER JOIN productos ON idInventario = productos_idProducto WHERE personas_idPersona = $id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertarProdcutoCarrito(int $idCliente, int $idProducto, int $cantidad){

        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;

        $sql = "INSERT INTO carrito (personas_idPersona, productos_idProducto, cantidad_carrito, fecha_carrito) VALUES (?, ?, ?, CURDATE())";
        $arrData = array($this->idCliente, $this->idProducto, $this->cantidad);
        return $this->insert($sql, $arrData);
    }

/*     public function insertarProdcutoCarrito(int $idCliente, int $idProducto, int $cantidad){
        $return = "";
        $isAdded = "";

        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;

        $sql = "SELECT idCarrito FROM carrito WHERE productos_idProducto = '{$this->idCliente}'";
        $request = $this->select_all($sql);
        if(!empty($request)){
            $sql = "INSERT INTO carrito (idCarrito, personas_idPersona, productos_idProducto, cantidad_carrito, fecha_carrito) VALUES (?, ?, ?, ?, CURRENT_DATE())";
        $arrData = array($this->idCliente, $this->idCliente, $this->idProducto, $this->cantidad);
        $request_edit = $this->insert($sql, $arrData);
        $return = $request_edit;
        } else {
            $isAdded = "isAdded";
            $return = $isAdded;
        }
        return $return;
    } */

    /* public function editarProductoCarrito(int $idCliente, int $idProducto, int $cantidad){
        $return = "";

        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;

        $sql = "SELECT idCarrito FROM carrito WHERE idCarrito = '{$this->idCliente}'";
        $request = $this->select_all($sql);

        if(!empty($request)){
            $query = "UPDATE carrito SET clientes_idCliente = ?, productos_idProducto = ?, cantidad_carrito = ?, fecha_carrito = CURRENT_DATE() WHERE idCarrito = ?";
            $arrData = array($this->idCliente, $this->idProducto, $this->cantidad, $this->idCliente);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    } */

    public function deleteProductoCarrito(int $id){
        $return = "";

        $this->id = $id;

        $sql = "SELECT idCarrito FROM carrito WHERE idCarrito = '{$this->id}'";
        $request = $this->select_all($sql);
        if(!empty($request)){
            $query = "DELETE FROM carrito WHERE idCarrito = ?";
            $arrData = array($this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    }
}