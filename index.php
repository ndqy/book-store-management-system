
<!DOCTYPE html>
<html lang="en">
<?php 
    require_once("php/ads/Connection.php"); 
    require_once('php/objects/BookObject.php'); 
    require_once('php/objects/CategoryObject.php');  
    require_once("lib/HashMap.php"); 
    require_once("php/ads/Book/BookModel2.php")
  ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="lib/imgs/favicon.png" rel="icon">
  <link href="lib/imgs/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="lib/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="lib/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="lib/imgs/logo.png" alt="">
        <span>BookStore</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Trang chủ</a></li>
          <li><a class="nav-link scrollto" href="#about">Giới thiệu</a></li>
          <li><a class="nav-link scrollto" href="danhmuc.php">Danh mục</a></li>
          <li><a href="blog.html">Review sách</a></li>
          <!--<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->

          <li class="dropdown megamenu"><a href="#"><span>Danh mục</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="#">Column 1 link 1</a>
                <a href="#">Column 1 link 2</a>
                <a href="#">Column 1 link 3</a>
              </li>
              <li>
                <a href="#">Column 2 link 1</a>
                <a href="#">Column 2 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
              <li>
                <a href="#">Column 3 link 1</a>
                <a href="#">Column 3 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="#contact">Liên hệ</a></li>
          <li><a class="getstarted scrollto" href="giohang.php">Giỏ hàng</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= Ở đâu rẻ nhất ở đây rẻ hơn Cam kết bán sách rẻ nhất thị trường Việt Nam -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Ở đâu <i>RẺ NHẤT </i><br>     Ở đây <i>RẺ HƠN</i></h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Cam kết bán sách rẻ nhất thị trường Việt Nam</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#portfolio" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Mua sách</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="lib/imgs/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
     <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Sách mới</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4 portfolio-container">
            <?php
              $bm = new BookModel2();
              $items = $bm->getNewBook();
              foreach($items as $item){
                $img = $item->getBook_image();
                $img = substr($img,9);
                echo "<div class=\"col-xl-4 col-md-6 portfolio-item filter-app\">";
                  echo "<div class=\"portfolio-wrap\">";
                    echo "<a href=\"chitiet.php?id=".$item->getBook_id()."\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                    echo "<div class=\"portfolio-info justify-content-center\">";
                      echo "<h4><a href=\"chitiet.php?id=".$item->getBook_id()."\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                      echo "<p>".$item->getBook_author_name()."</p>";
                      echo "<span>".$item->getBook_price()."đ</span>";
                    echo "</div>";
                  echo "</div>";
                echo "</div><!-- End Portfolio Item -->";
              }
            ?>
            

          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->


	<!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">
		    <header class="section-header">
          <p>Có thể bạn sẽ thích</p>
        </header>
		

        <div class="col-lg-12 mb-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <div class="section-title">
            <h2>Sách thiếu nhi</h2>
          </div>
          <div class="row gy-4 portfolio-container justify-content-center">
            <?php
                  $bm = new BookModel2();
                  $items = $bm->getBooksCate(1,1,5);
                  foreach($items as $item){
                    $img = $item->getBook_image();
                    $img = substr($img,9);
                    echo "<div class=\"col-xl-3 col-md-6 portfolio-item filter-books\" style=\"width: 20%\">";
                      echo "<div class=\"portfolio-wrap\">";
                        echo "<a href=\"chitiet.php?id=".$item->getBook_id()."\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                        echo "<div class=\"portfolio-info\">";
                          echo "<h4><a href=\"chitiet.php?id=".$item->getBook_id()."\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                          echo "<p>".$item->getBook_author_name()."</p>";
                          echo "<span>".$item->getBook_price()."đ</span>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div><!-- End Portfolio Item -->";
                  }
              ?>
              <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="danhmuc.php" class="btn-buy ">Xem thêm</a>
                </div>
          </div>
        </div>
		
        <div class="col-lg-12 mb-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <div class="section-title">
            <h2>Sách tiếng Việt</h2>
          </div>
            <div class="row gy-4 portfolio-container text-center">
              <?php
                    $bm = new BookModel2();
                    $items = $bm->getBooksCate(58,1,5);
                    foreach($items as $item){
                      $img = $item->getBook_image();
                      $img = substr($img,9);
                      echo "<div class=\"col-xl-3 col-md-6 portfolio-item filter-books\" style=\"width: 20%\">";
                        echo "<div class=\"portfolio-wrap\">";
                          echo "<a href=\"chitiet.php?id=".$item->getBook_id()."\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                          echo "<div class=\"portfolio-info\">";
                            echo "<h4><a href=\"chitiet.php?id=".$item->getBook_id()."\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                            echo "<p>".$item->getBook_author_name()."</p>";
                            echo "<span>".$item->getBook_price()."đ</span>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div><!-- End Portfolio Item -->";
                    }
                ?>
                <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="danhmuc.php" class="btn-buy ">Xem thêm</a>
                </div>
            </div>
            
          </div>
		  
        <div class="col-lg-12 mb-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <div class="section-title">
            <h2>Sách CNTT</h2>
          </div>
          <div class="row gy-4 portfolio-container">
            <?php
                  $bm = new BookModel2();
                  $items = $bm->getBooksCate(60,1,5);
                  foreach($items as $item){
                    $img = $item->getBook_image();
                    $img = substr($img,9);
                    echo "<div class=\"col-xl-3 col-md-6 portfolio-item filter-books\" style=\"width: 20%\">";
                      echo "<div class=\"portfolio-wrap\">";
                        echo "<a href=\"chitiet.php?id=".$item->getBook_id()."\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                        echo "<div class=\"portfolio-info\">";
                          echo "<h4><a href=\"chitiet.php?id=".$item->getBook_id()."\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                          echo "<p>".$item->getBook_author_name()."</p>";
                          echo "<span>".$item->getBook_price()."đ</span>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div><!-- End Portfolio Item -->";
                  }
              ?>
              <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="danhmuc.php" class="btn-buy ">Xem thêm</a>
                </div>
            </div>
        </div>
      </div>
	  </div>
	  
    </section><!-- End Popular Courses Section -->



    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Non consectetur a erat nam at lectus urna duis?
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                    Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                    Varius vel pharetra vel turpis nunc eget lorem dolor?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Review sách</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="lib/imgs/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="lib/imgs/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="lib/imgs/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Liên hệ với chúng tôi</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Địa chỉ</h3>
                  <p>387-389 Hai Bà Trưng <br> Quận 3 TP HCM</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Hotline</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Mở cửa</h3>
                  <p>T2 - T6<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="lib/imgs/logo.png" alt="">
              <span>FlexStart</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="lib/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="lib/js/main.js"></script>

</body>

</html>