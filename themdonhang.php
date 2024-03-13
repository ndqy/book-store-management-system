<?php
    session_start();
    require_once("php/ads/Connection.php"); 
    require_once("lib/HashMap.php"); 
    require_once("php/ads/Cart/CartModel2.php");
    require_once('php/objects/CartObject.php'); 

    if(!isset($_SESSION['id']) || $_SESSION['id']<=0){
        header('Location: dangnhap.php');    
    }else{
        if(isset($_POST['dathang'])){
            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                for($i=0; $i< sizeof($_SESSION['giohang']); $i++){
                    $name = $_POST['txtName'];
                    $phone = $_POST['txtPhone'];
                    $bookname = $_SESSION['giohang'][$i][0];
                    $price = $_SESSION['giohang'][$i][3];
                    $total = $_POST['quantity'.$i];
                    $address = $_POST['txtAddress'];
                    $note = $_POST['txtNote'];
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
                        $cm = new CartModel2();
                        $bool = $cm->addCart($cart);
                        if($bool){
                            // $lm = new LogModel();
                            //     $lo = new LogObject();
                            //     $lo->setLog_name($name);
                            //     $lo->setLog_user_name($_SESSION['name']);               
                            //     $lo->setLog_date(date('Y-m-d H:i:s'));
                            //     $lo->setLog_user_permission($_SESSION['permis']);
                            //     $lo->setLog_action(7);
                            //     $lo->setLog_position(4);
                            //     $test = $lm->addLog($lo);
                            //     if($test){
                                    header('Location: giohang.php');
                                //}else{
                                 //   header('Location: giohang.php/?err=AddLog');
                                //}
                        }else{
                            header('Location: giohang.php/?err=ADD');
                        }
                    }else{
                        header('Location: giohang.php/?err=ADDNULL');
                    }
                }
            }
        }
    }
    
?>