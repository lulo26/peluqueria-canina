<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


  <title><?= $data['page_tag'] ?></title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="Assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="Assets/css/responsive.css" rel="stylesheet" />

  <!-- Haciendo tienda con nuevas librerias!!! -->

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">




  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="./Assets/css/tienda_css/slick.css" />
  <link type="text/css" rel="stylesheet" href="./Assets/css/tienda_css/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="./Assets/css/tienda_css/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="./Assets/css/tienda_css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="./Assets/css/tienda_css/style.css" />




  <!-- Aqui termina la tienda con nuevas librerias!! -->


</head>

<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <img src="Assets/img/home/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="home">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">Servicios </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="tienda">Tienda de Mascotas</a>
              </li>
         
            </ul>
            
          </div>
          <div class="quote_btn-container  d-flex justify-content-center">

            <a href="<?= base_url()  ?>/login">Iniciar Sesion</a>

          </div>
        </div>
      </nav>
    </div>
  </header>



  <body>

  

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
      <!-- container -->
      <div class="container" id="cardnavegante">
        <div class="row">
        <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <h1 class="display-4 fw-bolder">Canino Feliz Shop</h1>
                    <p class="lead fw-normal text-black-50 mb-0">Todo lo que necesitas para un perro feliz, ¡a un clic de distancia!</p>
                </div>
            </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->



    
<div class="row" id="losProductos" >

</div>

  <!-- Back to Top -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i>
  <img src="Assets/img/home/flecha_arriba.png" alt=""></a>



      <script>
        const base_url = "<?= base_url() ?>";
      </script>
      <!-- jQuery Plugins tienda -->
      <script src="./Assets/js/tienda_js/jquery.min.js"></script>
      <script src="./Assets/js/tienda_js/bootstrap.min.js"></script>
      <script src="./Assets/js/tienda_js/slick.min.js"></script>
      <script src="./Assets/js/tienda_js/nouislider.min.js"></script>
      <script src="./Assets/js/tienda_js/jquery.zoom.min.js"></script>
      <script src="./Assets/js/tienda_js/main.js"></script>

      <!-- Aqui termina -->


  </body>