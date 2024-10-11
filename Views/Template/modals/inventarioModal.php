<!-- Modal -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearProductoModalLabel">Crear Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmProductos" method="POST">
            <input type="hidden" id="idProducto" name="idProducto" value="0">
            <div class="form-group">
              <label for="nombreProducto">Nombre</label>
              <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="precioProducto">Precio</label>
              <input type="text" class="form-control" id="precioProducto" name="precioProducto" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="codigoProducto">Codigo</label>
              <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" autocomplete="off">
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