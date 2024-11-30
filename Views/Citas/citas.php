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
                        <?php if ($_SESSION['permisosMod']['w']) : ?>
                        <button id="btnCrearCita" type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertarCitas">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>

                            <span class="text">
                                Nuevo
                            </span>
                            
                        </button>

                        <!--REPORTES -->
                        <button id="btnReportes" type="button" class="btn btn-primary btn-icon-split btn-sm" >
                            <span class="icon text-white-50">
                                <i class="fas fa-archive"></i>
                            </span>

                            <a class="text" href="<?php echo base_url() ?>/Libraries/fpdf/citasReportes.php" target="_blank">Reporte</a>

                            <style>
                                a{
                                    color: white;
                                }

                                a:hover{
                                    text-decoration: none;  
                                    color: white;
                                }
                            </style>
                            
                        </button>
                        <?php endif; ?>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaCitas" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Dia de la cita</th>
                                    <th>Hora de inicio</th>
                                    <th>Hora de finalización</th>
                                    <th>Lugar</th>
                                    <th>Mascota</th>
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
    <?php footer_admin($data) ?> <!-- Carga todo el footer -->