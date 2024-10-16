<!-- Modal Crear/Actualizar -->
<div class="modal fade" id="crearRolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearRolModalLabel">Crear Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmRoles" method="POST">
            <input type="hidden" id="idRol" name="idRol" value="0">
            <div class="form-group">
              <label for="nombreRol">Nombre del Rol</label>
              <input type="text" class="form-control" id="nombreRol" name="nombreRol" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="descripcionRol">Descripcion</label>
              <textarea class="form-control" name="descripcionRol" id="descripcionRol" autocomplete="off"></textarea>
            </div>

            <div class="form-group">
              <label for="estadoRol">Estado</label>
              <select name="estadoRol" id="estadoRol" class="form-control">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>