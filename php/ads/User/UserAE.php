
<?php
    session_start();
    require_once("../../../php/ads/Connection.php");   
    require_once( "../../../php/ads/Log/LogModel.php");
    include("UserLibrary.php");
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
                $user->setUser_parent_id($_SESSION['id']);
               // echo $name.$fullname.$pass1.$email.$permis;
                $um = new UserModel();
                $bool = $um->addUser($user);
                if($bool){
                    $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($fullname);
                    $lo->setLog_user_name($_SESSION['name']);               
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(1);
                    $lo->setLog_position(1);
                    $test = $lm->addLog($lo);
                    if($test){
                        header('Location: UserList.php');
                    }else{
                        header('Location: UserList.php?err=AddLog');
                    }
                }else{
                    header('Location: UserList.php?err=AddUser');
                }
        }else{
            header("Location: UserList.php?err=NULL");
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
                    $user->setUser_parent_id($_SESSION['id']);
                    $user->setUser_last_modified($currentDateTime);
                    $um = new UserModel();
                    $bool = $um->editUser($user,"GENERAL");
                    if($bool){     
                        $lm = new LogModel();
                        $lo = new LogObject();
                        $lo->setLog_name($fullname);
                        $lo->setLog_user_name($_SESSION['name']);               
                        $lo->setLog_date(date('Y-m-d H:i:s'));
                        $lo->setLog_user_permission($_SESSION['permis']);
                        $lo->setLog_action(2);
                        $lo->setLog_position(1);
                        $test = $lm->addLog($lo);
                        if($test){
                            header('Location: UserList.php');
                        }else{
                            header('Location: UserList.php?err=AddLog');
                        }
                    }else{
                        header('Location: UserList.php?err=editUser');
                    }
            }else{
                header('Location: UserList.php?err=NULL');
            }
        }    
    }
    

?>