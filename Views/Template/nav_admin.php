        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Peluqueria Canina</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if(!empty($_SESSION['permisos'][M_DASHBOARD]['r'])): ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?= $data['page_id_name'] == "dashboard" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <?php if(!empty($_SESSION['permisos'][M_INFORMES]['r']) || !empty($_SESSION['permisos'][M_USUARIOS]['r']) || !empty($_SESSION['permisos'][M_ROLES]['r'])): ?>
                <!-- Nav Item - Gestion de usuarios -->
                <li class="nav-item <?= $data['page_id_name'] == "informes" || $data['page_id_name'] == "usuarios" || $data['page_id_name'] == "roles" ? "active" : "" ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-star"></i>
                        <span>Administrar</span>
                    </a>
                    <div id="collapseUsuarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php if(!empty($_SESSION['permisos'][M_INFORMES]['r'])): ?>
                                <a class="collapse-item" href="<?= base_url() ?>/informes">Informes y estadísticas</a>
                            <?php endif; ?>
                            <?php if(!empty($_SESSION['permisos'][M_USUARIOS]['r'])): ?>
                                <a class="collapse-item" href="<?= base_url() ?>/usuarios">Usuarios</a>
                            <?php endif; ?>
                            <?php if(!empty($_SESSION['permisos'][M_ROLES]['r'])): ?>
                                <a class="collapse-item" href="<?= base_url() ?>/roles">Roles</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Tienda -->
            <li class="nav-item <?= 
            $data['page_id_name'] == "ventas" || 
            $data['page_id_name'] == "productos" || 
            $data['page_id_name'] == "categorias" || 
            $data['page_id_name'] == "inventario" ? "active" : "" ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTienda"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-store"></i>
                    <span>Tienda</span>
                </a>
                <div id="collapseTienda" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <?php if(!empty($_SESSION['permisos'][M_VENTAS]['r'])): ?>
                        <a class="collapse-item" href="<?= base_url() ?>/ventas">Ventas</a>
                    <?php endif; ?>
                        
                        <a class="collapse-item" href="<?= base_url() ?>/productos">Productos</a>
                        <a class="collapse-item" href="<?= base_url() ?>/inventario">Inventario</a>
                        <?php if(!empty($_SESSION['permisos'][M_CATEGORIAS]['r'])): ?>
                            <a class="collapse-item" href="<?= base_url() ?>/categorias">Categorias</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>

            <?php if(!empty($_SESSION['permisos'][M_CITAS]['r'])): ?>
                <!-- Nav Item - Citas -->
                <li class="nav-item <?= $data['page_id_name'] == "citas" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= base_url() ?>/citas">
                        <i class="fas fa-calendar-check"></i>
                        <span>Citas</span></a>
                </li>
            <?php endif; ?>

            <?php if(!empty($_SESSION['permisos'][M_SERVICIOS]['r'])): ?>
                <!-- Nav Item - Servicios -->
                <li class="nav-item <?= $data['page_id_name'] == "servicios" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= base_url() ?>/servicios">
                        <i class="fas fa-box-open"></i>
                        <span>Servicios</span></a>
                </li>
            <?php endif; ?>

            <?php if(!empty($_SESSION['permisos'][M_CLIENTES]['r'])): ?>
                <!-- Nav Item - Clientes -->
                <li class="nav-item <?= $data['page_id_name'] == "clientes" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= base_url() ?>/clientes">
                        <i class="fas fa-user-tag"></i>
                        <span>Clientes</span></a>
                </li>
            <?php endif; ?>

            <?php if(!empty($_SESSION['permisos'][M_MASCOTAS]['r'])): ?>
            <!-- Nav Item - Mascotas !!!!!!!!-->
            <li class="nav-item <?= $data['page_id_name'] == "Mascotas" || $data['page_id_name'] == "Razas" ? "active" : "" ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMascotas"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-paw"></i>
                    <span>Mascotas</span>
                </a>
                <div id="collapseMascotas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>/mascotas">Mascotas</a>
                        <a class="collapse-item" href="<?= base_url() ?>/razas">Razas</a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
         
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Usuario
            </div>

            <!-- Nav Item - Citas -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Salir</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->