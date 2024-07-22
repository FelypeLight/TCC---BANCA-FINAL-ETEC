<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Planos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/faviconProvisorio.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/styleClinica.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="../index.html">Lif4Pets</a></h1>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../homepageClinica.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Planos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">



    <section class="inner-page">
      <div class="container">
        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
          <div class="container">

            <div class="section-title" data-aos="zoom-out">
              <h2>preços</h2>
              <p>Nossos planos</p>
            </div>

            <div class="row d-flex justify-content-center">

              <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                  <h3>Mensal</h3>
                  <h4><sup>R$</sup>150<span> / mês</span></h4>
                  <ul>
                    <li>Agendamento básico</li>
                    <li>Gestão de 100 clientes</li>
                    <li>Lembretes por e-mail</li>

                  </ul>
                  <div class="btn-wrap">
                    <a href="#" class="btn-buy" id="monthly-plan-link">Adquira já</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <div class="box" data-aos="zoom-in" data-aos-delay="200">
                  <span class="advanced">Anual</span>
                  <h3>Anual</h3>
                  <h4><sup>R$</sup>1000<span> / ano</span></h4>
                  <h5 class="discount">Mais de 40% de desconto!</h5>
                  <ul>
                    <li>Agendamento básico</li>
                    <li>Gestão de 100 clientes</li>
                    <li>Lembretes por e-mail</li>

                  </ul>
                  <div class="btn-wrap">
                    <a href="#" class="btn-buy" id="annual-plan-link">Adquira já</a>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End Pricing Section -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Lif4Pets</h3>
      <p>O Amor Começa no Cuidado</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Lif4Pets</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- Stripe Payment Links -->
  <script>
    document.getElementById('monthly-plan-link').href = 'https://buy.stripe.com/test_eVag1J3ld6Fwg8MdQS';
    document.getElementById('annual-plan-link').href = 'https://buy.stripe.com/test_dR6g1J3ld2pg3m0003';
  </script>

</body>

</html>