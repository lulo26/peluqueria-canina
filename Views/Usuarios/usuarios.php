<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php 
header_admin($data);
getModal('usuariosModal', $data);
?> 
<!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                <?= $data['page_title'] ?>
                <!--<button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#crearProductoModal" >-->
                <button id="btnCrearUsuario" type="button" class="btn btn-primary btn-icon-split btn-sm" >
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Crear usuario</span>
                </button>

            </h4>
        </div>

        <div class="card-body">
        <div class="table-responsive">

        </div>
        <table id="tablaUsuarios" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Status</th>
                    <th>Acciones</th>
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
<?php footer_admin($data) ?> <!-- Carga todo el footer -->