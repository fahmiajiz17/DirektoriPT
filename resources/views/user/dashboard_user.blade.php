<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DirektoriPT - User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/twh.png" rel="icon">
  <link href="images/twh.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- CSS dan JS -->
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="">Direktori PT</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="">Home</a></li>
          <li><a class="nav-link scrollto" href="#data">Data</a></li>
          <li><a class="nav-link scrollto" href="#">List Perguruan Tinggi</a></li>
          <li class="dropdown"><a href="#"><span>Pencarian Data</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Sebaran Perguruan Tinggi</a></li>
              <li><a href="#">Kerja Sama Perguruan Tinggi</a></li>
              <li><a href="#">Inovasi Perguruan Tinggi</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Implementasi 4A</a></li>
              <li><a href="#">Implementasi MBKM</a></li>
              <li><a href="#">Pemantauan Tatap Muka</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ route('signout') }}">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Direktori PT <br>
            LLDIKTI WILAYAH 4</h1>
          <h2>Berisi data Perguruan Tinggi Aktif Versi LLDIKTI Wilayah IV berdasarkan ajuan dari Perguruan Tinggi Swasta di lingkungan LLDIKTI Wilayah IV </h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="images/lldikti.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Jumlah Section ======= -->
    <section id="jumlah" class="jumlah section-bg">
      <div class="container">

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <center>
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">Total Perguruan Tinggi</a></h4>
                <h3>440</h3>
                <hr>
                <p>Jumlah perguruan tinggi</p>
              </center>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <center>
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Total Program Studi</a></h4>
                <h3>2833</h3>
                <hr>
                <p>Jumlah program studi</p>
              </center>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <center>
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Total Bentuk PT</a></h4>
                <h3>7</h3>
                <hr>
                <p>Jumlah bentuk perguruan tinggi</p>
              </center>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <center>
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Total Wilayah</a></h4>
                <h3>2</h3>
                <hr>
                <p>Jumlah wilayah kabupaten/kota</p>
              </center>
            </div>
          </div>

        </div>
    </section>
    <!-- End Jumlah Section -->

    <!-- ======= Data Section ======= -->
    <section id="data" class="data">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Data</h2>
          <p>Data ini adalah Perguruan Tinggi Aktif Versi LLDIKTI Wilayah IV berdasarkan ajuan dari Perguruan Tinggi Swasta di lingkungan LLDIKTI Wilayah IV.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos-delay="100">
            <div class="box featured">
              <div id="JumlahPeringkatApt"></div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box featured">
              <div id="JumlahAkreditasiProdi"></div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <div id="JumlahPerBentuk"></div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
            <div class="box featured">
              <div id="JumlahPerProvinsi"></div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Data Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">HTML <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">CSS <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">JavaScript <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Photoshop <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Skills Section --> 

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
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
            <h3>LLDIKTI WILAYAH IV</h3>
            <p>
              Jl. PHH Mustafa No. 38<br>
              Bandung, Jawa Barat<br>
              Indonesia<br><br>
              <strong>Telepon/WA :</strong> 022-72756302/082244121226<br>
              <strong>Email :</strong> informasi@lldikti4.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sistem Informasi</h4>
            <ul>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://empat.lldikti4.id/login">Layanan Empat</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://jad.lldikti4.id/">JAD Online</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://ppid.lldikti4.or.id/">Homebase</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://skp.lldikti4.id/">SKP</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://bkd.lldikti4.id/">BKD</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://dikti.kemdikbud.go.id/">DIKTI</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://www.kemdikbud.go.id/">Kemendikbudristek</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://pddikti.kemdikbud.go.id/">PDDIKTI</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://www.bkn.go.id/">BKN</a></li>
              <li><i class="bx bx-chevron-right" target='_blank'></i> <a href="https://www.banpt.or.id/">BAN PT</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <p><i>Follow</i> Akun Media Sosial LLDIKTI <br> Wilayah IV</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/lldiktiwilayah4" target='_blank' class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/lldiktiwilayah4" target='_blank' class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/lldiktiwilayah4" target='_blank' class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/c/LLDIKTIWILAYAH4" target='_blank' class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong>ARMI LLDIKTI Wilayah IV</strong>. 2024
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- High Chart -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahPeringkatApt', {
        chart: {
          type: 'column',
          options3d: {
            enabled: true,
            alpha: 4,
            beta: 0,
            depth: 70,
            viewDistance: 25
          }
        },
        title: {
          text: 'Grafik Akreditasi Perguruan Tinggi'
        },
        subtitle: {
          text: 'Jumlah Berdasarkan Akreditasi Perguruan Tinggi'
        },
        xAxis: {
          categories: ['Belum Akreditasi', 'Terakreditasi A', 'Terakreditasi B', 'Baik', 'Baik Sekali', 'Unggul']
        },
        yAxis: {
          title: {
            text: 'Jumlah Perguruan Tinggi'
          }
        },
        plotOptions: {
          column: {
            dataLabels: {
              enabled: true,
              align: 'center',
              style: {
                textOutline: false
              }
            },
            borderWidth: 1,
            borderColor: 'black',
            depth: 25, // Jarak antar bar
          }
        },
        series: [{
          name: 'Perguruan Tinggi',
          data: [{
              y: 137,
              color: '#f45b5b'
            },
            {
              y: 1,
              color: '#7cb5ec'
            },
            {
              y: 73,
              color: '#e4d354'
            },
            {
              y: 193,
              color: '#90ed7d'
            },
            {
              y: 29,
              color: '#8085e9'
            },
            {
              y: 7,
              color: '#f7a35c'
            }
          ]
        }],
        legend: {
          enabled: false
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahPerBentuk', {
        chart: {
          type: 'column',
          options3d: {
            enabled: true,
            alpha: 4,
            beta: 0,
            depth: 70,
            viewDistance: 25
          }
        },
        title: {
          text: 'Grafik Perguruan Tinggi'
        },
        subtitle: {
          text: 'Jumlah Berdasarkan Bentuk Lembaga'
        },
        xAxis: {
          categories: ['Universitas', 'Institut', 'Sekolah Tinggi', 'Akademi', 'Politeknik', 'Akademi Komunitas', 'Belum Terdata']
        },
        yAxis: {
          title: {
            text: 'Jumlah Perguruan Tinggi'
          }
        },
        plotOptions: {
          column: {
            dataLabels: {
              enabled: true,
              align: 'center',
              style: {
                textOutline: false
              }
            },
            borderWidth: 1,
            borderColor: 'black',
            depth: 25, // Jarak antar bar
          }
        },
        series: [{
          name: 'Perguruan Tinggi',
          data: [{
              y: 50,
              color: '#f45b5b'
            },
            {
              y: 100,
              color: '#7cb5ec'
            },
            {
              y: 70,
              color: '#e4d354'
            },
            {
              y: 30,
              color: '#90ed7d'
            },
            {
              y: 40,
              color: '#8085e9'
            },
            {
              y: 25,
              color: '#f7a35c'
            }
          ]
        }],
        legend: {
          enabled: false
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahAkreditasiProdi', {
        chart: {
          type: 'column',
          options3d: {
            enabled: true,
            alpha: 4,
            beta: 0,
            depth: 70,
            viewDistance: 25
          }
        },
        title: {
          text: 'Grafik Akreditasi Program Studi'
        },
        subtitle: {
          text: 'Jumlah Berdasarkan Akreditasi Program Studi'
        },
        xAxis: {
          categories: ['Terakreditasi A', 'Terakreditasi B', 'Baik', 'Baik Sekali', 'Terakreditasi C', 'Unggul', 'Belum Akreditasi', 'Kadaluarsa', 'Belum Terakreditasi']
        },
        yAxis: {
          title: {
            text: 'Jumlah Program Studi'
          }
        },
        plotOptions: {
          column: {
            dataLabels: {
              enabled: true,
              align: 'center',
              style: {
                textOutline: false
              }
            },
            borderWidth: 1,
            depth: 25, // Jarak antar bar
          }
        },
        series: [{
          name: 'Perguruan Tinggi',
          data: [{
              y: 85,
              color: '#f45b5b'
            },
            {
              y: 668,
              color: '#7cb5ec'
            },
            {
              y: 996,
              color: '#e4d354'
            },
            {
              y: 437,
              color: '#90ed7d'
            },
            {
              y: 34,
              color: '#8085e9'
            },
            {
              y: 113,
              color: '#f7a35c'
            },
            {
              y: 0,
              color: '#696969'
            },
            {
              y: 253,
              color: '#A9A9A9 '
            },
            {
              y: 247,
              color: '#434348'
            },
          ]
        }],
        legend: {
          enabled: false
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahPerProvinsi', {
        chart: {
          type: 'column',
          options3d: {
            enabled: true,
            alpha: 4,
            beta: 0,
            depth: 70,
            viewDistance: 25
          }
        },
        title: {
          text: 'Grafik Perguruan Tinggi Berdasarkan Wilayah'
        },
        subtitle: {
          text: 'Jumlah Perguruan Tinggi Berdasarkan Wilayah'
        },
        xAxis: {
          categories: ['Jawa Barat', 'Banten']
        },
        yAxis: {
          title: {
            text: 'Jumlah Perguruan Tinggi'
          }
        },
        plotOptions: {
          column: {
            dataLabels: {
              enabled: true,
              align: 'center',
              style: {
                textOutline: false
              }
            },
            borderWidth: 1,
            borderColor: 'black',
            depth: 25, // Jarak antar bar
          }
        },
        series: [{
          name: 'Perguruan Tinggi',
          data: [{
              y: 356,
              color: '#f45b5b'
            },
            {
              y: 81,
              color: '#7cb5ec'
            },
          ]
        }],
        legend: {
          enabled: false
        }
      });
    });
  </script>
  <!-- End High Chart -->

