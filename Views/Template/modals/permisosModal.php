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
        <form id="frmPermisos">
          <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Módulo</th>
                <th>Leer</th>
                <th>Escribir</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $no = 1;
              $modulos = $data['modulos'];
              for ($i=0; $i < count($modulos); $i++):  

              $permisos = $modulos[$i]['permisos'];
              $rCheck = $permisos['r'] == 1 ? " checked " : "";
              $wCheck = $permisos['w'] == 1 ? " checked " : "";
              $uCheck = $permisos['u'] == 1 ? " checked " : "";
              $dCheck = $permisos['d'] == 1 ? " checked " : "";

              $idmod = $modulos[$i]['id_modulo'];
          
              ?>
              <tr>
                <td>
                  <?= $no ?>
                  <input type="hidden" name="modulos[<?=$i;?>][id_modulo]" value="<?= $idmod ?>">
                </td>

                <td>
                  <?= $modulos[$i]['titulo_modulo']; ?>
                </td>
                <td>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="modulos[<?= $i; ?>][r]" class="custom-control-input" id="switchR_<?= $i; ?>" <?= $rCheck ?>>
                    <label class="custom-control-label" for="switchR_<?= $i; ?>"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="modulos[<?= $i; ?>][w]" class="custom-control-input" id="switchW_<?= $i; ?>" <?= $wCheck ?>>
                    <label class="custom-control-label" for="switchW_<?= $i; ?>"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="modulos[<?= $i; ?>][u]" class="custom-control-input" id="switchU_<?= $i; ?>" <?= $uCheck ?>>
                    <label class="custom-control-label" for="switchU_<?= $i; ?>"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="modulos[<?= $i; ?>][d]" class="custom-control-input" id="switchD_<?= $i; ?>" <?= $dCheck ?>>
                    <label class="custom-control-label" for="switchD_<?= $i; ?>"></label>
                  </div>
                </td>
              </tr>
              <?php 
              $no++;
              endfor; 
              ?>
            </tbody>
          </table>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
          </div>

      </div>
    </div>
  </div>
</div>