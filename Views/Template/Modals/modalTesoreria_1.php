<div id="modalTesoreria_1" class="modal">

  <div class="modal-content width-3">

    <div class="modal-header headerRegister">
      <span class="close"></span>
      <span class="title-line">
        <i id="titleIcon" class="fa-solid fa-circle-plus"></i>
        <h2 class="title" id="titleModal">Nueva orden de pago</h2>
      </span>
    </div>

    <form id="formOrden" name="formOrden">
      <input type="hidden" id="id" name="id" value="">
      <div class="form-group">
        <label>Nombre*</label>
        <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre de la orden">
      </div>

      <div class="form-group">
        <label>Fecha Límite*</label>
        <input name="fecha_limite" id="fecha_limite" type="date" id="formDate"></input>
      </div>

      <div class="form-group">
        <label>Entidad</label>
        <input name="entidad" id="entidad" type="text">
      </div>

      <div class="form-group">
        <label>Numero de pago</label>
        <input name="numero_de_pago" id="numero_de_pago" type="text">
      </div>

      <div class="form-group">
        <label>Total a pagar*</label>
        <input name="total_a_pagar" id="total_a_pagar" type="text">
      </div>

      <div class="form-group">
        <label>Abonado</label>
        <input name="abonado" id="abonado" type="text">
      </div>

      <div class="form-group">
        <label>Comentario</label>
        <textarea name="comentario_orden" id="comentario_orden" cols="30" rows="5" placeholder="Comentario..."></textarea>
      </div>

      <div class="modal-footer">
        <button id="btnActionForm" class="btn" type="submit"><span id="btnText">Aceptar</span></button>
        <button class="btn-secondary close" type="button">Cancelar</button>
      </div>

    </form>

  </div>
    
</div>