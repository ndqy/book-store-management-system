<?php
    session_start();
    require_once("../../../php/ads/Connection.php"); 
    require_once( "../../../php/ads/Log/LogModel.php");
    include("BookLibrary.php");
    //header('Location: BookList.php');
    
    //Xóa tạm thời
    if(isset($_GET['iddel'])){
        $iddel = $_GET['iddel'];
        $name = $_GET['name'];
        if($iddel>0){
            //$currentDateTime = date('Y-m-d H:i:s');
            $currentDateTime = date('Y-m-d');
            $item = new BookObject();
            $um = new BookModel();
            $item->setBook_id($iddel);
            $item->setBook_modified_date($currentDateTime);
            $item->setBook_name($name);
            $bool = $um->editBook($item, "TRASH");
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getBook_name());
                $lo->setLog_user_name($_SESSION['name']);
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(3);
                $lo->setLog_position(3);
                $test = $lm->addLog($lo);
                if($test){
                header('Location: BookList.php');
                }else{
                    header('Location: BookList.php?err=AddLog');
                }
            }else{
                header('Location: BookList.php?err=TRASH');
            }
        }
    }
    //Khôi phục
    if(isset($_GET['idr'])){
        $idres = $_GET['idr'];    
        $name = $_GET['name'];
        if($idres>0){
            $currentDateTime = date('Y-m-d');
            $item = new BookObject();
            $um = new BookModel();
            $item->setBook_id($idres);
            $item->setBook_modified_date($currentDateTime);
            $item->setBook_name($name);
            $bool = $um->editBook($item, "RESTORE");
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getBook_name());
                $lo->setLog_user_name($_SESSION['name']);
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(5);
                $lo->setLog_position(3);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: BookList.php?trash');
                }else{
                    header('Location: BookList.php?err=AddLog');
                }
                   
            }else{
                header('Location: BookList.php?err=RES');
            }
        }
    }
    //Xóa vĩnh viễn
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $_GET['name'];
        if($id>0){      
            $item = new BookObject();
            $um = new BookModel();
            $item->setBook_id($id);
            $item->setBook_name($name);
            $bool = $um->delBook($item);
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getBook_name());
                $lo->setLog_user_name($_SESSION['name']);
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(4);
                $lo->setLog_position(3);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: BookList.php?trash');
                }else{
                    header('Location: BookList.php?err=AddLog');
                }

            }else{
                header('Location: BookList.php?err=DEL');
            }
        }
    }

?>