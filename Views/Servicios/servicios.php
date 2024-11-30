<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ;
getModal('serviciosModal',$data);
?>
 
    <!-- Contenido de la pagina -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Titulo de la pagina -->
                <h4 class="h3 mb-4 font-weight-bold  text-primary">
                    <?= $data['page_title'] ?>
                    <?php if ($_SESSION['permisosMod']['w']): ?>
                    <button id="btnCrearServicio" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertarServicios">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>

                        <span class="text">
                            Nuevo
                        </span>
                        
                    </button>

                    <button id="btnReportes" type="button" class="btn btn-primary btn-icon-split btn-sm" >
                            <span class="icon text-white-50">
                                <i class="fas fa-archive"></i>
                            </span>

                            <a class="text" href="<?php echo base_url() ?>/Libraries/fpdf/serviciosReportes.php" target="_blank">Reporte</a>

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
                    <table id="tablaServicios" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->
<script src="<?=media() ?>/js/servicios/servicios.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->