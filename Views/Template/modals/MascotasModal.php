<!-- Modal -->
<div class="modal fade" id="insertarMascotasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmMascotas" method="POST">
            <div class="form-group">
              <label for="nombreMascota">Nombre</label>
              <input type="text" class="form-control" id="nombreMascota" name="nombreMascota" autocomplete="off">
            </div>

            <select class="form-select" aria-label="Default select example" id="nombreUsuario" name="nombreUsuario">
                <option selected>selecicone el dueño</option>
            </select>

            <div class="form-group">
              <label for="razaMascota">raza</label>
              <input type="text" class="form-control" id="razaMascota" name="precioProducto" autocomplete="off">
            </div>
            
            <div class="form-group">
              <label for="edadMascota">edad</label>
              <input type="text" class="form-control" id="edadMascota" name="edadMascota" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="comentarioMascota">comentario</label>
              <textarea type="text" class="form-control" id="comentarioMascota" name="comentarioMascota" autocomplete="off" rows="4"></textarea>
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