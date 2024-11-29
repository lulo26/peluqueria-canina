<!-- Modal Lista productos -->
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

        <table class="table table-bordered" width="100%" cellspacing="0" id="productTable">
          <thead>
            <tr>
              <th>Codigo SKU</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad Stok</th>
              <th>Agregar</th>
            </tr>
          </thead>
          <tbody >

          </tbody>
        </table>
      
      </div>
    </div>
  </div>
</div>

<!-- Modal Lista Clientes -->
<div class="modal fade" id="selectClienteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearUsuarioModalLabel">Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <table class="table table-bordered" width="100%" cellspacing="0" id="clienteTable">
          <thead>
            <tr>
              <th>Documento</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Agregar</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      
      </div>
    </div>
  </div>
</div>