<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tienda</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= media() ?>/css/tienda_css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Peluqueria Canina</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url() ?>/home"">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/tienda">Tienda</a></li>
                    </ul>
                    <form class="d-flex">
                        <a href="<?= base_url() ?>/carrito" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <!--<span class="badge bg-dark text-white ms-1 rounded-pill">0</span>-->
                        </a>
                    </form>
                    <ul class="navbar-nav me-2 mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url() ?>/login">Iniciar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <div class=" banner">
        <header class="opacityblue py-5">
            
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder text-spacing">Productos de calidad</h1>
                    <p class="lead fw-normal mb-0 text-spacing">Lo mejor para tu mascota</p>
                </div>
            </div>
            
        </header>
        </div>