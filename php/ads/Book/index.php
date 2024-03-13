<?php
//  session_start();
    
//  if(!isset($_SESSION['id']) || $_SESSION['id']<0){
//      header('Location: UserLogin.php');    
//  }
//  if(!isset($_SESSION['permis']) || $_SESSION['permis']<3){
//      header('Location: UserLogin.php?err=nopermis');    
//  }
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
                          if(isset($_POST['txtName'])){
                            $book->setBook_name($_POST['txtName']);
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

