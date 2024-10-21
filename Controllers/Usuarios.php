<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function usuarios(){

        $data['page_title'] = "Usuarios";
        $data['page_id_name'] = "usuarios";
 
        $this->views->getView($this,"usuarios", $data);
    }

    public function setUsuario(){
 
        if($_POST){
            $identificacion = $_POST['txtIdentificacion'];
            $nombre = $_POST['txtNombres'];
            $apellido = $_POST['txtApellidos'];
            $email = $_POST['txtEmail'];
            $telefono = $_POST['txtTelefono'];
            $tipoUsuario = $_POST['listRolId'];
            $password = $_POST['txtPassword'];

            $arrPost = ['txtIdentificacion','txtNombres','txtApellidos','txtEmail','txtTelefono','listRolId','txtPassword'];

            if (check_post($arrPost)) {
                
            }
        }
    }
}

// hash("SHA256", $_POST['']) : hash("SHA256", passgeneratos())