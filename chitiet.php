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
          <li><a class="nav-link scrollto" href="index.php">Trang chủ</a></li>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Trang chủ</a></li>
          <li>Thông tin sách</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = 1;
    }
    $bm = new BookModel2();
    $item = $bm->getBook2($id);
    echo "<!-- ======= Portfolio Details Section ======= -->";
        echo "<section id=\"portfolio-details\" class=\"portfolio-details\">";
        echo "<div class=\"container\">";
        $img = $item->getBook_image();
        $img = substr($img,9);
            echo "<div class=\"row\">";

            echo "<div class=\"col-lg-4\">";
                echo "<div class=\"portfolio-info\">";
                    echo "<h3 style=\"font-size: 22px\">Hình ảnh cuốn sách</h3>";
                    echo "<div class=\"portfolio-details-slider swiper\">";
                        echo "<div class=\"swiper-wrapper align-items-center\">";

                            echo "<div class=\"swiper-slide\" id=\"swiper-slide\">";
                                echo "<img src=\"".$img."\" alt=\"".$item->getBook_name()."\">";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class=\"portfolio-info align-items-center\">";
                  echo "<h3 style=\"font-size: 22px\">Thông tin chi tiết</h3>";
                  echo "<ul>";
                      echo "<li><strong>Tên sách</strong>: ".$item->getBook_name()."";
                      echo "</li>";
                      echo "<li><strong>Tác giả</strong>: ".$item->getBook_author_name()."";
                      echo "</li>";
                      echo "<li><strong>Dịch giả</strong>: ".$item->getBook_translator()."";
                      echo "</li>";
                      echo "<li><strong>Nhà xuất bản</strong>: ".$item->getBook_publisher()."";
                      echo "</li>"; 
                      echo "<li><strong>Giá bán</strong>: ".$item->getBook_price()." VND";
                      echo "</li>";
                      echo "<li><strong>Số trang</strong>: ".$item->getBook_page()."";
                      echo "</li>";
                      echo "<li><strong>Kích thước</strong>: ".$item->getBook_size()."";
                      echo "</li>";
                      echo "<li><strong>Loại bìa</strong>: ".($item->getBook_name() ? "Bìa cứng" : "Bìa mềm")."";
                      echo "</li>";
                    
                    echo "</ul>";

                    echo "<div class=\"pricing mb-3\">";
                      echo "<form action=\"giohang.php\" method=\"post\">";
                      echo "<input type=\"hidden\" name=\"txtName\" value=\"".$item->getBook_name()."\">";
                      echo "<input type=\"hidden\" name=\"txtPrice\" value=\"".$item->getBook_price()."\">";
                      echo "<input type=\"hidden\" name=\"txtAuthor\" value=\"".$item->getBook_author_name()."\">";
                      echo "<input type=\"hidden\" name=\"txtImg\" value=\"".$img."\">";
                      echo "<input type=\"hidden\" name=\"txtBia\" value=\"".($item->getBook_name() ? "Bìa cứng" : "Bìa mềm")."\">";
                      echo "<input type=\"submit\" name=\"them\" class=\"btn-buy\" style=\"padding: 8px 25px 10px 25px\" value=\"".$item->getBook_price()."Đ\">";
                      echo "<input type=\"submit\" name=\"them\" class=\"btn-buy\" style=\"padding: 8px 25px 10px 25px\" value=\"Mua sách\">";
                      echo "</form>";
                    echo "</div>";

                  echo "</div>";
            echo "</div>";

            echo "<div class=\"col-lg-8\">";

                echo "<div class=\"portfolio-info\" id=\"portfolio-info-img\" height=\"auto\">";
                echo "<h3 style=\"font-size: 22px\">Mô tả cuốn sách</h3>";
                echo str_replace("../../../","", $item->getBook_notes());
                echo "</div>";
            echo "</div>";

            echo "</div>";

        echo "</div>";
        echo "</section><!-- End Portfolio Details Section -->";

        
?>

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
                        echo "<a href=\"#\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                        echo "<div class=\"portfolio-info\">";
                          echo "<h4><a href=\"#\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                          echo "<p>".$item->getBook_author_name()."</p>";
                          echo "<span>".$item->getBook_price()."đ</span>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div><!-- End Portfolio Item -->";
                  }
              ?>
              <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="#" class="btn-buy ">Xem thêm</a>
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
                          echo "<a href=\"#\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                          echo "<div class=\"portfolio-info\">";
                            echo "<h4><a href=\"#\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                            echo "<p>".$item->getBook_author_name()."</p>";
                            echo "<span>".$item->getBook_price()."đ</span>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div><!-- End Portfolio Item -->";
                    }
                ?>
                <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="#" class="btn-buy ">Xem thêm</a>
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
                        echo "<a href=\"#\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                        echo "<div class=\"portfolio-info\">";
                          echo "<h4><a href=\"#\" title=\"Xem chi tiết\">".$item->getBook_name()."</a></h4>";
                          echo "<p>".$item->getBook_author_name()."</p>";
                          echo "<span>".$item->getBook_price()."đ</span>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div><!-- End Portfolio Item -->";
                  }
              ?>
              <div class="col-lg-2 mb-5 flex-column justify-content-center">
                  <a href="#" class="btn-buy ">Xem thêm</a>
                </div>
            </div>
        </div>
      </div>
	  </div>
	  
    </section><!-- End Popular Courses Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
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