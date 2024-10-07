<div id="modalRoles" class="modal">

  <div class="modal-content width-3">

    <div class="modal-header headerRegister">
      <span class="close"></span>
      <span class="title-line">
        <i id="titleIcon" class="fa-solid fa-circle-plus"></i>
        <h2 class="title" id="titleModal">Nuevo rol</h2>
      </span>
    </div>

    <form id="formRol" name="formRol">
      <input type="hidden" id="idRol" name="idRol" value="0">
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre del rol">
      </div>

      <div class="form-group">
        <label>Descripcion</label>
        <textarea name="txtDescripcion" id="txtDescripcion" rows="2" placeholder="Descripción del rol"></textarea>
      </div>

      <div class="form-group">
        <label>Estado</label>
        <select name="listStatus" id="listStatus">
          <option value="1">Activo</option>
          <option value="2">Inactivo</option>
        </select>
      </div>

      <div class="modal-footer">
        <button id="btnActionForm" class="btn" type="submit"><span id="btnText">Aceptar</span></button>
        <button class="btn-secondary close" type="button">Cancelar</button>
      </div>

    </form>

  </div>
    
</div>