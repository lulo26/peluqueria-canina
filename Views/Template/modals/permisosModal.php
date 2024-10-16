<!-- Modal Permisos -->
<div class="modal fade" id="permisosRolModal" tabindex="-1" aria-labelledby="permisosRolModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permisosRolModalLabel">Permisos del Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- aquí va el contenido del modal -->

        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Módulo</th>
              <th>Leer</th>
              <th>Escribir</th>
              <th>Actualizar</th>
              <th>Eliminar</th>
            </tr>
          </thead>

          <tbody>
            <?php dep($data)  ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>