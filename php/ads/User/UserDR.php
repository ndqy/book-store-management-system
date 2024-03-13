<?php

    session_start();
    require_once("../../../php/ads/Connection.php"); 
    require_once( "../../../php/ads/Log/LogModel.php");
    require_once("UserLibrary.php");
    //header('Location: UserList.php');
    //Xóa tạm thời
    if(isset($_GET['iddel'])){
        $iddel = $_GET['iddel'];
        $name = $_GET['name'];
        if($iddel>0){
            $currentDateTime = date('Y-m-d H:i:s');
            $user = new UserObject();
            $um = new UserModel();
            $user->setUser_id($iddel);
            $user->setUser_last_modified($currentDateTime);
            $user->setUser_fullname($name);
            $bool = $um->editUser($user, "TRASH");
            if($bool){

                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($user->getUser_fullname());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(3);
                $lo->setLog_position(1);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: UserList.php');
                }else{
                    header('Location: UserList.php?err=AddLog');
                }

            }else{
                header('Location: UserList.php?err=TRASH');
            }
        }
    }
    //Khôi phục
    if(isset($_GET['idr'])){
        $idres = $_GET['idr'];
        $name = $_GET['name'];
        if($idres>0){
            $currentDateTime = date('Y-m-d H:i:s');
            $user = new UserObject();
            $um = new UserModel();
            $user->setUser_id($idres);
            $user->setUser_last_modified($currentDateTime);
            $user->setUser_fullname($name);
            $bool = $um->editUser($user, "RESTORE");
            if($bool){
                
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($user->getUser_fullname());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(5);
                $lo->setLog_position(1);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: UserList.php?trash');
                }else{
                    header('Location: UserList.php?trash&err=AddLog');
                }

            }else{
                header('Location: UserList.php?err=RES');
            }
        }
    }
    //Xóa vĩnh viễn
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $_GET['name'];
        if($id>0){      
            $user = new UserObject();
            $um = new UserModel();
            $user->setUser_id($id);
            $user->setUser_fullname($name);
            $bool = $um->delUser($user);
            if($bool){
                
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($user->getUser_fullname());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(4);
                $lo->setLog_position(1);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: UserList.php?trash');
                }else{
                    header('Location: UserList.php?trash&err=AddLog');
                }

            }else{
                header('Location: UserList.php?trash&err=DEL');
            }
        }
    }

?>