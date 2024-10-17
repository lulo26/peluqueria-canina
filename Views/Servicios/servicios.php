<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ;
getModal('serviciosModal',$data);
?>
 
    <!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
        <button id="btnCrearServicio" class="btn btn-primary" data-toggle="modal" data-target="#insertarServicios">
            <i class="fas fa-plus"></i>
        </button>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaServicios" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
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
<script src="<?=media() ?>/js/servicios/servicios.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->