<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ?> 
<!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
        <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
        <?php 
        dep($_SESSION['userData']);
        dep($_SESSION['permisos']);
        dep($_SESSION['permisosMod']);
        ?>
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->

<?php footer_admin($data) ?> <!-- Carga todo el footer -->