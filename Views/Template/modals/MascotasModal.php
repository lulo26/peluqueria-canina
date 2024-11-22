<!-- Modal -->
<div class="modal fade" id="insertarMascotasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MascotaModalLabel">Agregar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <form id="frmMascotas" method="POST">
        <input type="hidden" id="idMascotas" name="idMascotas" value="0">
            <div class="form-group">
              <label for="nombreMascota">Nombre</label>
              <input type="text" class="form-control valid validText" id="nombreMascota" name="nombreMascota" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="razaMascota">Raza</label>
            <select class="custom-select" aria-label="Default select example" id="razaMascota" name="razaMascota">
            </select>
            <span class="badge badge-primary mt-3" id="agregarNuevo">agregar nueva raza</span>
            </div>
            <style>
              span{
                cursor: pointer;
              }
              #agregarNuevo{
                font-size: 15px;
                user-select: none;
              }
            </style>
            
            <div class="form-group">
              <label for="edadMascota">Edad</label>
              <input type="number" class="form-control" id="edadMascota" name="edadMascota" autocomplete="off" onkeypress="return controlTag(event);">
            </div>

            <div class="form-group">
              <label for="nombreUsuario">Dueño</label>
            <select class="custom-select" aria-label="Default select example" id="nombreUsuario" name="nombreUsuario">
                
            </select>
            </div>

            <div class="form-group">
              <label for="comentarioMascota">Comentario</label>
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