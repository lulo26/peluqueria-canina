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

    public function selectVentas(){
        $sql = "
            SELECT v.idVentas, v.fecha, c.nombre, p.nombres, v.total 
            FROM ventas v
            INNER JOIN clientes c ON
            c.idClientes = v.clientes_idClientes
            INNER JOIN personas p ON
            p.id_persona = v.empleados_idEmpleados
            WHERE v.status > 0;
        ";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectLastVentaId($fecha){
        $this->fecha = $fecha;
        $sql = "SELECT idVentas FROM ventas WHERE fecha = '{$this->fecha}'";
        $request = $this->select($sql);
        return $request;
    }

    public function insertVenta($fecha, $total, $clientes_id, $empleados_id){
        $this->fecha = $fecha;
        $this->total = $total;
        $this->clientes_id = $clientes_id;
        $this->empleados_id = $empleados_id;
        $sql = "INSERT INTO ventas(fecha, total, clientes_idClientes, empleados_idEmpleados, status) VALUES(?,?,?,?,?)";
        $arrData = array($this->fecha, $this->total, $this->clientes_id, $this->empleados_id, 1);
        $request_insert = $this->insert($sql, $arrData);

        return $request_insert;
    }

    public function insertVentaProductos($venta_id, $productos_id, $cantidad){
        $this->venta_id = $venta_id;
        $this->productos_id = $productos_id;
        $this->cantidad = $cantidad;

        $sql = "INSERT INTO ventas_has_productos(ventas_id, productos_id, cantidad) VALUES(?,?,?)";
        $arrData = array($this->venta_id, $this->productos_id, $this->cantidad);
        $request_insert = $this->insert($sql, $arrData);

        return $request_insert;
        
    }

    public function insertVentaMetodosPago($metodo_pago, $ventas_id){
        $this->ventas_id = $ventas_id;
        $this->metodo_pago = $metodo_pago;

        $sql = "INSERT INTO ventas_has_metodos_pago(metodos_pago_id,ventas_id) VALUES(?,?)";
        $arrData = array($this->metodo_pago, $this->ventas_id);
        $request_insert = $this->insert($sql, $arrData);

        return $request_insert;
    }
}