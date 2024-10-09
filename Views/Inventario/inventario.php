<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php 
header_admin($data);
getModal('inventarioModal',$data);
?> 
<!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <h1 class="h3 mb-4 text-gray-800"></h1>

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?= $data['page_title'] ?>
                    <button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Crear producto</span>
                    </button>

                </h6>
            </div>



            <div class="card-body">
                oiuoiuoiu
            </div>
        </div>
        
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->
<script src="<?= media() ?>/js/inventario.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->