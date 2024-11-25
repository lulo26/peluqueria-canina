<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php 
header_admin($data);
getModal('ventasModal', $data);
?> 


<!-- Contenido de la pagina -->
<div class="container-fluid">

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            <?= $data['page_title'] ?>
            <?php if ($_SESSION['permisosMod']['w']): ?>
                <?php endif; ?>
        </h4>

    </div>

    <div class="card-body">

        <form id="frmUsuarios" method="POST">

        <input type="hidden" id="idUsuario" name="idUsuario" value="0">

            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" placeholder="CODIGO SKU" class="form-control" id="txtCodigoSKU" name="txtIdentificacion" autocomplete="off" required="">
                
              </div>

              <div class="form-group col-md-6">
                <button id="btnAgregarItem" type="button" class="btn btn-primary">Agregar</button>
              </div>

            </div>

            <div class="form-row">
                <label >Productos/Servicios</label>
            </div>
            <div class="form-row">
                <div id="productList">

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <select name="metodoPago" id="metodoPago" class="form-control">
                        <option name="0" id="0">Seleccionar Metodo de pago</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button id="btnAgregarMetodo" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
      
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>


        
    </div>
    </div>
    
</div>
<!-- /.Fin de contenido -->


    </div>
    <!-- Fin de contenido principal <main> -->

<?php footer_admin($data) ?> <!-- Carga todo el footer -->