<?php 

class Carrito extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
        getPermisos(M_CARRITO);
    }

    public function carrito(){
        $data['page_title'] = "Página carrito";
        $data['page_name'] = "carrito";
        $data['page_id_name'] = "carrito";
        $data['page_tag'] = "carrito";
        $data['page_functions_js'] = "tienda/carrito.js";
        $this->views->getView($this, "carrito", $data);
    }

    public function listarCarrito($id){
        $intId = intval(strClean($id));
        $arrData = $this->model->selectProductosCarrito($id);
        for ($i=0; $i < count($arrData); $i++) { 
            $btnDelete = "<button type='button' class='btn btn-danger' data-action-type='delete' rel='".$arrData[$i]['idCarrito']."'>
                <i class='bi-trash-fill'></i>
                </button>";
                $arrData[$i]['delete'] = $btnDelete;
        }
        
        $data = json_encode($arrData, JSON_UNESCAPED_UNICODE);
        echo $data;
    }

    public function setProductoCarrito(){
        $idCliente = intval(strClean($_POST['clientes_idCliente']));
        $idProducto = intval(strClean($_POST['productos_idProducto']));
        $cantidad = strClean($_POST['cantidad_carrito']);
        $idCarrito = strClean($_POST['idCarrito']);

        
        $arrPost = ['clientes_idCliente','productos_idProducto','cantidad_carrito'];
        if (check_post($arrPost)) {
            $requestTruth = $this->model->insertarProdcutoCarrito($idCliente, $idProducto, $cantidad);
            if ($idCliente == 0 || $idCliente == "" || $requestTruth != "isAdded"){
                $requestModel = $this->model->insertarProdcutoCarrito($idCliente, $idProducto, $cantidad);
                $option = 1;
            } else {
                $requestModel = $this->model->editarProductoCarrito($idCarrito ,$idCliente, $idProducto, $cantidad);
                $option = 2;
            }
           // echo($option);
            if($requestModel > 0) {
                if($option === 1){
                $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }
            }else{
                $arrRespuesta = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
        }else{
            $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos');
        }
        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminarProductoCarrito(){
        if ($_POST) {
            $idCarrito = intval($_POST['idCarrito']);
            $requestDelete = $this->model->deleteProductoCarrito($idCarrito);
            if($requestDelete == 'empty'){
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la mascota.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado la mascota.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }else{
            print_r($_POST);
        }
        die();
    }
}
