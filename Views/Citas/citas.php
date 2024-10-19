<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data);
getModal('citasModal',$data);
?> 

    <!-- Contenido de la pagina -->
    <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Titulo de la pagina -->
                    <h4 class="h3 mb-4 font-weight-bold  text-primary">
                        <?= $data['page_title'] ?>

                        <button id="btnCrearCita" class="btn btn-primary" data-toggle="modal" data-target="#insertarCitas">
                            <span>
                                <i class="fas fa-plus"></i>
                            </span>

                            <span class="text">
                                Crear Cita
                            </span>
                            
                        </button>

                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaCitas" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de finalización</th>
                                    <th>Lugar</th>
                                    <th>Servicio</th>
                                    <th>Cliente</th>
                                    <th>Empleado encargado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- Titulo de la pagina -->
        </div>
    <!-- /.Fin de contenido -->
    </div>
    <!-- Fin de contenido principal <main> -->
    <script src="<?=media() ?>/js/citas/citas.js"></script>
    <?php footer_admin($data) ?> <!-- Carga todo el footer -->