<!doctype html>
<html lang="en">

<head>
  <title>ReservaTec</title>
  <link rel="icon" type="image/png" href="images/tec_logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/custom-bs.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/line-icons/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-4">
      <div class="container-fluid">
        <div class="row align-items-center">
          <!-- LOGO -->
          <div class="site-logo col-lg-2 col-md-4 col-sm-4 col-4"><a href="https://www.tec.mx" target="_blank"><img width="100%" src="images/tec_logo_blanco.png" alt="Tecnológico de Monterrey"/></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.html" class="nav-link">Inicio</a></li>
              <li><a href="reservar.php" class="nav-link">Reservar</a></li>
              <li><a href="misReservas.php" class="active">Mis reservas</a></li>
              <li class="d-lg-none"><a href="contact.html">Contacto</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="contact.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                  class="mr-2 icon-paper-plane"></span>Contacto</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero inner-page overlay bg-image" style="background-image: url('images/tec_1.jpg');"
      id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">Mis reservas</h1>
              <p>Tus reservaciones activas.</p>
            </div>
          </div>
        </div>
      </div>


    </section>

    

    <section class="site-section">
      <div class="container">

        <!--
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">#### salones</h2>
            </div>
          </div>
        -->

        <div class="row mb-5 text-center justify-content-center">

          <div class="col-8">
            <?php
              $con=mysqli_connect("localhost","root","","AMS");
              // Check connection
              if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

              // WHERE rentas.userID = 7
              $result = mysqli_query($con,"SELECT * FROM rentas INNER JOIN rooms ON rentas.idSalon = rooms.id WHERE rentas.userID = 7 ORDER BY edificio, numero");

              if ($result->num_rows == 0) {
                echo "<h2>No hay reservaciones activas.</h2>";
                exit;
              }
				
              echo "<table border='1' class='table table-hover'>
              <tr class='table-primary'>
              <th>Título</th>
              <th>Edificio</th>
              <th>Número</th>
    		      <th>Capacidad</th>
              <th>Fecha de inicio</th>
              <th>Fecha de fin</th>
              </tr>";


              while($row = mysqli_fetch_array($result))
              {
              echo "<tr>";

              echo "<td>" . $row["title"] . "</td>";

              if ($row['edificio'] == "CIAP")
                echo "<td>" . $row['edificio'] . "</td>";
              else
                echo "<td>A" . $row['edificio'] . "</td>";

              echo "<td>" . $row['numero'] . "</td>";
    		      echo "<td>" . $row['capacidad'] . "</td>";
              echo "<td>" . $row['fechaInicio'] . "</td>";
              echo "<td>" . $row['fechaFinal'] . "</td>";
              echo "</tr>";
              }
              echo "</table>";

              mysqli_close($con);

              echo "<form method='post' action='cancel.php' class='search-jobs-form text-center'>
                <button type='submit' class='btn btn-danger btn-lg btn-block text-white btn-search mt-2'>Cancelar</button>
              </form>";

            ?>

              

          </div>
        </div>
    </section>

    <footer class="site-footer">

        <div class="container">
          <div class="row mb-5 align-items-center justify-content-center">
            <div class="col-6 col-md-3 col-lg-3">
              <a href="contact.html" class="btn btn-primary border-width-2 btn-block"><span class="mr-2 icon-paper-plane"></span>Contacto</a>
            </div>
          </div>
  
          <div class="row mb-4 align-items-center justify-content-center">
            <div class="col-6 col-md-3 col-lg-3">
              <a href="https://www.tec.mx" target="_blank"><img width="100%" src="images/tec_logo_blanco.png" alt="Tecnológico de Monterrey"/></a>
            </div>
          </div>
  
          <div class="row text-center">
            <div class="col-12">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                  class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </footer>

  </div>

  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>

  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  <!-- <script src="js/bootstrap-select.min.js"></script> -->

  <script src="js/custom.js"></script>


</body>

</html>