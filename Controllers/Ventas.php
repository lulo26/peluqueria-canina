<?php 

class Ventas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/dashboard' );
        }
        getPermisos(M_VENTAS);
    }

    //Muestra la view principal de ventas
    public function ventas(){

        if (empty($_SESSION['permisosMod']['r'])){
            header('Location: ' . base_url());
        }

        $data['page_title'] = "Ventas";
        $data['page_id_name'] = "ventas";
        $data['page_functions_js'] = "ventas/ventas.js";
 
        $this->views->getView($this,"ventas", $data);
    }

    public function ultimaVenta($fecha){
        $ventaId = $this->model->selectLastVentaId($fecha);
        dep($ventaId['idVentas']);
    }

    public function getVentas(){
        $arrData = $this->model->selectVentas();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setVenta(){
        $checkStatus = true;

        $arrPost = ['cliente', 'totalBill'];

        if (isset($_POST['producto']) && isset($_POST['metodoPago'])) {
            foreach ($_POST['producto'] as $key => $value){
                if (empty($value) || !isset($value)) {
                    $checkStatus = false;
                    break;
                }
            }

            foreach ($_POST['metodoPago'] as $key => $value){
                if (empty($value) || !isset($value)) {
                    $checkStatus = false;
                    break;
                }
            }
        }else{
            $checkStatus = false;
        }

        if (check_post($arrPost) && $checkStatus) {
            //OK
            $intIdCliente = intval(strClean($_POST['cliente']));
            $productos = $_POST['producto'];
            $metodoPago = $_POST['metodoPago'];
            $idUsuario = $_SESSION['userData']['id_persona'];
            $fecha = date("Y-m-d H:i:s");
            $intTotal = intval(strClean($_POST['totalBill']));
            $statusProducts = true;
            $statusMetodos = true;

            $res = $this->model->insertVenta($fecha, $intTotal, $intIdCliente, $idUsuario);

            if ($res) {
                $ventaId = $this->model->selectLastVentaId($fecha);
                $ventaId = intval($ventaId['idVentas']);

                foreach ($productos as $key => $value) {
                    $key = intval(trim($key, "'"));
                    $status = $this->model->insertVentaProductos($ventaId, $key, intval($value));
                }

                foreach ($metodoPago as $key => $value) {
                    $status = $this->model->insertVentaMetodosPago(intval($value), intval($ventaId));
                }

                $arrRespuesta = array('status' => true, 'msg' => 'Venta registrada');
            }else{
                $arrRespuesta = array('status' => false, 'msg' => 'Problema al registrar la venta');
            }

        }else{
            $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos requeridos');
        }

        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getPaymentMethods(){
        try{
            $arrData = $this->model->selectPaymentMethods();

            if (!empty($arrData)) {
                $arrRespuesta = array('status' => true, 'data' => $arrData);
            }else{
                $arrRespuesta = array('status' => false, 'msg' => 'No se encontraron datos');
            }
        }catch(Exception $e){
            $arrRespuesta = array('status' => false, 'msg' => 'Error desconocido');
        }

        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
}
