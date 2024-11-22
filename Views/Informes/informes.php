<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ?> 
<!-- Contenido de la pagina -->
    <div class="container-fluid">

        <!-- Titulo de la pagina -->
         
        <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
        <div class="container mt-5"><div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Estadisticas de mascotas</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                    <canvas id="myChart"></canvas></div>
                                    </div>
                                </div>
            
        
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->
        
<?php footer_admin($data) ?> <!-- Carga todo el footer -->