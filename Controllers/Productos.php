<?php 

//TODO:: REVISAR VALIDACION, REGLAS SUGERIDAS PARA ELIMINAR Y ACTUALIZAR PRODUCTO SEGÚN CODIGO O NOMBRE

class Productos extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
    }

    //Muestra la view principal de citas
    public function productos(){

        $data['page_title'] = "Productos";
        $data['page_id_name'] = "productos";
        $data['page_functions_js'] = "productos/productos.js";
 
        $this->views->getView($this,"productos", $data);
    }

    public function getProductos(){
        $arrData = $this->model->selectProductos();

        for($i = 0; $i < count($arrData); $i++){
            
            $arrData[$i]['options'] = "

                <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' data-action-type='update' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function traerProductos(){
        try{
            $arrData = $this->model->traerProductos();

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

    public function getProductSale(){

        $arrData = $this->model->traerProductos();

        for($i = 0; $i < count($arrData);$i++){
            $arrData[$i]['action'] = '<button id="btnAgregarProducto" data-action-sku="'. $arrData[$i]['codigoSKU'] .'" data-action-type="AddProduct" type="button" class="btn btn-primary">Agregar</button>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function getProducto($idProducto){

        $intIdProducto = intval(strClean($idProducto));

        if($intIdProducto > 0){
    
            $arrData = $this->model->selectProducto($intIdProducto);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error: tipo de dato no valido');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getProductoByCode($code){

        $strCode = strClean($code);

        if(!empty($strCode)){
    
            $arrData = $this->model->selectProductoByCode($strCode);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error: tipo de dato no valido');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setProducto(){
        $nombreProducto = strClean($_POST['nombreProducto']);
        $precioProducto = intval($_POST['precioProducto']);
        $codigoProducto = strClean($_POST['codigoProducto']);
        $idProducto = intval(strClean($_POST['idProducto']));
        $imagen = $_FILES['imgProducto'];
        $rutaImagen = "";

        $arrPost = ['nombreProducto','precioProducto','codigoProducto'];
        $arrImagen = array('imgProducto');

        if (check_post($arrPost)) {

            if (check_file($arrImagen)) {
                $rutaImagen = save_image('imgProducto');
            }

            if ($idProducto == 0 || $idProducto == "") {
                $requestModel = $this->model->insertarProducto($nombreProducto, $precioProducto, $codigoProducto, $rutaImagen);
                $option = 1;
            }else{
                $requestModel = $this->model->actualizarProducto($idProducto, $nombreProducto, $precioProducto, $codigoProducto, $rutaImagen);
                $option = 2;
            }
            
            if (intval($requestModel) > 0){
                if ($option === 1) {

                    $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente, ');   
                }else{
                    $arrRespuesta = array('status' => true, 'msg' => 'Datos actualizados correctamente.'); 
                }
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
            $idProducto = intval($_POST['idProducto']);
            $requestDelete = $this->model->deleteProducto($idProducto);
            if($requestDelete == 'ok'){
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado el producto.');
            }else if($requestDelete == 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un producto asociado a una factura.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }else{
            //print_r($_POST);
        }
        die();
    }
}
