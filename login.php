<?php 
    session_start();
    require_once("php/ads/Connection.php");
    require_once('php/objects/UserObjects.php');
    require_once("php/ads/User/UserModel2.php");
     
        if(isset($_POST['login'])){
            $name = $_POST['username'];
            $pass = $_POST['password'];
            $um = new UserModel2();
            //$user = new UserObject();
            $user = $um->getUserLogin($name,$pass);
            //echo $user->getUser_id();
            if($user!=null){
                $_SESSION['name'] = $user->getUser_name();
                $_SESSION['id'] = $user->getUser_id();
                $_SESSION['permis'] = $user->getUser_permission();
               
                header('Location: index.php');
            }else{
                header('Location: index.php?err=not');
            }
        }


    //Thêm mới
    if(isset($_POST['dangky'])){
        $name = $_POST['txtUserName'];
        $fullname = $_POST['txtName'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
        $phone = $_POST['txtPhone'];
        echo $name." - ".$fullname." - ".$pass1." - ".$pass2." - ".$phone." - ";
        if( !empty($name) &&
            !empty($fullname) && 
            !empty($pass1) &&
            !empty($pass2) &&
            !empty($phone) &&
            strcmp($pass1, $pass2) == 0
            ){
                $user = new UserObject();
                $user->setUser_name($name);
                $user->setUser_fullname($fullname);
                $user->setUser_pass($pass1);
                $user->setUser_phone($phone);
                $user->setUser_permission(1);
               // echo $name.$fullname.$pass1.$email.$permis;
                $um = new UserModel2();
                $bool = $um->addUser($user);
                if($bool){
                    // $lm = new LogModel();
                    // $lo = new LogObject();
                    // $lo->setLog_name($fullname);
                    // $lo->setLog_user_name($_SESSION['name']);               
                    // $lo->setLog_date(date('Y-m-d H:i:s'));
                    // $lo->setLog_user_permission($_SESSION['permis']);
                    // $lo->setLog_action(1);
                    // $lo->setLog_position(1);
                    // $test = $lm->addLog($lo);
                    // if($test){
                       // header('Location: index.php');
                    //}else{
                    //     header('Location: UserList.php?err=AddLog');
                    // }
                }else{
                    header('Location: index.php?err=AddUser');
                }
        }

    }
    
?>