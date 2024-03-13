<?php 
    session_start();
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/UserObjects.php');
    require_once('UserModel.php');
     
        if(isset($_POST['login'])){
            $name = $_POST['username'];
            $pass = $_POST['password'];
            $um = new UserModel();
            //$user = new UserObject();
            $user = $um->getUserLogin($name,$pass);
            //echo $user->getUser_id();
            if($user!=null){
                $_SESSION['name'] = $user->getUser_name();
                $_SESSION['id'] = $user->getUser_id();
                $_SESSION['permis'] = $user->getUser_permission();
               
                header('Location: UserList.php');
            }else{
                header('Location: UserLogin.php?err=not');
            }
        }else{
            header('Location: UserLogin.php?err=notok');
        }
    
?>