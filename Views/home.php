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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="Assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="Assets/css/responsive.css" rel="stylesheet" />

</head>

<body>



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
                  <a class="nav-link" href="pet.html">Galeria de Mascotas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="clinic.html"> Clinica</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tienda">Tienda de Mascotas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buy.html"> Contactanos!</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container  d-flex justify-content-center">

              <a href="<?= base_url()  ?>/login">Iniciar Sesion</a>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="Assets/img/home/hero.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 900px;">
                <h4 class="text-white text-uppercase mb-md-3">Donde cada cola se mueve con alegría y cada ladrido cuenta una historia de amor.</h4>
                <h1 class="display-3 text-white mb-md-4">Canino Feliz</h1>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="Assets/img/home/carousel-2.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 900px;">
                <h4 class="text-black text-uppercase mb-md-3">Descubre cómo nuestro amor por los perros transforma vidas. 🐶💖
¡Únete a la familia Canino Feliz! 🌟
#AmorPerruno #CaninoFeliz</h4>
                <h1 class="display-3 text-black mb-md-4">🐾 ¡La felicidad tiene cuatro patas! 🐾</h1>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
          </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
          </div>
        </a>
      </div>
    </div>
    <!-- Carousel End -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="./Assets/img/home/about.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2 class="custom_heading">
              Acerca de Nosotros
              <span>
                Canino Feliz
              </span>
            </h2>
            <p>
              En Canino Feliz, nos apasiona el bienestar de tus mascotas. Somos una plataforma dedicada a ofrecerte todo lo que necesitas para cuidar y consentir a tus fieles compañeros.
              <br>

              Nuestro objetivo es facilitar el acceso a servicios veterinarios de calidad, donde puedes agendar citas de manera rápida y sencilla, asegurando que tu mascota reciba la atención que merece. Además, contamos con un servicio de peluquería profesional, diseñado para que tu mascota luzca y se sienta espectacular.
              <br>

              También ofrecemos una cuidada selección de productos para mascotas, desde alimentos saludables hasta juguetes y accesorios, todo pensado para satisfacer las necesidades de tu compañero peludo.
              <br>
              En Canino Feliz, entendemos que tus mascotas son parte de tu familia, por eso nos comprometemos a brindarte un servicio excepcional y asesoramiento experto. ¡Estamos aquí para ayudarte a mantener a tu mascota feliz y saludable!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-2">
          <h2 class="custom_heading">
            Nuestros <span>Servicios</span>
          </h2>
          <div class="container layout_padding2">
            <div class="row">
              <div class="col-md-4">
                <div class="img_box">
                  <img src="./Assets/img/home/s-1.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Clinica Veterinaria
                  </h6>
                  <p>
                    En nuestra clínica, ofrecemos atención veterinaria de alta calidad para asegurar la salud y el bienestar de tu mascota. Contamos con un equipo de profesionales capacitados que brindan servicios como consultas, vacunaciones, y emergencias, garantizando que tu compañero reciba el mejor cuidado posible.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="img_box">
                  <img src="./Assets/img/home/s-2.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Hotel Mascota
                  </h6>
                  <p>
                    Si necesitas un lugar seguro y cómodo para que tu perro se quede mientras estás fuera, nuestro hotel canino es la opción ideal. Ofrecemos un ambiente acogedor y atención personalizada, con actividades y cuidado constante para que tu mascota se sienta como en casa.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="img_box">
                  <img src="./Assets/img/home/store.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Tienda
                  </h6>
                  <p>
                    Nuestra tienda está repleta de productos seleccionados especialmente para tus mascotas. Desde alimentos de alta calidad hasta juguetes, accesorios y productos de higiene, encontrarás todo lo que necesitas para consentir a tu compañero peludo. ¡Ven y descubre nuestra variedad!
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <img src="./Assets/img/home/tool.png" alt="" class="w-100">
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="Assets/img/home/ubicacion.png" alt="">
            </div>
            <div class="detail-box">
              <p>
                Ubicacion
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="Assets/img/home/llamada-telefonica.png" alt="">
            </div>
            <div class="detail-box">
              <p>
                +57 1234567890
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="Assets/img/home/correo-electronico.png" alt="">
            </div>
            <div class="detail-box">
              <p>
                empleados@caninofeliz.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2024 All Rights Reserved By
      <a href="https://html.design/">ADSO2827725</a>
    </p>
  </section>
  <!-- footer section -->

   <!-- Back to Top -->
   <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i>
  <img src="Assets/img/home/flecha_arriba.png" alt=""></a>



  <script src="./Assets/js/home/bootstrap.js"></script>
  <script src="./Assets/js/home/jquery-3.4.1.min.js"></script>

<!--  Scripc para que funcione carousel!!
 -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/home/carousel/lib/easing/easing.min.js"></script>
    <script src="Assets/js/home/carousel/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/js/home/carousel/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Assets/js/home/carousel/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Assets/js/home/carousel/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/js/home/carousel/main.js"></script>


</body>
</body>

</html>