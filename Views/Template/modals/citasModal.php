<div class="modal fade" id="insertarCitas" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title">Agendar cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioCitas" method="post">

                        <input type="hidden" name="id_cita" id="id_cita" value="0">

                        <div class="form-group">
                            <label for="fecha_inicio">Fecha inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" autocomplete="off">
                            <small class="form-text text-muted">Fecha inicial de su cita.</small>
                        </div>
                        <div class="form-group">
                            <label for="fecha_final">Fecha finalización</label>
                            <input type="date" class="form-control" id="fecha_final" name="fecha_final" autocomplete="off">
                            <small class="form-text text-muted">Fecha final de su cita.</small>
                        </div>
                        <div class="form-group">
                            <label for="lugar_cita">Lugar</label>
                            <input type="text" class="form-control" id="lugar_cita" name="lugar_cita" autocomplete="off">
                            <small class="form-text text-muted">Lugar donde tiene que acudir.</small>
                        </div>

                        <div class="form-group">
                            <span>Servicios</span>
                        </div>
                        <div class="form-check" id="checkbox-servicios">
                            
                            
                        </div>

                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select class="custom-select" name="cliente" id="cliente_select"></select>
                            <small class="form-text text-muted">Cliente quien está reservando una cita.</small>
                        </div>

                        <div class="form-group">
                            <label for="empleado_select">Empleado</label>
                            <select class="custom-select" name="empleado" id="empleado_select"></select>
                            <small class="form-text text-muted">Empleado quien va atender al dueño de esta cita.</small>
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