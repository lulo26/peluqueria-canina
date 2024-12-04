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
        $idCliente = intval(strClean($_POST['idUsuario']));
        $idProducto = intval(strClean($_POST['idProducto']));
        $cantidad = intval(strClean($_POST['cantidadProducto']));
        echo($idCliente);
        echo($idProducto);
        echo($cantidad);
        $arrPost = ['idUsuario','idProducto','cantidadProducto'];
        
        if (check_post($arrPost)) {
            $requestModel = $this->model->insertarProdcutoCarrito($idCliente, $idProducto, $cantidad);
            if($requestModel) {
                $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
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
