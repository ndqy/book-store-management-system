
<!DOCTYPE html>
<html lang="en">
<?php 

    session_start();
    require_once("php/ads/Connection.php"); 
    require_once('php/objects/BookObject.php'); 
    require_once('php/objects/CategoryObject.php');  
    require_once("lib/HashMap.php"); 
    require_once("php/ads/Book/BookModel2.php");
    if(isset($_GET['delall']))  unset($_SESSION['giohang']);
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    if(isset($_POST['them'])){
        $name = $_POST['txtName'];
        $author = $_POST['txtAuthor'];
        $img = $_POST['txtImg'];
        $price = $_POST['txtPrice'];
        $bia = $_POST['txtBia'];
        $sp = [$name, $author, $img, $price, $bia];
        $_SESSION['giohang'][] = $sp;
    }
    if(isset($_SESSION['giohang']) && isset($_GET['id']) && $_GET['id'] >=0){
        array_splice($_SESSION['giohang'],$_GET['id'],1);
    }
    function hienthi(){
        if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
            for($i=0; $i< sizeof($_SESSION['giohang']); $i++){

                echo "<tr>";
						echo "<th scope=\"row\">";
						  echo "<div class=\"d-flex align-items-center\">";
							echo "<img src=\"".$_SESSION['giohang'][$i][2]."\" class=\"img-fluid rounded-3\"";
							  echo "style=\"width: 120px;\" alt=\"Book\">";
							echo "<div class=\"flex-column ms-4\">";
							  echo "<p class=\"mb-2\">".$_SESSION['giohang'][$i][0]."</p>";
							  echo "<p class=\"mb-0\">".$_SESSION['giohang'][$i][1]."</p>";
							echo "</div>";
						  echo "</div>";
						echo "</th>";
						echo "<td class=\"align-middle\">";
						  echo "<p class=\"mb-0\" style=\"font-weight: 500;\">".$_SESSION['giohang'][$i][4]."</p>";
						echo "</td>";
						echo "<td class=\"align-middle\">";
						  echo "<div class=\"d-flex flex-row\">";
							//echo "<button class=\"btn btn-link px-2\"";
							 // echo "onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\">";
							 // echo "<i class=\"fas fa-minus\"></i>";
							//echo "</button>";

							echo "<input id=\"quantity".$i."\" min=\"0\" name=\"quantity".$i."\" value=\"1\" onclick=\"tinhtien()\" type=\"number\"";
							  echo "class=\"form-control form-control-sm\" style=\"width: 50px;\" />";

							//echo "<button class=\"btn btn-link px-2\"";
							  //echo "onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\">";
							 // echo "<i class=\"fas fa-plus\"></i>";
							//echo "</button>";
						  echo "</div>";
						echo "</td>";
						echo "<td class=\"align-middle\">";
						  echo "<p class=\"mb-0\" style=\"font-weight: 500;\">".$_SESSION['giohang'][$i][3]."</p>";
						echo "</td>";
						echo "<td class=\"align-middle\">";
						  echo "<a class=\"mb-0\" href=\"giohang.php?id=".$i."\" onload=\"tinhtien()\" style=\"font-weight: 500;\"><i class=\"bi bi-trash3\"></i></a>";
						echo "</td>";
					  echo "</tr>";

            }
        }
    }
    function thanhtien(){


        echo "<div class=\"col-lg-4 col-xl-3\">";
        echo "<div class=\"d-flex justify-content-between\" style=\"font-weight: 500;\">";
        echo "<p class=\"mb-2\">Tổng tiền sách:</p>";
        echo "<p id=\"tongtien\" class=\"mb-2\"></p>";
        echo "</div>";
        echo "<div class=\"d-flex justify-content-between\" style=\"font-weight: 500;\">";
        echo "<p class=\"mb-2\">Phí vận chuyển:</p>";
        echo "<p id=\"ship1\" class=\"mb-2\"></p>";
        echo "</div>";
        echo "<div class=\"d-flex justify-content-between\" style=\"font-weight: 500;\">";
        echo "<p class=\"mb-0\">Giảm giá phí vận chuyển:</p>";
        echo "<p id=\"ship2\" class=\"mb-0\"></p>";
        echo "</div>";

        echo "<hr class=\"my-4\">";

        echo "<div class=\"d-flex justify-content-between mb-4\" style=\"font-weight: 500;\">";
        echo "<p class=\"mb-2\">Tổng thanh toán:</p>";
        echo "<p id=\"tongtien2\" class=\"mb-2\"></p>";
        echo "</div>";

    }
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
    <script lang="JavaScript">
        window.onload =function(){

            var arr = new Array();
            
            <?php 
            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                for($i=0; $i< sizeof($_SESSION['giohang']); $i++){
                    ?>
                    arr.push('<?php echo $_SESSION['giohang'][$i][3] ?>');
            <?php
                }
            }
            ?>
            var tmp=0;
            var sl ;
            for(var i=0; i<arr.length; i++){
                sl = document.getElementById('quantity'+i).value;
                tmp += arr[i] * sl ;

            }
            var ship1 = "0Đ";
            var ship2 = "0Đ";
            if(arr.length > 0){
                ship1 = "30000Đ";
                ship2 = "-30000Đ";
            }
            document.getElementById('tongtien').innerHTML = tmp;
            document.getElementById('tongtien2').innerHTML = tmp;
            document.getElementById('ship1').innerHTML = ship1;
            document.getElementById('ship2').innerHTML = ship2;
        }
        function tinhtien(){
            
            
            var arr = new Array();
            <?php 
            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                for($i=0; $i< sizeof($_SESSION['giohang']); $i++){
                    ?>
                    arr.push('<?php echo $_SESSION['giohang'][$i][3] ?>');
            <?php
                }
            }
            ?>
            var tmp=0;
            var sl ;
            for(var i=0; i<arr.length; i++){
                sl = document.getElementById('quantity'+i).value;
                tmp += arr[i] * sl ;

            }
            document.getElementById('tongtien').innerHTML = tmp;
            document.getElementById('tongtien2').innerHTML = tmp;
        }

    </script>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Trang chủ</a></li>
          <li>Giỏ hàng</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->
    <section class="h-100 h-custom">
    <form method="post" action="themdonhang.php">
    <div class="container h-100 py-1">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Sách</th>
                        <th scope="col">Loại bìa</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php hienthi() ?>
                    </tbody>
                    </table>
                </div>
                <a class="btn mb-3 btn-primary" href="giohang.php?delall" >Xóa tất cả</a>
                <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-8 col-xl-9 mb-4 mb-md-0">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="user-name" class="form-label">Tên người nhận</label>
                                        <input type="text" class="form-control"  name="txtName" required>
                                        <div class="invalid-feedback">
                                            Hãy nhập vào tên người nhận
                                            </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="user-name" class="form-label">Số điện thoại người nhận</label>
                                        <input type="text" class="form-control"  name="txtPhone" id="txtPhone" required>
                                        <div class="invalid-feedback">
                                            Hãy nhập vào SĐT người nhận
                                            </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <label for="user-name" class="form-label">Địa chỉ người nhận</label>
                                        <input type="text" class="form-control"  name="txtAddress" required>
                                        <div class="invalid-feedback">
                                            Hãy nhập vào địa chỉ người nhận
                                            </div>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    
                                    <div class="col-lg-12">
                                        <label for="user-name" class="form-label">Ghi chú</label>
                                        <textarea class="form-control" rows="4" name="txtNote"></textarea>
                                    </div>

                                </div>
                            
                            </div>
                            
                            <?php thanhtien()?>

                            <button type="button" class="btn btn-primary btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <input type="submit" name="dathang" class="btn btn-primary" value="Đặt hàng">
                                </div>
                            </button>
                        
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </div>
    </div>
    </form>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

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