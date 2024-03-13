<?php 

    use HashMap\HashMap;
    class UserModel2{ 
        //Phương thức kiểm tra xem người dùng đã có chưa
        public function isExistingUser($item){
            $flag = false;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "SELECT user_id  FROM tbluser WHERE user_name = '".$item->getUser_name()."'";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                if($row = mysqli_fetch_array($result)){
                    $flag = true;
                }               
            }
            return $flag;
        }
        //Phương thức thêm mới
        public function addUser($user){
            if($this->isExistingUser($user)){
                return false;
            }
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql  = " INSERT INTO tbluser (user_name, user_pass, ";
                $sql .= "user_fullname, ";
                $sql .= "user_permission, user_notes, user_created_date, ";
                $sql .= "user_last_modified, user_phone ) ";
                $sql .= "VALUES ('".$user->getUser_name()."','".$user->getUser_pass()."', ";
                $sql .= "'".$user->getUser_fullname()."', ";
                $sql .= $user->getUser_permission().",'".$user->getUser_notes()."','".$user->getUser_created_date()."',";
                $sql .= "'".$user->getUser_last_modified()."','".$user->getUser_phone()."' )";
                //echo $sql;
                $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }
        //Phương thức cập nhật người dùng
        public function editUser($user, $type){

            $sql  = "UPDATE tbluser SET ";
            switch ($type){
                case "GENERAL"://user_name = '".$user->getUser_name()."',
                    $sql .= " user_fullname = '".$user->getUser_fullname()."', user_birthday = '".$user->getUser_birthday()."',";
                    $sql .= "user_email = '".$user->getUser_email()."', user_address = '".$user->getUser_address()."',";
                    $sql .= "user_job = '".$user->getUser_job()."', user_applyyear = '".$user->getUser_applyyear()."',";
                    $sql .= "user_notes = '".$user->getUser_notes()."', user_phone  = '".$user->getUser_phone()."', ";                   
                    $sql .= "user_permission = '".$user->getUser_permission()."', ";  
                    break;
                case "PASS":
                    $sql .= "user_pass = '".$user->getUser_pass()."', ";                 
                    break;    
                case "TRASH":
                    $sql .= "user_deleted = 1, ";                 
                    break;
                case "RESTORE":
                    $sql .= "user_deleted = 0, ";                 
                    break;  
            }
            $sql .= "user_last_modified = '".$user->getUser_last_modified()."' ";
            $sql .= "WHERE user_id = ".$user->getUser_id();
            echo $sql;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }
        //Lấy theo ID      
        public function getUser($id){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tbluser WHERE user_id = ".$id;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $item = null;
                if($row = mysqli_fetch_array($result)){
                    $item = new UserObject();
                    $item->setUser_id($row['user_id']);
                    $item->setUser_name($row['user_name']);
                    $item->setUser_pass($row['user_pass']);
                    $item->setUser_fullname($row['user_fullname']);
                    $item->setUser_birthday($row['user_birthday']);
                    $item->setUser_phone($row['user_phone']);
                    $item->setUser_email($row['user_email']);
                    $item->setUser_notes($row['user_notes']);
                    $item->setUser_address($row['user_address']);
                    $item->setUser_deleted($row['user_deleted']);
                    $item->setUser_permission($row['user_permission']);
                    $item->setUser_logined($row['user_logined']);
                    $item->setUser_last_modified($row['user_last_modified']);
                }
                return $item;
            }
        }
        //Phương thức đăng nhập
        public function getUserLogin($name, $pass){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tbluser WHERE user_name = '".$name."' AND (user_pass = md5('".$pass."') OR user_pass = '".$pass."') AND (user_deleted=0); ";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);

                $item = null;
                if($row = mysqli_fetch_array($result)){
                    $item = new UserObject();
                    $item->setUser_id($row['user_id']);
                    $item->setUser_name($row['user_name']);
                    $item->setUser_pass($row['user_pass']);
                    $item->setUser_fullname($row['user_fullname']);
                    $item->setUser_phone($row['user_phone']);
                    $item->setUser_email($row['user_email']);
                    $item->setUser_notes($row['user_notes']);
                    $item->setUser_last_modified($row['user_last_modified']);
                    $item->setUser_permission($row['user_permission']);
                    $item->getUser_logined();
                    $update = "UPDATE tbluser SET user_logined = (user_logined+1) WHERE user_id=".$item->getUser_id();
                    $result = $conns->query($update);
                   // echo $sql."----------".$update;
                }
                return $item;
            }

        }

    }
?>