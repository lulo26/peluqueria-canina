<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <!-- aquí va el contenido del modal -->

        <form id="frmProductos" method="POST">
            <div class="form-group">
              <label for="nombreProducto">Nombre</label>
              <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" aria-describedby="nombreProducto">
              <small id="nombreProducto" class="form-text text-muted">Nombre del producto que va a crear</small>
            </div>

            <div class="form-group">
              <label for="estadoProducto">Estado</label>
              <input type="text" class="form-control" id="estadoProducto" name="estadoProducto" aria-describedby="estadoProducto">
              <small id="estadoProducto" class="form-text text-muted">Estado del producto que va a crear</small>
            </div>

            <div class="form-group">
              <label for="precioProducto">Precio</label>
              <input type="text" class="form-control" id="precioProducto" name="precioProducto" aria-describedby="precioProducto">
              <small id="precioProducto" class="form-text text-muted">precio del producto que va a crear</small>
            </div>

            <div class="form-group">
              <label for="codigoProducto">Codigo</label>
              <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" aria-describedby="codigoProducto">
              <small id="codigoProducto" class="form-text text-muted">Codigo SKU del producto</small>
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