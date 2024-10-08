<?php 

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function inventario(){

        $data['page_title'] = "Inventario de productos";
        $data['page_id_name'] = "inventario";
 
        $this->views->getView($this,"inventario", $data);
    }

    public function getProductos(){
        $arrData = $this->model->selectProductos();

        for($i = 0; $i < count($arrData); $i++){
/*             if($arrData[$i]['status'] == 1){
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            } */
            
            $arrData[$i]['options'] = "

                <button type='button' class='btn btn-danger btn-circle' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setProducto(){
        $nombreProducto = strClean($_POST['nombreProducto']);
        $estadoProducto = strClean($_POST['estadoProducto']);
        $precioProducto = intval($_POST['precioProducto']);
        $codigoProducto = strClean($_POST['codigoProducto']);

        $arrPost = ['nombreProducto','estadoProducto','precioProducto','codigoProducto'];
        
        if (check_post($arrPost)) {
            $requestModel = $this->model->insertarProducto($nombreProducto, $estadoProducto, $precioProducto, $codigoProducto);
             
            if ($requestModel > 0) {
                $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }elseif ($requestModel == 'exist') {
                $arrRespuesta = array('status' => false, 'msg' => 'Atención: El producto ya existe');
            }else{
                $arrRespuesta = array('status' => false, 'msg' => 'No es posible registrar el producto');
            }  
        }else{
            $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos');
        }

        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function eliminarProducto(){
        if ($_POST) {
            $idProducto = intval($_POST['idInventario']);
            $requestDelete = $this->model->deleteProducto($idProducto);
            if($requestDelete == 'ok'){
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado el producto.');
            }else if($requestDelete == 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un producto asociado a una factura.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
