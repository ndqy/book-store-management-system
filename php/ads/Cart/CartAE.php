
<?php
    session_start();
    require_once( "../../../php/ads/User/UserLibrary.php");
    require_once( "../../../php/ads/Log/LogModel.php");
    require_once("CartModel.php");
    //Thêm mới
    if(isset($_POST['addCart'])){
        $name = $_POST['txtCartUserName1'];
        $phone = $_POST['txtCartUserPhone1'];
        $bookname = $_POST['txtCartBookName1'];
        $price = $_POST['txtCartBookPrice1'];
        $total = $_POST['txtCartBookTotal1'];
        $address = $_POST['txtCartUserAddress1'];
        $note = $_POST['txtCartNote1'];
        if( !empty($name) &&
            !empty($phone) &&
            !empty($bookname) &&
            !empty($price) &&
            !empty($total) &&
            !empty($address)
            ){
            $cart = new CartObject();
            $cart->setCart_user_name($name);
            $cart->setCart_user_phone($phone);
            $cart->setCart_book_name($bookname);
            $cart->setCart_book_price($price);
            $cart->setCart_book_total($total);
            $cart->setCart_adderss($address);
            $cart->setCart_note($note);
            //$date = date('Y-m-d H:i:s');
            $date = date('Y-m-d');
            //$cart->setCategory_created_author_id(3);
            $cart->setCart_last_modifle($date);
            $cart->setCart_creat_date($date);
            $cm = new CartModel();
            $bool = $cm->addCart($cart);
            if($bool){
                $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($name);
                    $lo->setLog_user_name($_SESSION['name']);               
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(7);
                    $lo->setLog_position(4);
                    $test = $lm->addLog($lo);
                    if($test){
                        header('Location: ../Cart/');
                    }else{
                        header('Location: ../Cart/?err=AddLog');
                    }
            }else{
                header('Location: ../Cart/?err=ADD');
            }
        }else{
            header('Location: ../Cart/?err=ADDNULL');
        }

    }
    //Chỉnh sửa thông tin danh mục
    if(isset($_POST['editCart'])){
        //$act = $_POST['act'];
        $id = $_POST['idForPost'];
        if($id>0){   
            $name = $_POST['txtCartUserName'];
            $phone = $_POST['txtCartUserPhone'];
            $bookname = $_POST['txtCartBookName'];
            $price = $_POST['txtCartBookPrice'];
            $total = $_POST['txtCartBookTotal'];
            $address = $_POST['txtCartUserAddress'];
            $note = $_POST['txtCartNote'];
            $status = $_POST['slcStatus'];
            
            if( !empty($name) &&
                !empty($phone) &&
                !empty($bookname) &&
                !empty($price) &&
                !empty($total) &&
                !empty($address)
                ){
                $cart = new CartObject();
                $cart->setCart_id($id);
                $cart->setCart_user_name($name);
                $cart->setCart_user_phone($phone);
                $cart->setCart_book_name($bookname);
                $cart->setCart_book_price($price);
                $cart->setCart_book_total($total);
                $cart->setCart_adderss($address);
                $cart->setCart_note($note);
                $cart->setCart_status($status);
                //$date = date('Y-m-d H:i:s');
                $date = date('Y-m-d');
                $cart->setCart_last_modifle($date);
                $cm = new CartModel();
                $bool = $cm->editCart($cart,"GENERAL");
                if($bool){
                    $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($name);
                    $lo->setLog_user_name($_SESSION['name']);               
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(8);
                    $lo->setLog_position(4);
                    $test = $lm->addLog($lo);
                    if($test){
                        header('Location: ../Cart/');
                    }else{
                        header('Location: ../Cart/?err=AddLog');
                    }
                }else{
                    header('Location: ../Cart/?err=EDIT');
                }
            }else{
                header('Location: ../Cart/?err=EDITNULL');
            }
        }else{
            header('Location: ../Cart/?err=NOTOK');
        }    
    }
    

?>