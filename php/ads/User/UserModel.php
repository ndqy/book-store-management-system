<?php 
    //require_once '/php/ads/Connection.php';

    
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/UserObjects.php');
    require_once("../../../lib/HashMap.php");
    use HashMap\HashMap;
    class UserModel{ 
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
                $sql  = "INSERT INTO tbluser (user_name, user_pass, ";
                $sql .= "user_fullname, user_birthday, user_email, ";
                $sql .= "user_address, user_job, user_applyyear," ;
                $sql .= "user_permission, user_notes, user_created_date, ";
                $sql .= "user_last_modified, user_parent_id, user_phone ) ";
                $sql .= "VALUES ('".$user->getUser_name()."','".$user->getUser_pass()."', ";
                $sql .= "'".$user->getUser_fullname()."','".$user->getUser_birthday()."','".$user->getUser_email()."',";
                $sql .= "'".$user->getUser_address()."','".$user->getUser_job()."','".$user->getUser_applyyear()."',";
                $sql .= $user->getUser_permission().",'".$user->getUser_notes()."','".$user->getUser_created_date()."',";
                $sql .= "'".$user->getUser_last_modified()."',".$user->getUser_parent_id().",'".$user->getUser_phone()."' )";
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
        //Phương thức xóa người dùng
        public function delUser($user){
            $sql  = "DELETE FROM tbluser ";
            $sql .= "WHERE user_id = ".$user->getUser_id();
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
        //Lấy ra danh sách người dùng
        public function getUsers($similar, $page, $totalperpage){
            $at = ($page-1)*$totalperpage;
            $sql="SELECT * FROM tbluser ";
            if($similar->getUser_deleted()){
                $sql .= "WHERE user_deleted = 1 "; //Bị đánh dấu xóa - Trong thùng rác
            }else{
                $sql .= "WHERE user_deleted = 0 "; // Ko bị xóa
            }
            $sql .= " AND user_permission < ".$similar->getUser_permission()." ";
            $sql .= "ORDER BY user_id DESC ";
            $sql .= "LIMIT ".$at." , ".$totalperpage."; ";
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);

                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
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
                    $items[] = $item;
                }
                return $items;
            }

        }
        //Lấy ra danh sách người dùng
        public function getManagers(){
            $sql="SELECT * FROM tbluser ";
            $sql .= "WHERE user_deleted = 0 ";
            $sql .= "AND user_permission =2;";
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $temp = new HashMap("String","String");
                
                while($row = mysqli_fetch_array($result)){
                    /*
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
                    */
                    $temp->put($row['user_id'],$row['user_fullname']." - ".$row['user_name']);
                }
                return $temp;
            }

        }
        //
        public function getTotalUsers(UserObject $similar){
            $sql="SELECT COUNT(user_id) AS total FROM tbluser ";
            if($similar->getUser_deleted()){
                $sql .= "WHERE user_deleted = 1 "; //Bị đánh dấu xóa - Trong thùng rác
            }else{
                $sql .= "WHERE user_deleted = 0 "; // Ko bị xóa
            }
            $sql .= " AND user_permission < ".$similar->getUser_permission()." ";
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);

                if($row = mysqli_fetch_assoc($result)){
                    $total = $row['total'];
                }
                return $total;
            }

        }

    }
    
?>
    


<!--
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Tài khoản</th>
            <th scope="col">Điện thoại</th>
            </tr>
        </thead> 
        <tbody>
    <?php
        $user = new UserObject();
       //$user->setUser_deleted(false);
        $user->setUser_id(53);
        $user->setUser_name("TESt");
        $user->setUser_pass("123456");
        $user->setUser_fullname("TEStSS");
        $user->setUser_parent_id(2);
        $user->setUser_permission(2);
        $um = new UserModel();
        // if($um->getTotalUsers($user)){
        //     echo "OK";
        // }else{
        //     echo "NôtK";
        // }
        echo $um->getTotalUsers($user);
        $arr = $um->getUsers($user, 1 ,10);
        foreach($arr as $tmp){ 
    ?>
       
    <tr>
        <th scope="row"><?php echo $tmp->getUser_id() ?></th>
        <td><?php echo $tmp->getUser_fullname() ?></td>
        <td><?php echo $tmp->getUser_name() ?></td>
        <td><?php echo $tmp->getUser_pass() ?></td>
    </tr>
        
    
<?php
    }  
?>
    </tbody>
</table>-->
<!--
    require_once("../../../php/ads/cp.php");
    require_once('../../objects/UserObjects.php');
    class UserModel{      
        public function getUsers(){
           
            $severname="127.0.0.1:3366";
            $username="admin";
            $password="0000";
            $database="btl";
        
            $conn = new mysqli($severname,$username,$password,$database);
            if($conn){
                $sql="SELECT * FROM tbluser ORDER BY user_id DESC";
                // $result = mysqli_query($conn,$sql);
                $result = $conn->query($sql);

                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new User();
                    $item->setUser_id($row['user_id']);
                    $item->setUser_name($row['user_name']);
                    $item->setUser_pass($row['user_pass']);
                    $item->setUser_fullname($row['user_fullname']);
                    $item->setUser_birthday($row['user_birthday']);
                    $item->setUser_phone($row['user_phone']);
                    $item->setUser_email($row['user_email']);
                    $item->setUser_notes($row['user_notes']);
                    $items[] = $item;
                }
                
                return $items;
            }

        }

    }
?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Tài khoản</th>
            <th scope="col">Điện thoại</th>
            </tr>
        </thead> 
    <tbody>
<?php /*
    $um = new UserModel();
    $arr = $um->getUsers();
    foreach($arr as $tmp){
*/
    
?>
     /*  
    <tr>
        <th scope="row"><?php echo $tmp->getUser_id() ?></th>
        <td><?php echo $tmp->getUser_fullname() ?></td>
        <td><?php echo $tmp->getUser_name() ?></td>
        <td><?php echo $tmp->getUser_phone() ?></td>
    </tr>
        */
    
<?php
   // }  
?>
</tbody>
</table>-->