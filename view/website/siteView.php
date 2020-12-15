<?php
$ruta = "../../backend/";
require_once $ruta.'controller/Init.php';
require_once $ruta.'controller/EmpresaController.php';
$recursos = $recursoBO->getAllByCarpeta(1);
$countImg = 0;
foreach ($recursos as $key => $value) {
    $countImg++;
}
$active = "active";
$index = 0;

$listaHorarios = array();
$listRutas = $rutaBO->getAllByEmpresa(1);
foreach ($listRutas as $ruta) {
  $horariosPorRuta = $horariBO->getAllByRuta($ruta['idRuta']);
  foreach ($horariosPorRuta as $hor) {
    array_push($listaHorarios, $hor);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>FLIMASY</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="../assets/img/airplane.ico" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="../dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <!-- =======================================================
        * Template Name: Arsha - v2.3.0
        * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="#">FLIMASY</a></h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="#hero">Inicio</a></li>
                        <li><a href="#about">Acerca de</a></li>
                        <li><a href="#services">Servicios</a></li>
                        <li><a href="#pricing">Precios</a></li>
                        <li><a href="#contact">Contactenos</a></li>
                    </ul>
                </nav><!-- .nav-menu -->
                <a href="../login/loginView.php" class="get-started-btn scrollto">Login</a>
            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h2><?php echo $empresaObj->getTexto_Banner(); ?></h2>
                        <div class="d-lg-flex">
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                      <!--<img src="assets/img/hero-img.png" class="img-fluid animated" alt="">-->
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <?php if($countImg > 0) {?>
                                <ul class="carousel-indicators">
                                    <?php foreach ($recursos as $recurso) { ?>
                                        <li data-target="#demo" data-slide-to="<?php echo $index;?>" class="<?php echo $active;?>"></li>
                                        <?php 
                                        $index++;
                                        $active= "";
                                    } $active= "active"; ?>
                                </ul>
                                <div class="carousel-inner text-center">
                                    <?php foreach ($recursos as $recurso) { ?>
                                        <div class="carousel-item <?php echo $active;?>">
                                            <img src="<?php echo $recurso['Ruta'];?>" class="img-fluid animated" alt="Los Angeles" width="1100" height="500">
                                        </div>
                                    <?php 
                                        $index++;
                                        $active= "";
                                    } $active= "active"; ?>
                                </div>
                            <?php } else { ?>
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner text-center">
                                    <div class="carousel-item active">
                                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="Los Angeles" width="1100" height="500">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="Chicago" width="1100" height="500">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="New York" width="1100" height="500">
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Hero -->

        <main id="main">
            <!-- ======= Portfolio Section ======= -->
            <section id="about" class="portfolio">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Acerca de</h2>                       
                        <p><?php echo $empresaObj->getDescripcion(); ?></p>
                    </div>
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200"> 
                        <div class="col-lg-4 col-md-6 portfolio-item filter-historia">
                            <p><b>Historia:<br>Lorem Ipsum es simplemente texto de relleno de la industria de la impresión y la composición tipográfica. 
                                    Lorem Ipsum ha sido el texto de relleno estándar de la industria desde el siglo XVI,
                                    cuando un impresor desconocido tomó una galera de tipos y la mezcló para hacer un libro de muestras tipográficas.</b></p>           
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-vision">
                            <p><b>Vision:<br><?php echo $empresaObj->getVision(); ?></b></p>         
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-mision">
                            <p><b>Mision:<br><?php echo $empresaObj->getMision(); ?></b></p>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-obj">
                            <p><b>Objetivos:<br><?php echo $empresaObj->getObjetivos(); ?></b></p>
                        </div>
                    </div>
                </div>
            </section><!-- End Portfolio Section -->
            <!-- ======= Services Section ======= -->
            <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Servicios</h2>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4>Entretenimiento</h4>
                                <p>A bordo del avión siempre hay algo para entretener a los pasajeros: revistas, audífonos con radio y también pantallas integradas para ver películas.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4>Medicamentos y primeros auxilios</h4>
                                <p>Cuenta con un botiquín completo con una gran variedad de medicamentos gratuitos: analgésicos, antieméticos y otros productos solicitados.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-tachometer"></i></div>
                                <h4>Botanas y refrescos en lata</h4>
                                <p>Tienes derecho a las botanas adicionales como cacahuates o patatas fritas.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-layer"></i></div>
                                <h4>Menús a bordo</h4>
                                <p>Disfrute de selecta comida y bebida a bordo de los vuelos en todo el mundo y goze con excelentes menús.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Services Section -->

            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">

                    <div class="section-title" style="margin-bottom: 0px;">
                        <h2>Precios</h2>
                        <p>Lista de horarios con su respectivo ruta y precio. Si desea realizar alguna reservacion por favor ingrese a nuestro sistema.</p>
                    </div>

                    <div class="info">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th style="width: 15%;">Ruta</th>
                                    <th style="width: 15%;">Avion</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Precio</th>
                                    <th style="width: 5%;">Hora de Despliegue</th>
                                    <th style="width: 5%;">Hora de Llegada</th>
                                    <th style="width: 5%;"># Asientos Disponibles</th>
                                    <th style="width: 13%;"></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($listaHorarios as $staffHorario) { 
                                    $ruta = $rutaBO->getById($staffHorario['idRuta']);
                                    $avion = $avionBO->getById($staffHorario['idCatalogo_avion']);
                                  ?>
                                      <tr>
                                          <td><?php echo $ruta->getRuta(); ?></td>
                                          <td><?php echo $avion->getNombre_Avion(); ?></td>
                                          <td><?php echo $staffHorario["Fecha"]; ?></td>
                                          <td><?php echo $staffHorario["Status"]; ?></td>
                                          <td><?php echo $staffHorario["Precio"]; ?></td>
                                          <td><?php echo $staffHorario["HoraDespliegue"]; ?></td>
                                          <td><?php echo $staffHorario["HoraLlegada"]; ?></td>
                                          <td><?php echo $staffHorario["Cant_AsientosDisponibles"]; ?></td>
                                          <td><a href="../login/loginView.php" class="buy-btn">Reservar</a></td>
                                      </tr>
                                <?php } ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Ruta</th>
                                    <th>Avion</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Precio</th>
                                    <th>Hora de Despliegue</th>
                                    <th>Hora de Llegada</th>
                                    <th># Asientos Disponibles</th>
                                    <th></th>
                                  </tr>
                              </tfoot>
                          </table>
                    </div>

                </div>
            </section><!-- End Pricing Section -->
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Contact</h2>
                    </div>
                    <div class="row">

                        <div class="col-lg-5 d-flex align-items-stretch">
                            <div class="info">
                                <div class="address">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br></p>
                                </div>

                                <div class="email">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p><?php echo $empresaObj->getEmail(); ?></p>
                                </div>

                                <div class="phone">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p><?php echo $empresaObj->getTelefono(); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <div class="info">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 300px;" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>FLIMASY</h3>
                            <p>
                            <strong>Direccion:</strong><p>Cartago<?php echo $empresaObj->getDireccion(); ?></p><br>
                            <strong>Phone:</strong> <p><?php echo $empresaObj->getTelefono(); ?></p><br>
                            <strong>Email:</strong> <p><?php echo $empresaObj->getEmail(); ?></p><br>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Enlaces</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Inicio</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#about">Acerca de</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#services">Servicios</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Precios</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Redes Sociales</h4>
                            <p><?php echo $empresaObj->getTextoRedesSociales(); ?></p>
                            <div class="social-links mt-3">
                                <a href=" " class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href=" " class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href=" " class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href=" " class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href=" s" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>FLIMASY</span></strong>. Todos los derechos reservados
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                    Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
        <div id="preloader"></div>
        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <script src="../dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

        <script type="text/javascript">
          jQuery(document).ready(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });

            $('#example1_wrapper .row').css('padding-top', '0px');
          });
        </script>
    </body>
</html>