<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ?> 


<!-- Contenido de la pagina -->
<div class="container-fluid">

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            <?= $data['page_title'] ?>
        </h4>
    </div>

    <div class="card-body">
    <div class="table-responsive">

    </div>
        content
    </div>
    </div>
    
</div>
<!-- /.Fin de contenido -->


    </div>
    <!-- Fin de contenido principal <main> -->

<?php footer_admin($data) ?> <!-- Carga todo el footer -->