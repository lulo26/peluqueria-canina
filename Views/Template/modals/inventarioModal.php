<!-- Modal -->
<div class="modal fade" id="setInventarioModal" tabindex="-1" aria-labelledby="setInventarioModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inventarioModalLabel">{titulo}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmInventario" method="POST">
            <input type="hidden" id="idProducto" name="idProducto" value="0">
            <input type="hidden" id="inventarioSumaResta" name="inventarioSumaResta" value="">
            <label id="nombreProductoLabel">{nombre producto}</label>

            <div class="form-group">
              <label for="cantidadProducto">Cantidad</label>
              <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" value="" autocomplete="off">
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