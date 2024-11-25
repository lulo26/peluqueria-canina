<!-- Modal Crear/Actualizar -->
<div class="modal fade" id="agregarProducto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmAgregarProductos" method="POST">
            <input type="hidden" id="idUsuario" name="idUsuario" value="0">
            <span>Todos los campos son obligatorios</span>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtIdentificacion">Identificacion</label>
                <input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtNombres">Nombres</label>
                <input type="text" class="form-control valid validText" id="txtNombres" name="txtNombres" autocomplete="off" required="">
              </div>
              <div class="form-group col-md-6">
                <label for="txtApellidos">Apellidos</label>
                <input type="text" class="form-control valid validText" id="txtApellidos" name="txtApellidos" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtTelefono">Teléfono</label>
                <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" autocomplete="off" required="" onkeypress="return controlTag(event);">
              </div>
              <div class="form-group col-md-6">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" autocomplete="off" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="listRolId">Tipo usuario</label>
                <select name="listRolId" id="listRolId" class="form-control">
                </select>
              </div>
              <div class="form-group col-md-6">
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

<!-- Modal VER USUARIOS -->
<div class="modal fade" id="verUsuarioModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearRolModalLabel">Informacion del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered" width="100%" cellspacing="0">
          <tbody>
            
            <tr>
              <th>Identificacion</th>
              <td id="celIdentificacion"></td>
            </tr>

            <tr>
              <th>Nombres:</th>
              <td id="celNombre"></td>
            </tr>

            <tr>
              <th>Apellidos:</th>
              <td id="celApellido"></td>
            </tr>

            <tr>
              <th>Teléfono:</th>
              <td id="celTelefono"></td>
            </tr>

            <tr>
              <th>Email (Usuario):</th>
              <td id="celEmail"></td>
            </tr>

            <tr>
              <th>Tipo Usuario:</th>
              <td id="celTipoUsuario"></td>
            </tr>

            <tr>
              <th>Estado:</th>
              <td id="celEstado"></td>
            </tr>

            <tr>
              <th>Fecha registro:</th>
              <td id="celFechaRegistro"></td>
            </tr>

          </tbody>
        </table>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
</div>