</body>

</html>

<!-- Chart Old
  <script>
  var ctx = document.getElementById('JumlahPeringkatApt').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Belum Akreditasi", "Terakreditasi A", "Terakreditasi B", "Baik", "Baik Sekali", "Unggul"],
        datasets: [{
            label: 'Jumlah',
            data: [138, 1, 73, 193, 29, 7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
		legend: {
    	display: false
    },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById('JumlahPerBentuk').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Universitas", "Institut", "Sekolah Tinggi", "Akademi", "Politeknik", "Akademi Komunitas", "Belum Terdata"],
        datasets: [{
            label: 'Jumlah',
            data: [119, 24, 166, 73, 48, 3, 8],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
		legend: {
    	display: false
    },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById('JumlahAkreditasiProdi').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Terakreditasi A", "Terakreditasi B", "Baik", "Baik Sekali", "Terakreditasi C", "Unggul", "Belum Akreditasi", "Kadaluarsa", "Belum Terakreditasi"],
        datasets: [{
            label: 'Jumlah',
            data: [85, 669, 996, 437, 34, 113, 0, 255, 247],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
		legend: {
    	display: false
    },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById('JumlahPerProvinsi').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Jawa Barat", "Banten"],
        datasets: [{
            label: 'Jumlah',
            data: [357, 81],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		legend: {
    	display: false
    },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
-->