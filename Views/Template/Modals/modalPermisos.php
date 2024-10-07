<div id="modalPermisos" class="modal">

  <div class="modal-content width-6">

    <div class="modal-header headerRegister">
      <span class="close"></span>
      <span class="title-line">
        <i class='fa-solid fa-user-check titleIcon'></i>
        <h2 class="title" id="titleModal"> Permisos del rol</h2>
      </span>
    </div>
    <!--

    <label class="switch">
      <input type="checkbox">
      <span class="slider round"></span>
    </label>
    -->

    <?php
    //dep($data);
    ?>

  <form name="formPermisos" id="formPermisos">
    <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
    <table>
      <thead>
        <tr>
          <th>  #  </th>
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
          for ($i=0; $i < count($modulos); $i++) { 

            $permisos = $modulos[$i]['permisos'];
            $rCheck = $permisos['r'] == 1 ? " checked " : "";
            $wCheck = $permisos['w'] == 1 ? " checked " : "";
            $uCheck = $permisos['u'] == 1 ? " checked " : "";
            $dCheck = $permisos['d'] == 1 ? " checked " : "";

            $idmod = $modulos[$i]['id_modulo'];
          
        ?>
          <tr>
            <td>
              <?= $no; ?>
              <input type="hidden" name="modulos[<?=$i;?>][id_modulo]" value="<?= $idmod ?>">
            </td>

            <td>
              <?= $modulos[$i]['titulo']; ?>
            </td>
            <td>
              <label class="switch">
                <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>>
                <span class="slider <?= $rCheck ?>"></span>
              </label>
            </td>

            <td>
              <label class="switch">
                <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>>
                <span class="slider <?= $wCheck ?>"></span>
              </label>
            </td>

            <td>
              <label class="switch">
                <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>>
                <span class="slider <?= $uCheck ?>"></span>
              </label>
            </td>

            <td>
              <label class="switch">
                <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>>
                <span class="slider <?= $dCheck ?>"></span>
              </label>
            </td>
          </tr>
          <?php
            $no++;
          }
          ?>
      </tbody>
    </table>

      <div class="modal-footer">
        <button id="btnActionForm" class="btn" type="submit"><span id="btnText">Guardar</span></button>
        <button class="btn-secondary close" type="button">Cancelar</button>
      </div>
      
    </form>

  </div>
    

</div>