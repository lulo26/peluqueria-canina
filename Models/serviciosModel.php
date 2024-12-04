<?php 


class ServiciosModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function selectServicios(){
        $sql="SELECT * FROM servicios where estado_servicio = 1 ";
        $request_select = $this->select_all($sql);
        return $request_select;
    }

    public function selectServicioById(int $id){
        $sql="SELECT * from servicios where id_servicio = $id";

        $request_select = $this->select_all($sql);

        return $request_select;
    }

    public function insertarServicios(string $nombre, string $precio, string $descripcion){

        $result="";

        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->descripcion=$descripcion;


        $sql="SELECT * from servicios Where nombre_servicio='{$this->nombre}'";

        $request=$this->select_all($sql);

        if (empty($request)) {

            $query_insert = "INSERT INTO servicios(nombre_servicio,precio_servicio,descripcion_servicio,estado_servicio) VALUES(?, ?, ?, ?)";

            $arrData = array($this->nombre,$this->precio,$this->descripcion,1);

            $request_insert = $this->insert($query_insert, $arrData);
            $result = $request_insert;
            
        }else {

            $result="exist";

        }

        return $result;
        
    }

    public function actualizarServicios(string $nombre, string $precio, string $descripcion, int $id_servicio){

        $result="";

        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->descripcion=$descripcion;
        $this->id_servicio=$id_servicio;


        $sql="SELECT * from servicios Where nombre_servicio='{$this->nombre}' and id_servicio != {$this->id_servicio}";

        $request=$this->select_all($sql);

        if (empty($request)) {

            $query_update = "UPDATE servicios set nombre_servicio= ?,precio_servicio= ?,descripcion_servicio= ?,estado_servicio= ? WHERE id_servicio = ? ";

            $arrData = array($this->nombre,$this->precio,$this->descripcion,1,$this->id_servicio);

            $request_update = $this->update($query_update, $arrData);
            $result = $request_update;
            
        }else {

            $result="exist";

        }

        return $result;
        
    }

    public function deleteServicio(int $id_servicio){
        $this->id_servicio = $id_servicio;

        $sql="UPDATE servicios SET estado_servicio=? where id_servicio = $this->id_servicio";

        $arrayData= array(0);

        $requestDelete = $this->update($sql,$arrayData);
        
        if ($requestDelete) {
            $requestDelete="ok";
        }

        return $requestDelete;
    }

    public function deleteCitasWithService(int $id_servicio){
        $this->id_servicio = $id_servicio;
        $sql = "DELETE from citas_has_servicios
        where citas_has_servicios.servicios_id_servicio = $this->id_servicio";

        $requestDelete = $this->delete($sql);

        if ($requestDelete) {
            $requestDelete =  "ok";
        }

        return $requestDelete;

    }

}