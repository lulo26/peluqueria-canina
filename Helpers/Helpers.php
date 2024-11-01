<?php
/*
const M_DASHBOARD = 1;
const M_ROLES = 2;
const M_PERMISOS = 3;
const M_USUARIOS = 4;
const M_INFORMES = 5;
const M_VENTAS = 6;
const M_CATEGORIAS = 7;
const M_MASCOTAS = 8;
const M_CITAS = 9;
const M_SERVICIOS = 10;
const M_PRODUCTOS = 11;
const M_INVENTARIO = 12;

*/

const M_DASHBOARD = 1;
const M_ROLES = 2;
const M_PERMISOS = 3;
const M_USUARIOS = 4;
const M_INFORMES = 5;
const M_VENTAS = 6;
const M_CATEGORIAS = 7;
const M_MASCOTAS = 8;
const M_CITAS = 9;
const M_SERVICIOS = 10;
const M_PRODUCTOS = 11;
const M_INVENTARIO = 12;
const M_CLIENTES = 13;

function base_url(){
    return BASE_URL;
}

function media(){
    return BASE_URL."/Assets";
}

function header_admin($data = ""){
    $view_header = "Views/Template/header_admin.php";
    require_once ($view_header);
}

function footer_admin($data = ""){
    $view_footer = "Views/Template/footer_admin.php";
    require_once ($view_footer);
}

function dep($data){
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('<pre>');
    return $format;
}

function getModal(string $nameModal, $data){
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}

function getPermisos(int $idmodulo){
    require_once("Models/PermisosModel.php");
    $objPermisos = new PermisosModel();
    $idRol = $_SESSION['userData']['id_rol'];
    $arrPermisos = $objPermisos->permisosModulo($idRol);

    $permisos = '';
    $permisosMod = '';

    if (count($arrPermisos) > 0) {
        $permisos = $arrPermisos;
        $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    }

    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisosMod'] = $permisosMod;
}

//Elimina excesos de espacios entre palabras
function strClean($strCadena){
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR `1`=`1`',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("in NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace('LIKE `',"",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR `a`=`a","",$string);
    $string = str_ireplace("OR `a`=`a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $string;
}

function passGenerator($length = 10){
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $longitudCadena = strlen($cadena);
    for($i=1; $i<=$longitudPass; $i++){
        $pos = rand(0,$longitudCadena-1);
        $pass .= substr($cadena, $pos,1);
    }
    return $pass;
}


function check_post(array $postNames){

    $validState = true;
    foreach ($postNames as $value) {
        if (!isset($_POST[$value]) || empty(strClean($_POST[$value]))) {
            $validState = false;
        }
    }

    return $validState;
}

function check_file(array $fileName){
    $validState = true;
    foreach($fileName as $value){
        if ($_FILES[$value]['error'] == 4 || ($_FILES[$value]['size'] == 0 && $_FILES[$value]['error'] == 0)) {
            $validState = false;
        }
    }
    return $validState;
}

function save_image($fileName){
    $imagen = $_FILES[$fileName];
    $response = "";
    $directorio = 'Assets/img/uploded/';
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }
    $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    $nuevoNombreImagen = pathinfo($imagen['name'], PATHINFO_FILENAME) . '_' . date("Ymd_His") . '.' . $extension;
    $rutaArchivo = $directorio . $nuevoNombreImagen;
    if(move_uploaded_file($imagen['tmp_name'], $rutaArchivo)) {
        $response = $rutaArchivo;
    }

    return $response;
}

function tokenGenerator(){
    $completeToken = '';
    for($count = 1; $count <= 4; $count++){
        $token = bin2hex(random_bytes(10));
        $completeToken .= $token . '-';
    }
    return trim($completeToken, '-');
}

function formatMoney($cantidad){
    $cantidad = number_format($cantidad,2,SPD,SPM);
    return $cantidad;
}
