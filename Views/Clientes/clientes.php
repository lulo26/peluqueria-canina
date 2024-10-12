<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ;
getModal('insertarClientesModal',$data);
?>
 
    <!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
        <button id="btnCrearCliente" class="btn btn-primary" data-toggle="modal" data-target="#insertarClientes">
            <i class="fas fa-plus"></i>
        </button>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaClientes" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Usuario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->
<script src="<?=media() ?>/js/clientes/clientes.js"></script>
<?php footer_admin($data) ?> <!-- Carga todo el footer -->