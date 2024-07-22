<!DOCTYPE html>
<html lang="pt-">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lif4Pets</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Favicons-->
  <link href="assets/img/faviconProvisorio.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!--Google Fonts-->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!--CSS-->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/styleClinica.css" rel="stylesheet">
</head>

<body>

  <!--  Header  -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Lif4Pets</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="clinica\planoselect.php">Planos</a></li>
          <li><a class="nav-link scrollto" href="#team">Equipe</a></li>

          <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown left-dropdown">
                <a href="clinica/login.php"><span>Login</span> <i class="bi bi-chevron-right"></i></a>
              </li>
              <li class="dropdown left-dropdown">
                <a href="clinica/register.php"><span>Cadastre-se</span> <i class="bi bi-chevron-right"></i></a>              
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bem-vindo a <span>Lif4Pets</span></h2>
          <p class="fs-3 animate__animated animate__fadeInUp">O amor começa no Cuidado</p>
          <a href="clinica/register.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cadastre-se</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Torne a Gestão de Consultas Veterinárias Mais Eficiente com
            Nosso Sistema de Agendamento!</h2>
          <p class="fs-3 animate__animated animate__fadeInUp">Modernize sua clínica veterinária com um sistema de
            agendamento eficiente hoje mesmo!</p>
          <a href="clinica\planoselect.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Veja nossos planos</a>
        </div>
      </div>




      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Sobre</h2>
          <p>Sobre nós</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
              Bem-vindo à Lif4Pets, uma iniciativa nascida do esforço e criatividade dos estudantes da Etec Drª Ruth
              Cardoso. Nosso projeto é mais do que apenas uma ideia; é o resultado de meses de dedicação, colaboração e
              paixão pela busca do conhecimento.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Estamos comprometidos em fornecer uma plataforma acessível e
                intuitiva que conecte os proprietários de animais de estimação às clínicas veterinárias de forma rápida
                e eficaz.</li>
              <li><i class="ri-check-double-line"></i>Nosso desejo é ser reconhecido como líderes no campo do
                agendamento de consultas veterinárias, impulsionando a inovação e a praticidade na indústria de cuidados
                com animais de estimação.</li>
              <li><i class="ri-check-double-line"></i>Nossos valores são Eficiência, Conveniência, Qualidade,
                Transparência e Inovação.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">

            <img src="https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/etec-sao-vicente.jpg"
              alt="" width="80%" style="border-radius: 5px;">
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-out">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Agendamento rápido</h3>
            <p> Facilite a vida do seu pet e agende online com praticidade e segurança, garantindo sempre o melhor
              cuidado para seu companheiro peludo!</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <img src="assets\img\cachorrinho.png" alt="" srcset="" width="50%">
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Serviços</h2>
          <p>O que temos a oferecer</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box" data-aos="zoom-in-left">
              <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Consultas</a></h4>
              <p class="description">Agende consultas veterinárias próximas a você com facilidade! Nosso sistema online
                elimina deslocamentos longos.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Calendário Vacinação</a></h4>
              <p class="description">Com nosso sistema integrado, você pode acompanhar as vacinas aplicadas, receber
                lembretes automáticos e garantir a proteção contínua dos seus animais.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Histórico Médico dos Animais</a></h4>
              <p class="description">Manter um registro completo e acessível do histórico médico de cada animal,
                incluindo consultas anteriores, tratamentos realizados, vacinações e exames de saúde.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Avaliação e Comentários</a></h4>
              <p class="description">Oferecer a oportunidade para os clientes avaliarem e comentarem sobre suas
                experiências, ajudando a melhorar continuamente os serviços oferecidos pela clínica.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Gestão de Pagamentos</a></h4>
              <p class="description">Facilitar o processo de pagamento das consultas e serviços veterinários, oferecendo
                opções de pagamento online, faturamento eletrônico e integração com sistemas de pagamento populares.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Redução do Tempo de Espera</a></h4>
              <p class="description">Nosso sistema de agendamento otimiza o fluxo de pacientes, reduzindo
                significativamente o tempo de espera tanto para os animais quanto para seus proprietários.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Duvidas</h2>
          <p>Dúvidas Frequentes</p>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Como posso fazer um agendamento? <i
                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Fazendo o cadastro em nosso site, e agendando consulta por la mesmo.
                Você pode verificar quais são as clinicas perto de você que fazem parte do nosso grupo de clinicas
                associadas.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Posso alterar ou cancelar um
              agendamento? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Sim! Você tem a opção de alterar consultas pelo nosso proprio site, como cancelar agendamento devido um
                imprevisto, alterar data de consulta ou vacinação, ou ate mesmo horario. Mas com horas de antecêdencia
                do agendamento.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Quais são as consequências de chegar
              atrasado para um agendamento? <i class="bi bi-chevron-down icon-show"></i><i
                class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Muitas empresas têm políticas relacionadas a atrasos em agendamentos, então é importante conhecê-las
                para evitar problemas, sendo de responsabilidade de cada clinica.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Como posso confirmar meu agendamento?
              <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Nossa empresa irá enviar um lembrete de agendamento no e-mail cadastrado, mensagem de texto no whatsapp
                ou sms.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">E se eu precisar de um horário que
              não está disponível para agendamento? <i class="bi bi-chevron-down icon-show"></i><i
                class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Se não houver horários disponíveis, é sempre bom entrar em contato com a clinica ou o profissional para
                ver se há alguma opção alternativa ou se é possível abrir horários extras.
              </p>
            </div>
          </li>
        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Equipe</h2>
          <p>Nosso grupo TCC</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="assets\img\peterson.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>Peterson Wollinger Ferreira</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets\img\diorante.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>Diorante Lemos Pereira</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets\img\Felype.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>Felype Silveira Dantas</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets\img\Rogerio.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>Rogério Gonçalves Moyano</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets\img\glaucio.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>Glaucio Lundgren Bezerra Filho </h4>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Contato</h2>
          <p>Fale conosco</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localização:</h4>
                <p>Pr. Cel. Lopes, 387 - Centro, São Vicente - SP, 11310-020</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Lif4pets-contato@liforpet.com.br</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefone:</h4>
                <p>+55 (13) 99141-1300</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Seu Nome" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensagem</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>