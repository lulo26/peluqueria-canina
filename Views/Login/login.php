<!-- Carga todo el header, la variable $data viene desde el controlador -->
 
<!-- Contenido de la pagina -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row-6">
                            <div class="card">

                            </div>
                            <div class="imagen-login"> <center>
                                
                                
                                <img src="Assets/img/doggy-login.png" alt="" style="max-width: 80%"></center></div>
                            <div class="col-l6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-4">Bienvenido!</h1>
                                        <p style="color:red;">
                                            usuario: 	<b>web@master.com</b><br>
                                            contraseña: <b>123456</b>
                                        </p>
                                    </div>
                                    <form class="user" id="formLogin">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="txtEmail" name="txtEmail" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="txtPassword" name="txtPassword" placeholder="Contraseña">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Ingresar
                                        </button>
                                    </form>


                                   
                                    <div class="text-center">
                                       
                                    </div>
                                    <div class="text-center">
                                        <br>
                                        <a href="register" class="btn btn-primary btn-user btn-block ghost">
                                            Crear una cuenta
                                        </a>
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>const base_url = "<?= base_url() ?>";</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="<?= media() ?>/vendor/sweetAlert2/sweetalert2.all.min.js"></script>

    <script src="<?= media(); ?>/js/<?= $data['page_functions_js'] ?>"></script>

</body>

</html>
    <!-- /.Fin de contenido -->

    </div>
   
