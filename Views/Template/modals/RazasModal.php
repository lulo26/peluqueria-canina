<!-- Modal -->
<div class="modal fade" id="insertarRazaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="razaModalLabel">Agregar raza</h5>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmRazas" method="POST">
        <input type="hidden" id="idRaza" name="idRaza" value="0">
            <div class="form-group">
              <label for="nombreRaza">Nombre</label>
              <input type="text" class="form-control" id="nombreRaza" name="nombreRaza" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="sizeMascota">Tamaño</label>
            <select class="custom-select" aria-label="Default select example" id="sizeRaza" name="sizeRaza">
                <option value="0">seleccione la raza</option>
                <option value="pequeno">Pequeño</option>
                <option value="mediano">Mediano</option>
                <option value="grande">Grande</option>
                <option value="extra grande">Extra Grande</option>
            </select>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrarRaza" onclick="$('#insertarRazaModal').modal('hide');$('#insertarMascotasModal').modal('show');" aria-label="close">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>