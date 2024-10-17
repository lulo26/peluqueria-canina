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
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="Assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="Assets/css/responsive.css" rel="stylesheet" />

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



    <body>


    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".new">Newest</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">Hight Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
            <div id="1" class="item new col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-01.jpg" alt="">
                  <h4>Proin vel ligula</h4>
                  <h6>$15.00</h6>
                </div>
              </a>
            </div>
            <div id="2" class="item high col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-02.jpg" alt="">
                  <h4>Erat odio rhoncus</h4>
                  <h6>$25.00</h6>
                </div>
              </a>
            </div>
            <div id="3" class="item low col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-03.jpg" alt="">
                  <h4>Integer vel turpis</h4>
                  <h6>$35.00</h6>
                </div>
              </a>
            </div>
            <div id="4" class="item low col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-04.jpg" alt="">
                  <h4>Sed purus quam</h4>
                  <h6>$45.00</h6>
                </div>
              </a>
            </div>
            <div id="5" class="item new high col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-05.jpg" alt="">
                  <h4>Morbi aliquet</h4>
                  <h6>$55.00</h6>
                </div>
              </a>
            </div>
            <div id="6" class="item new col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-06.jpg" alt="">
                  <h4>Urna ac diam</h4>
                  <h6>$65.00</h6>
                </div>
              </a>
            </div>
            <div id="7" class="item new high col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-03.jpg" alt="">
                  <h4>Proin eget imperdiet</h4>
                  <h6>$75.00</h6>
                </div>
              </a>
            </div>
            <div id="8" class="item low new col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-02.jpg" alt="">
                  <h4>Nullam risus nisl</h4>
                  <h6>$85.00</h6>
                </div>
              </a>
            </div>
            <div id="9" class="item new col-md-4">
              <a href="single-product.html">
                <div class="featured-item">
                  <img src="assets/images/product-01.jpg" alt="">
                  <h4>Cras tempus</h4>
                  <h6>$95.00</h6>
                </div>
              </a>
            </div>
        </div>
    </div>

    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li class="current-page"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Page Ends Here -->



    
    


   


    <!-- Bootstrap core JavaScript -->
    <script src="Assets/tienda/jquery/jquery.min.js"></script>
    <script src="Assets/tienda/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/tienda/bootstrap/js/custom.js"></script>
    <script src="assets/tienda/bootstrap/js/owl.js"></script>
    <script src="assets/tienda/bootstrap/js/isotope.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>