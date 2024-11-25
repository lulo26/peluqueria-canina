<!-- Modal Crear/Actualizar -->
<div class="modal fade" id="selectProductModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearUsuarioModalLabel">Venta</h5>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>