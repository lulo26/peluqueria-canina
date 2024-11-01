<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data); 
getModal('rolesModal',$data);
?>
<div id="contentFetch"></div>
<!-- Contenido de la pagina -->
    <div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                <?= $data['page_title'] ?>
                <!--<button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#crearProductoModal" >-->
                <?php if ($_SESSION['permisosMod']['w']): ?>
                    <button id="btnCrearRol" type="button" class="btn btn-primary btn-icon-split btn-sm" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Crear Rol</span>
                    </button>
                <?php endif; ?>
            </h4>
        </div>

        <div class="card-body">
        <div class="table-responsive">

        </div>
        <table id="tablaRoles" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre Rol</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
        </div>
        
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->

    <script src="<?=media() ?>/js/roles/roles.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->