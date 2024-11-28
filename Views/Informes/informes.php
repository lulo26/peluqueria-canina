<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data) ?> 
<!-- Contenido de la pagina -->
<div class="container-fluid">
    <!-- Titulo de la pagina -->
     <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>
     <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Razas de mascotas</h6>
                </div>
            <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="chartRazas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mascotas</h6>
                </div>
            <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="chartMascotas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin de contenido principal <main> -->
        
<?php footer_admin($data) ?> <!-- Carga todo el footer -->