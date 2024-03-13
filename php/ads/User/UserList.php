<?php
    //session_start();
    
    

        require_once("../../../php/ads/Connection.php");    
        require_once("../../ads/main/Header.php");
        require_once("../../ads/main/Sidebar.php");
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
                $ul->viewUsers($items, $total, $user,1,5);
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

<?php
    //Thêm mới
    if(isset($_POST['addUser'])){
        $name = $_POST['txtUserName1'];
        $fullname = $_POST['txtFullName1'];
        $pass1 = $_POST['txtPassword1'];
        $pass2 = $_POST['txtConfirmPassword1'];
        $email = $_POST['txtEmailAddress1'];
        $phone = $_POST['txtPhoneNumber1'];
        $permis = $_POST['slcPermis1'];
        if( !empty($name) &&
            !empty($fullname) && 
            !empty($pass1) &&
            !empty($pass2) &&
            !empty($email) &&
            !empty($phone) &&
            !empty($permis) &&
            strcmp($pass1, $pass2) == 0
            ){
                $user = new UserObject();
                $user->setUser_name($name);
                $user->setUser_fullname($fullname);
                $user->setUser_pass($pass1);
                $user->setUser_email($email);
                $user->setUser_phone($phone);
                $user->setUser_permission($permis);
                $user->setUser_parent_id(2);
                $date = date('Y-m-d');
                $user->setUser_created_date($date);
                $user->setUser_last_modified($date);
                //echo $name.$fullname.$pass1.$email.$permis;
                $um = new UserModel();
                $bool = $um->addUser($user);
                if($bool){
                    //echo "<meta http-equiv='refresh' content='0'>";
                    //header("Location: UserList.php");
                    echo "<meta http-equiv='refresh' content='0'>";
                }else{
                    header("Location: ".$_SERVER['PHP_SELF']."?err=AddUser");
                    exit();
                }
        }else{
            //header("Location: UserList.php?err=AddUser");
            header("Location: ".$_SERVER['PHP_SELF']."?err=NULL");
            exit();
        }

    }
    //Chỉnh sửa thông tin người dùng
    if(isset($_POST['editUser'])){
        $act = $_POST['act'];
        $id = $_POST['idForPost'];
        if($id>0 &&  $act == 'edit'){           
            $fullname = $_POST['txtFullName2'];
            //$pass1 = $_POST['txtPassword'];
            //$pass2 = $_POST['txtConfirmPassword'];
            $email = $_POST['txtEmailAddress2'];
            $phone = $_POST['txtPhoneNumber2'];
            $permis = $_POST['slcPermis2'];
            $address = $_POST['txtAddress2'];
            if( !empty($fullname) && 
                !empty($email) &&
                !empty($phone) &&
                !empty($permis) &&
                !empty($address)
                ){
                    $currentDateTime = date('Y-m-d H:i:s');
                    $user = new UserObject();
                    $user->setUser_fullname($fullname);
                    $user->setUser_id($id);
                    $user->setUser_email($email);
                    $user->setUser_phone($phone);
                    $user->setUser_address($address);
                    $user->setUser_permission($permis);
                    $user->setUser_parent_id(2);
                    $user->setUser_last_modified($currentDateTime);
                    $um = new UserModel();
                    $bool = $um->editUser($user,"GENERAL");
                    if($bool){                   
                        echo "<meta http-equiv='refresh' content='0'>";
                    }else{
                        header("Location: ".$_SERVER['PHP_SELF']."?err=editUser");
                        exit();
                    }
            }else{
                //header("Location: UserList.php?err=AddUser");
                header("Location: ".$_SERVER['PHP_SELF']."?err=NULL");
                exit();
            }
        }    
    }
    

?>