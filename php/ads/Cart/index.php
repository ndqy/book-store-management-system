<?php
    // session_start();
        
    // if(!isset($_SESSION['id']) || $_SESSION['id']<0){
    //     header('Location: UserLogin.php');    
    // }
    // if(!isset($_SESSION['permis']) || $_SESSION['permis']<3){
    //     header('Location: UserLogin.php?err=nopermis');    
    // }
        require_once("../../../php/ads/Connection.php");    
        require_once("../../ads/main/Header.php");
        require_once("../../ads/main/Sidebar.php");
        require_once( "../../../php/ads/User/UserLibrary.php");
        require_once("CartLibrary.php")
?>        
    <main id="main" class="main">
        <div class="pagetitle d-flex">
        <h1>Danh sách hóa đơn</h1>
        <nav class="ms-auto">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/btl/view"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item">Hóa đơn</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
            
            <?php 
                $cart = new CartObject();
                $cm = new CartModel();
                $cl = new CartLibrary();
                $ul = new UserLibrary();
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                if(isset($_GET['pass'])){
                    $url = "index.php?pass&";
                    $cart->setCart_status(true);
                }else{
            ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addCart">
                    <i class=\"bi bi-cart-plus\"></i> Thêm mới</button>
            <?php
                    $url = "index.php?";
                    $cart->setCart_status(false);
                    $cl->viewAddCart($cart);
                }
                $items = $cm->getCarts($cart, $page ,5);
                $total = $cm->getTotalCart($cart);
                $cl->viewCarts($items);
                echo $ul->getPagination($url,$total,$page,5);
                //echo $ul->creatChart($items);
            ?>

            </div><!-- card -->
            </div><!-- card-body -->
            </div> <!-- col-lg-12 -->
            </div><!-- row -->
        </section>
    </main><!-- End #main -->
<?php
        require_once("../../ads/main/Footer.php");
?>
