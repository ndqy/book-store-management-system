<?php
  // session_start();
      
  // if(!isset($_SESSION['id']) || $_SESSION['id']<0){
  //     header('Location: ../../../php/ads/User/UserLogin.php');    
  // }
  // if(!isset($_SESSION['permis']) || $_SESSION['permis']<3){
  //     header('Location: ../../../php/ads/User/UserLogin.php?err=nopermis');    
  // }
        require_once("../../../php/ads/Connection.php");    
        require_once("../../ads/main/Header.php");
        require_once("../../ads/main/Sidebar.php");
        require_once( "../../../php/ads/User/UserLibrary.php");
        require_once( "../../../php/ads/Category/CategoryLibrary.php");
        require_once("BookLibrary.php")
?>        
    <main id="main" class="main">
        <div class="pagetitle d-flex">
        <h1>Danh sách Cuốn sách</h1>
        <nav class="ms-auto">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/btl/view"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item">Sách</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->
        <section id="section" class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body my-3">
                        <?php 
                          $book = new BookObject();
                          $bm = new BookModel();
                          $ul = new UserLibrary();
                          $bl = new BookLibrary();
                          if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }else{
                            $page = 1;
                          }
                          if(isset($_GET['trash'])){
                            $url = "BookList.php?trash&";
                            $book->setBook_deleted(true);
                          }else{
                          ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#addBook">
                            <i class="bi bi-journal-plus"></i> Thêm mới</button>
                          <?php
                            $url = "BookList.php?";
                            $book->setBook_deleted(false);
                            $bl->addBook($book);
                          }
                          $items = $bm->getBooks($book, $page ,12);
                          
                          $total = $bm->getTotalBook($book);
                          $bl->viewBooks($items, $total, $book ,$page,12);
                          echo $ul->getPagination($url,$total,$page,12);
                          //echo $ul->creatChart($items);
                          ?>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div> <!-- col-lg-12 -->
            </div><!-- row -->
        </section>
    </main><!-- End #main -->
    <script type="text/javascript">
    function PreviewImg(){
        var fileSelect = document.getElementById("fileToUpload").files;
        if(fileSelect.length>0){
          
            var fileToLoad = fileSelect[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent){
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("swiper-slide").innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
    </script>
<?php
        require_once("../../ads/main/Footer.php");
?>
<?php 

    echo "<div class=\"modal fade\" id=\"modalDialogScrollable\" tabindex=\"-1\">";
	echo "<div class=\"modal-dialog modal-xl modal-dialog-scrollable\">";
  echo "<form method=\"post\" action=\"BookAE.php\" class=\"needs-validation\" novalidate enctype=\"multipart/form-data\">";        
	  echo "<div class=\"modal-content\">";
		echo "<div class=\"modal-header\">";
		  echo "<h5 class=\"modal-title\">Modal Dialog Scrollable</h5>";
		  echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
		echo "</div>";
		echo "<div class=\"modal-body\">";
    //$target_dir = "../../../lib/imgs/";
   // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
echo "<!-- ======= Portfolio Details Section ======= -->";
    echo "<section id=\"portfolio-details\" class=\"portfolio-details\">";
      echo "<div class=\"container\">";

		echo "<div class=\"row\">";

          echo "<div class=\"col-lg-5\">";
            echo "<div class=\"portfolio-details-slider swiper\">";
                echo "<div class=\"swiper-wrapper align-items-center\">";

                        echo "<div class=\"swiper-slide\" id=\"swiper-slide\">";
                       // echo "<img src=\"". $target_file."\" alt=\"\">";
                        echo "</div>";
                echo "</div>";
                
            echo "</div>";
			echo "<div class=\"portfolio-info\">";
              echo "<h3>Project information</h3>";
              echo "<ul>";
                echo "<li><strong>Category</strong>: Web design</li>";
                echo "<li><strong>Client</strong>: Giao Dịch Theo Xu Hướng Để Kiếm Sống</li>";
                echo "<li><strong>Project date</strong>: 01 March, 2020</li>";
                echo "<li><strong>Project URL</strong>: <a href=\"#\">www.example.com</a></li>";
                echo "<li><strong>Ảnh</strong>: <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"  onchange=\"PreviewImg()\"></li>";
              echo "</ul>";
            echo "</div>";
          echo "</div>";
          
          echo "<div class=\"col-lg-7\">";

            echo "<div class=\"portfolio-description\">";
              echo "<h2>This is an example of portfolio detail</h2>";
              echo "<p>";
                echo "Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.";

			  echo "</p>";
            echo "</div>";
          echo "</div>";

		echo "</div>";

      echo "</div>";
    echo "</section><!-- End Portfolio Details Section -->";
		echo "</div>";
		echo "<div class=\"modal-footer\">";
		  echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>";
		  echo "<button type=\"button\" class=\"btn btn-primary\">Save changes</button>";
		echo "</div>";
	  echo "</div>";
    echo "</form>";
	echo "</div>";
  echo "</div><!-- End Modal Dialog Scrollable-->";

?>