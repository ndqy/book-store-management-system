<?php

    session_start();
    require_once("../../../php/ads/Connection.php"); 
    require_once( "../../../php/ads/Log/LogModel.php");
    include("CategoryLibrary.php");
    //header('Location: CategoryList.php');
    
    //Xóa tạm thời
    if(isset($_GET['iddel'])){
        $iddel = $_GET['iddel'];
        $name = $_GET['name'];
        if($iddel>0){
            //$currentDateTime = date('Y-m-d H:i:s');
            $currentDateTime = date('Y-m-d');
            $item = new CategoryObject();
            $um = new CategoryModel();
            $item->setCategory_id($iddel);
            $item->setCategory_last_modified($currentDateTime);
            $item->setCategory_name($name);
            $bool = $um->editCategory($item, "TRASH");
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getCategory_name());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(3);
                $lo->setLog_position(2);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: CategoryList.php');
                }else{
                    header('Location: CategoryList.php?err=AddLog');
                }
            }else{
                header('Location: CategoryList.php?err=TRASH');
            }
        }
    }
    //Khôi phục
    if(isset($_GET['idr'])){
        $idres = $_GET['idr'];    
        $name = $_GET['name'];
        if($idres>0){
            $currentDateTime = date('Y-m-d');
            $item = new CategoryObject();
            $um = new CategoryModel();
            $item->setCategory_id($idres);
            $item->setCategory_last_modified($currentDateTime);
            $item->setCategory_name($name);
            $bool = $um->editCategory($item, "RESTORE");
            if($bool){
                
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getCategory_name());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(5);
                $lo->setLog_position(2);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: CategoryList.php');
                }else{
                    header('Location: CategoryList.php?err=AddLog');
                }

            }else{
                header('Location: CategoryList.php?err=RES');
            }
        }
    }
    //Xóa vĩnh viễn
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $_GET['name'];
        if($id>0){      
            $item = new CategoryObject();
            $um = new CategoryModel();
            $item->setCategory_id($id);
            $item->setCategory_name($name);
            $bool = $um->delCategory($item);
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($item->getCategory_name());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(4);
                $lo->setLog_position(2);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: CategoryList.php?trash');
                }else{
                    header('Location: CategoryList.php?err=AddLog');
                }

            }else{
                header('Location: CategoryList.php?err=DEL');
            }
        }
    }

?>