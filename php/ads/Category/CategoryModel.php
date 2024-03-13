<?php 
   
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/CategoryObject.php');
    require_once("../../../lib/HashMap.php");
    use HashMap\HashMap;
    class CategoryModel{ 
        //Phương thức kiểm tra xem người dùng đã có chưa
        public function isExistingitem($item){
            $flag = false;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "SELECT category_id  FROM tblcategory WHERE category_name = '".$item->getCategory_name()."'";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                if($row = mysqli_fetch_array($result)){
                    $flag = true;
                }               
            }
            return $flag;
        }
        public function addCategory($item){
            if($this->isExistingitem($item)){
                return false;
            }
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "INSERT INTO tblcategory (category_name, category_notes, 
                category_created_date, category_created_author_id, category_last_modified, 
                category_manager_id, category_image)
                VALUES ('".$item->getCategory_name()."','"
                .$item->getCategory_notes()."','"
                .$item->getCategory_created_date()."',"
                .$item->getCategory_created_author_id().",'"
                .$item->getCategory_last_modified()."',"
                .$item->getCategory_manager_id().",'"
                .$item->getCategory_image()."'); ";
                // $result = mysqli_query($conn,$sql);
                echo $sql;
                $result = $conns->query($sql);
                return $result;                 
            }
            return false;
            
        }
        //Phương thức cập nhật danh mục
        public function editCategory($item, $type){

            $sql  = "UPDATE tblcategory SET ";
            switch ($type){
                case "GENERAL":
                    $sql .= " category_name = '".$item->getCategory_name()."', category_notes = '".$item->getCategory_notes()."',";
                    $sql .= "category_created_date = '".$item->getCategory_created_date()."', category_created_author_id = '".$item->getCategory_created_author_id()."',";
                    $sql .= "category_manager_id = '".$item->getCategory_manager_id()."', ";
                    $sql .= "category_image  = '".$item->getCategory_image()."', ";
                    break;    
                case "TRASH":
                    $sql .= "category_delete = 1, ";                 
                    break;
                case "RESTORE":
                    $sql .= "category_delete = 0, ";                 
                    break;  
            }
            $sql .= "category_last_modified = '".$item->getCategory_last_modified()."' ";
            $sql .= "WHERE category_id = ".$item->getCategory_id();
            echo $sql;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }

        //Phương thức xóa danh mục
        public function delCategory($item){
            $sql  = "DELETE FROM tblcategory ";
            $sql .= "WHERE category_id = ".$item->getCategory_id();
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }
        //Lấy theo ID      
        public function getCategory($id){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblcategory WHERE category_id = ".$id;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $item = null;
                if($row = mysqli_fetch_array($result)){
                    $item = new CategoryObject();
                    $item->setCategory_id($row['category_id']);
                    $item->setCategory_name($row['category_name']);
                    $item->setCategory_notes($row['category_notes']);
                    $item->setCategory_created_author_id($row['category_created_author_id']);
                    $item->setCategory_created_date($row['category_created_date']);
                    $item->setCategory_delete($row['category_delete']);
                    $item->setCategory_image($row['category_image']);
                    $item->setCategory_last_modified($row['category_last_modified']);
                    $item->setCategory_manager_id($row['category_manager_id']);
                }
                return $item;
            }
        }
        //Lấy danh sách    
        public function getCategories($similar, $page, $totalperpage){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $at = ($page-1)*$totalperpage;
                $sql="SELECT * FROM tblcategory ";
                if($similar->isCategory_delete()){
                    $sql .= "WHERE category_delete = 1 "; //Bị đánh dấu xóa - Trong thùng rác
                }else{
                    $sql .= "WHERE category_delete = 0 "; // Ko bị xóa
                }
                $sql .= "ORDER BY category_id DESC ";
                $sql .= "LIMIT ".$at." , ".$totalperpage."; ";
                //echo $sql;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new CategoryObject();
                    $item->setCategory_id($row['category_id']);
                    $item->setCategory_name($row['category_name']);
                    $item->setCategory_notes($row['category_notes']);
                    $item->setCategory_created_author_id($row['category_created_author_id']);
                    $item->setCategory_created_date($row['category_created_date']);
                    $item->setCategory_delete($row['category_delete']);
                    $item->setCategory_image($row['category_image']);
                    $item->setCategory_last_modified($row['category_last_modified']);
                    $item->setCategory_manager_id($row['category_manager_id']);
                    $items[] = $item;
                }
                return $items;
            }
        }
        public function getTotalCategory(CategoryObject $similar){
            $sql="SELECT COUNT(category_id) AS total FROM tblcategory ";
            if($similar->isCategory_delete()){
                $sql .= "WHERE category_delete = 1 "; //Bị đánh dấu xóa - Trong thùng rác
            }else{
                $sql .= "WHERE category_delete = 0 "; // Ko bị xóa
            }
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

        //Lấy theo tên danh mục      
        public function getCategoryBook(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblcategory WHERE category_delete = 0 ";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $temp = new HashMap("String","String");
                while($row = mysqli_fetch_array($result)){
                    // $item = new CategoryObject();
                    // $item->setCategory_id($row['category_id']);
                    // $item->setCategory_name($row['category_name']);
                    // $item->setCategory_notes($row['category_notes']);
                    // $item->setCategory_created_author_id($row['category_created_author_id']);
                    // $item->setCategory_created_date($row['category_created_date']);
                    // $item->setCategory_delete($row['category_delete']);
                    // $item->setCategory_image($row['category_image']);
                    // $item->setCategory_last_modified($row['category_last_modified']);
                    // $item->setCategory_manager_id($row['category_manager_id']);
                    $temp->put($row['category_id'],$row['category_name']);
                }
                return $temp;
            }
            
        }
        //Lấy theo tên danh mục      
        public function getCategoryBook2(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblcategory WHERE category_delete = 0 ";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $temp = new HashMap("String","String");
                while($row = mysqli_fetch_array($result)){
                    // $item = new CategoryObject();
                    // $item->setCategory_id($row['category_id']);
                    // $item->setCategory_name($row['category_name']);
                    // $item->setCategory_notes($row['category_notes']);
                    // $item->setCategory_created_author_id($row['category_created_author_id']);
                    // $item->setCategory_created_date($row['category_created_date']);
                    // $item->setCategory_delete($row['category_delete']);
                    // $item->setCategory_image($row['category_image']);
                    // $item->setCategory_last_modified($row['category_last_modified']);
                    // $item->setCategory_manager_id($row['category_manager_id']);
                    $temp->put($row['category_id']." ",$row['category_name']);
                }
                return $temp;
            }
        }
    }


?>     
