<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data);
getModal('MascotasModal',$data);
?> 
<!-- Contenido de la pagina -->
 
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
        <button class="btn btn-primary" data-toggle="modal" id="btnInsertarMascota">
            <i class="fas fa-plus"></i>
            <span class="text">Agregar mascota</span>
        </button>
        
    </div>

    <div class="card-body">
            <div class="table-responsive">

            </div>
            <table id="tablaMascotas" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>raza</th>
                        <th>edad</th>
                        <th>comentario</th>
                        <th>Nombre dueño</th>
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
<script src="<?=media() ?>/js/mascotas/mascotas.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->