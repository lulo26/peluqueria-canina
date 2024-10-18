<!-- Modal Crear/Actualizar -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearRolModalLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmUsuarios" method="POST">
            <input type="hidden" id="idUsuario" name="idUsuario" value="0">
            <span>Todos los campos son obligatorios</span>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtIdentificacion">Identificacion</label>
                <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="txtNombres">Nombres</label>
                <input type="text" class="form-control" id="txtNombres" name="txtNombres" autocomplete="off" required="">
              </div>
              <div class="form-group">
                <label for="txtApellidos">Apellidos</label>
                <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="txtTelefono">Teléfono</label>
                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" autocomplete="off" required="">
              </div>
              <div class="form-group">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="listRolId">Tipo usuario</label>
                <select name="listRolId" id="listRolId" class="form-control">

                </select>
              </div>
              <div class="form-group">
                <label for="listStatus">Status</label>
                <select name="listStatus" id="listStatus" class="form-control" required>
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="txtPassword">Contraseña</label>
              <input type="password" class="form-control" id="txtPassword" name="txtPassword" autocomplete="off">
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