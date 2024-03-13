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
        <img src="lib/imgs/logo.scrollto..png" alt="">
        <span>BookStore</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Trang chủ</a></li>
          <li><a class="nav-link scrollto" href="#about">Giới thiệu</a></li>
          <li><a class="nav-link scrollto active" href="danhmuc.php">Danh mục</a></li>
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
          <li>Danh mục</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="row">

          

          <div class="col-lg-3">

            <div class="sidebar">

              <h3 class="sidebar-title">Tìm kiếm</h3>
              <div class="sidebar-item search-form">
                <form action="" method="post">
                  <input type="text" name="txtName">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Danh mục</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="danhmuc.php">Tất cả</a></li>
                  <?php
                    $bm = new BookModel2();
                    $items = $bm->getCategories();

                    foreach($items as $item){
                        echo "<li><a href=\"danhmuc.php?id=".$item->getCategory_id()."&name=".$item->getCategory_name()."\">".$item->getCategory_name()."</a></li>";
                    }

                  ?>
                </ul>
              </div><!-- End sidebar categories-->


              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                <?php
                    $bm = new BookModel2();
                    $items = $bm->getCategories();

                    foreach($items as $item){
                        echo "<li><a href=\"danhmuc.php?id=".$item->getCategory_id()."&name=".$item->getCategory_name()."\">".$item->getCategory_name()."</a></li>";
                    }

                  ?>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
		  
		<div class="col-lg-9 ">
        <div id="popular-courses" class="courses">
            <div class="row gy-4 portfolio-container justify-content-center">
                <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $bm = new BookModel2();
                    $similar = new BookObject();
                    if(isset($_POST['txtName'])){
                      $similar->setBook_name($_POST['txtName']);
                    }
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $items = $bm->getBooksCate($id,$page,10);
                        echo "<h3 class=\"sidebar-title\">".$_GET['name']."</h3>";
                        $url = "danhmuc.php?id=$id&name=".$_GET['name']."&";
                    }else{
                        $items = $bm->getBooks2($similar,$page,10);
                        echo "<h3 class=\"sidebar-title\">Tất cả sách</h3>";
                        $url = "danhmuc.php?";
                        $id = 0 ;
                    }
                   
                    
                    foreach($items as $item){
                    $img = $item->getBook_image();
                    $name = $item->getBook_name();
                if(strlen($name) > 52){
                    $tmp = substr($name,0,52);
                    $name = substr($name,0,strripos($tmp," "))." ...";
                }
                    $img = substr($img,9);
                    
                    echo "<div class=\"col-xl-3 col-md-6 portfolio-item filter-books\" style=\"width: 20%\">";
                        echo "<div class=\"portfolio-wrap\">";
                        echo "<a href=\"chitiet.php?id=".$item->getBook_id()."\" data-gallery=\"portfolio-gallery-app\" class=\"glightbox\"><img src=\"".$img."\" class=\"img-fluid mt-3\" alt=\"".$item->getBook_name()."\"></a>";
                        echo "<div class=\"portfolio-info\">";
                            echo "<h4><a href=\"chitiet.php?id=".$item->getBook_id()."\" title=\"Xem chi tiết\">".$name."</a></h4>";
                            echo "<p>".$item->getBook_author_name()."</p>";
                            echo "<span>".$item->getBook_price()."đ</span>";
                        echo "</div>";
                        echo "</div>";
                    echo "</div><!-- End Portfolio Item -->";
                    }
                    
                    echo getPagination($url,$bm->getTotalBook($id),$page,10)
                ?>
            </div>
        </div> 
        </div>

    </section><!-- End Blog Section -->

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

<?php
 function getPagination($url, $total, $page, $totalperpage) {
    $tmp = "";
    
    // Đếm tổng số trang
    $pages = (int) ($total / $totalperpage);
    if ($total % $totalperpage != 0) {
        $pages++;
    }
    
    // Trang không hợp lệ thì quay về trang 1
    if ($page > $pages || $page <= 0) {
        $page = 1;
    }
    
    $tmp .= "<nav aria-label=\"...\">";
    $tmp .= "<ul class=\"pagination justify-content-center\">";
    
    if ($page == 1) {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\" disabled=\"disabled\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
    } else {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page - 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
    }
    
    // Left Current
    $leftcurrent = "";
    $count = 0;
    
    for ($i = $page - 1; $i > 0; $i--) {
        $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $i . "\">" . $i . "</a></li>" . $leftcurrent;
        
        if (++$count >= 2) {
            break;
        }
    }
    
    if ($page == 4) {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=1\">" . 1 . "</a></li>";
    }
    
    if ($page > 4) {
        $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" disabled=\"disabled\">...</a></li>" . $leftcurrent;
        $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=1" . "\"><span aria-hidden=\"true\">1</span></a></li>" . $leftcurrent;
    }
    
    $tmp .= $leftcurrent;
    $tmp .= "<li class=\"page-item\"><a class=\"page-link active\" href=\"#\">" . $page . "</a></li>";
    
    // Right Current
    $rightcurrent = "";
    $count = 0;
    
    for ($i = $page + 1; $i < $pages; $i++) {
        $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $i . "\">" . $i . "</a></li>";
        
        if (++$count >= 2) {
            break;
        }
    }
    
    if ($page < $pages - 3) {
        $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" disabled=\"disabled\">...</a></li>";
        $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $pages . "\">" . $pages . "</a></li>";
        $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
    }
    
    $tmp .= $rightcurrent;
    
    if ($page == $pages - 2 || $page == $pages - 3) {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 2) . "\">" . $pages . "</a>";
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
    }
    
    if ($page == $pages - 1) {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\">".$pages . "</a>";
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";

    }
    
    if ($page == $pages) {
        $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"false\" disabled=\"disabled\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
    }
    
    $tmp .= "</div>";
    $tmp .= "</div>";
    
    return $tmp;
}
?>