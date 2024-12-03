<?php

class CarritoModel extends Mysql{


public function selectProductosCarrito(int $id){
        $sql = "SELECT idCarrito, idInventario, nombreProducto, cantidadProducto, precio, codigoSKU, imagen_productos, cantidad_carrito FROM carrito INNER JOIN productos ON idInventario = productos_idProducto WHERE clientes_idCliente = $id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertarProdcutoCarrito(int $idCliente, int $idProducto, int $cantidad){
        $return = "";
        $isAdded = "";

        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;

        $sql = "SELECT idCarrito FROM carrito WHERE productos_idProducto = '{$this->id}'";
        $request = $this->select_all($sql);
        if(!empty($request)){
            $sql = "INSERT INTO carrito (clientes_idCliente, productos_idProducto, cantidad_carrito, fecha_carrito) VALUES (?, ?, ?, CURRENT_DATE())";
        $arrData = array($this->idCliente, $this->idProducto, $this->cantidad);
        $request_edit = $this->insert($sql, $arrData);
        $return = $request_edit;
        } else {
            $isAdded = "isAdded";
            $return = $isAdded;
        }
        return $return;

        
        
    }

    public function editarProductoCarrito(int $id, int $idCliente, int $idProducto, int $cantidad){
        $return = "";

        $this->id = $id;
        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;

        $sql = "SELECT idCarrito FROM carrito WHERE idCarrito = '{$this->id}'";
        $request = $this->select_all($sql);

        if(!empty($request)){
            $query = "UPDATE carrito SET clientes_idCliente = ?, productos_idProducto = ?, cantidad_carrito = ? WHERE idCarrito = ?";
            $arrData = array($this->idCliente, $this->idProducto, $this->cantidad, $this->id);
            $request_insert = $this->insert($query, $arrData);
            $return = $request_insert;
        } else {
            $return = "empty";
        }
        return $return;
    }

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