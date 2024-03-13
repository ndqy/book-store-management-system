<?php
   
    // if(!isset($_SESSION['id']) || $_SESSION['id']<0){
    //     header('Location: UserLogin.php');    
    // }
    // if(!isset($_SESSION['permis']) || $_SESSION['permis']<3){
    //     header('Location: UserLogin.php?err=nopermis');    
    // }

        require_once("../../../php/ads/Connection.php");    
        require_once("../../ads/main/Header.php");
        require_once("../../ads/main/Sidebar.php");
        require_once( "../../../php/ads/Log/LogModel.php");
        include("UserLibrary.php")
?>        
    <main id="main" class="main">
        <div class="pagetitle d-flex">
        <h1>Danh sách Người dùng</h1>
        <nav class="ms-auto">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/btl/view"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item">Người dùng</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addUser">
            <i class="bi bi-person-plus"></i> Thêm mới</button>
            <?php 
                $user = new UserObject();
                $user->setUser_id( $_SESSION['id']);
                $user->setUser_permission( $_SESSION['permis']);
                $ul = new UserLibrary();
                $um = new UserModel();
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                if(isset($_GET['trash'])){
                    $url = "UserList.php?trash&";
                    $user->setUser_deleted(true);
                }else{
                    $url = "UserList.php?";
                    $user->setUser_deleted(false);
                }
                $items = $um->getUsers($user, $page ,5);
                $total = $um->getTotalUsers($user);
                $ul->viewUsers($items);
                $ul->viewAddUser($user);
                echo $ul->getPagination($url,$total,$page,5 );
                
                echo $ul->creatChart($items);
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
