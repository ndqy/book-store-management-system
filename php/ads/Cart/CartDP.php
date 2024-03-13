<?php
    session_start();
    require_once("../../../php/ads/Connection.php"); 
    require_once( "../../../php/ads/Log/LogModel.php");
    include("CartLibrary.php");
    //header('Location: CategoryList.php');
    
    
    //Hoan thanh
    if(isset($_GET['idp'])){
        $idres = $_GET['idp'];    
        $name = $_GET['name']; 
        if($idres>0){
            $currentDateTime = date('Y-m-d');
            $item = new CartObject();
            $um = new CartModel();
            $item->setCart_id($idres);
            $item->setCart_last_modifle($currentDateTime);
            $bool = $um->editCart($item, "STATUS");
            if($bool){
                
                    $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($name);
                    $lo->setLog_user_name($_SESSION['name']);               
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(6);
                    $lo->setLog_position(4);
                    $test = $lm->addLog($lo);
                    if($test){
                        header('Location: ../Cart/?pass');
                    }else{
                        header('Location: ../Cart/?err=AddLog');
                    }
            }else{
                header('Location: ../Cart/?pass&err=PASS');
            }
        }
    }
    //Xóa vĩnh viễn
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $_GET['name']; 
        if($id>0){      
            $item = new CartObject();
            $um = new CartModel();
            $item->setCart_id($id);
            $bool = $um->delCart($item);
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($name);
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(9);
                $lo->setLog_position(4);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: ../Cart/?pass');
                }else{
                    header('Location: ../Cart/?err=AddLog');
                }
            }else{
                header('Location: ../Cart/?pass&err=DEL');
            }
        }
    }

?>