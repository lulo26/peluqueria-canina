<div class="modal fade" id="insertarServicios" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title">Registro de servicios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioServicios" method="post">

                        <input type="hidden" name="id_servicio" id="id_servicio" value="0">

                        <div class="form-group">
                            <label for="nombre ">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off">
                            <small id="small_nombre" class="form-text text-muted">Nombre con el que se va registrar.</small>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" autocomplete="off">
                            <small id="small_precio" class="form-text text-muted">Precio del servicio.</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" autocomplete="off">
                            <small id="small_descripcion" class="form-text text-muted">Descripción del servicio.</small>
                        </div>
                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
</div>