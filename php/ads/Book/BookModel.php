<?php 
   
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/BookObject.php');
    require_once("../../../lib/HashMap.php");
    class BookModel{ 
        //Phương thức kiểm tra xem người dùng đã có chưa
        public function isExistingitem(BookObject $item){
            $flag = false;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "SELECT book_id  FROM tblbook WHERE book_name = '".$item->getBook_name()."'";
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                if($row = mysqli_fetch_array($result)){
                    $flag = true;
                }               
            }
            return $flag;
        }
        public function addBook(BookObject $item){
            if($this->isExistingitem($item)){
                return false;
            }
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "INSERT INTO tblbook(book_name, book_image, book_price, 
                book_discount_price, book_total, 
                book_manager_id, book_intro, book_notes, book_created_date, 
                book_modified_date, book_category_id, book_author_name, 
                book_ps_id, book_is_detail, book_sold, book_best_seller,
                book_size, book_publisher, book_paperback, book_page, book_translator) 
                VALUES ('".$item->getBook_name()."','".$item->getBook_image()."',".$item->getBook_price().",
                '".$item->getBook_discount_price()."',".$item->getBook_total().",".$item->getBook_manager_id().",
                '".$item->getBook_intro()."','".$item->getBook_notes()."','".$item->getBook_created_date()."',
                '".$item->getBook_modified_date()."',".$item->getBook_category_id().",'".$item->getBook_author_name()."',
                '".$item->getBook_ps_id()."','".$item->getBook_is_detail()."','".$item->getBook_sold()."',
                '".$item->getBook_best_seller()."','".$item->getBook_size()."','".$item->getBook_publisher()."',
                '".$item->getBook_paperback()."','".$item->getBook_page()."','".$item->getBook_translator()."')";
                
                // $result = mysqli_query($conn,$sql);
                //echo $sql;
                $result = $conns->query($sql);
                return $result;                 
            }
            return false;
            
        }
        //Phương thức cập nhật danh mục
        public function editBook(BookObject $item, $type){

            $sql  = "UPDATE tblbook SET ";
            switch ($type){
                case "GENERAL":
                    $sql .= " book_name = '".$item->getBook_name()."', book_image = '".$item->getBook_image()."',";
                    $sql .= "book_price = '".$item->getBook_price()."', ";
                    $sql .= "book_discount_price = '".$item->getBook_discount_price()."', ";
                    $sql .= "book_total = '".$item->getBook_total()."', ";
                    $sql .= "book_manager_id  = '".$item->getBook_manager_id()."', ";
                    $sql .= "book_intro  = '".$item->getBook_intro()."', ";
                    $sql .= "book_notes  = '".$item->getBook_notes()."', ";
                    $sql .= "book_category_id  = '".$item->getBook_category_id()."', ";
                    $sql .= "book_author_name  = '".$item->getBook_author_name()."', ";
                    $sql .= "book_best_seller  = '".$item->getBook_best_seller()."', ";
                    $sql .= "book_promotion  = '".$item->getBook_promotion()."', ";
                    $sql .= "book_size  = '".$item->getBook_size()."', ";
                    $sql .= "book_publisher  = '".$item->getBook_publisher()."', ";
                    $sql .= "book_paperback  = '".$item->getBook_paperback()."', ";
                    $sql .= "book_translator  = '".$item->getBook_translator()."', ";
                    break;    
                case "TRASH":
                    $sql .= "book_deleted = 1, ";                 
                    break;
                case "RESTORE":
                    $sql .= "book_deleted = 0, ";                 
                    break;  
            }
            
            $sql .= "book_modified_date  = '".$item->getBook_modified_date()."' ";
            $sql .= "WHERE book_id = ".$item->getBook_id();
           // echo $sql;
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }

        //Phương thức xóa danh mục
        public function delBook($item){
            $sql  = "DELETE FROM tblbook ";
            $sql .= "WHERE book_id = ".$item->getBook_id();
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }
        //Lấy theo ID      
        public function getBook($id){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblbook WHERE book_id = ".$id;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $item = null;
                if($row = mysqli_fetch_array($result)){
                    $item = new BookObject();
                    $item->setBook_id($row['book_id']);
                    $item->setBook_name($row['book_name']);
                    $item->setBook_image($row['book_image']);
                    $item->setBook_price($row['book_price']);
                    $item->setBook_discount_price($row['book_discount_price']);
                    $item->setBook_deleted($row['book_deleted']);
                    $item->setBook_visited($row['book_visited']);
                    $item->setBook_total($row['book_total']);
                    $item->setBook_manager_id($row['book_manager_id']);
                    $item->setBook_intro($row['book_intro']);
                    $item->setBook_image($row['book_notes']);
                    $item->setBook_created_date($row['book_created_date']);
                    $item->setBook_modified_date($row['book_modified_date']);
                    $item->setBook_category_id($row['book_category_id']);
                    $item->setBook_author_name($row['book_author_name']);
                    $item->setBook_is_detail($row['book_is_detail']);
                    $item->setBook_sold($row['book_sold']);
                    $item->setBook_best_seller($row['book_best_seller']);
                    $item->setBook_promotion($row['book_promotion']);
                    $item->setBook_size($row['book_size']);
                    $item->setBook_publisher($row['book_publisher']);
                    $item->setBook_paperback($row['book_paperback']);
                    $item->setBook_page($row['book_page']);
                    $item->setBook_translator($row['book_translator']);
                }
                return $item;
            }
        }
        //Lấy danh sách    
        public function getBooks($similar, $page, $totalperpage){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $at = ($page-1)*$totalperpage;
                $sql="SELECT * FROM tblbook ";
                if($similar->getBook_deleted()){
                    $sql .= "WHERE book_deleted= 1 "; //Bị đánh dấu xóa - Trong thùng rác
                }else{
                    $sql .= "WHERE book_deleted = 0 "; // Ko bị xóa
                }
                $key = $similar->getBook_name() ;
                if(!empty($key)){
                    $sql .= "AND ( "; 
                    $sql .= "(book_name LIKE '%".$key."%'  ) OR"; 
                    $sql .= "(book_translator LIKE '%".$key."%'  ) OR"; 
                    $sql .= "(book_author_name LIKE '%".$key."%'  )"; 
                    $sql .= ") "; 
                }
                $sql .= "ORDER BY book_id DESC ";
                $sql .= "LIMIT ".$at." , ".$totalperpage."; ";
                //echo $sql;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new BookObject();
                    $item->setBook_id($row['book_id']);
                    $item->setBook_name($row['book_name']);
                    $item->setBook_image($row['book_image']);
                    $item->setBook_price($row['book_price']);
                    $item->setBook_discount_price($row['book_discount_price']);
                    $item->setBook_deleted($row['book_deleted']);
                    $item->setBook_visited($row['book_visited']);
                    $item->setBook_total($row['book_total']);
                    $item->setBook_manager_id($row['book_manager_id']);
                    $item->setBook_intro($row['book_intro']);
                    $item->setBook_notes($row['book_notes']);
                    $item->setBook_created_date($row['book_created_date']);
                    $item->setBook_modified_date($row['book_modified_date']);
                    $item->setBook_category_id($row['book_category_id']);
                    $item->setBook_author_name($row['book_author_name']);
                    $item->setBook_is_detail($row['book_is_detail']);
                    $item->setBook_sold($row['book_sold']);
                    $item->setBook_best_seller($row['book_best_seller']);
                    $item->setBook_promotion($row['book_promotion']);
                    $item->setBook_size($row['book_size']);
                    $item->setBook_publisher($row['book_publisher']);
                    $item->setBook_paperback($row['book_paperback']);
                    $item->setBook_page($row['book_page']);
                    $item->setBook_translator($row['book_translator']);
                    $items[] = $item;
                }
                return $items;
            }
        }
        //Lấy danh sách danh mục sách   
        public function getBookCategory(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $sql  ="SELECT * FROM tblbook WHERE ";
                $sql .= " book_deleted = 0 ; ";
                //echo $sql;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new BookObject();
                    $item->setBook_id($row['book_id']);
                    // $item->setBook_name($row['book_name']);
                    // $item->setBook_image($row['book_image']);
                    // $item->setBook_price($row['book_price']);
                    // $item->setBook_discount_price($row['book_discount_price']);
                    // $item->setBook_deleted($row['book_deleted']);
                    // $item->setBook_visited($row['book_visited']);
                    //$item->setBook_total($row['book_total']);
                    // $item->setBook_manager_id($row['book_manager_id']);
                    // $item->setBook_intro($row['book_intro']);
                    // $item->setBook_notes($row['book_notes']);
                    // $item->setBook_created_date($row['book_created_date']);
                    // $item->setBook_modified_date($row['book_modified_date']);
                    $item->setBook_category_id($row['book_category_id']);
                    // $item->setBook_author_name($row['book_author_name']);
                    // $item->setBook_is_detail($row['book_is_detail']);
                    // $item->setBook_sold($row['book_sold']);
                    // $item->setBook_best_seller($row['book_best_seller']);
                    // $item->setBook_promotion($row['book_promotion']);
                    // $item->setBook_size($row['book_size']);
                    // $item->setBook_publisher($row['book_publisher']);
                    // $item->setBook_paperback($row['book_paperback']);
                    // $item->setBook_page($row['book_page']);
                    // $item->setBook_translator($row['book_translator']);
                    $items[] = $item;
                }
                return $items;
            }
        }
        public function getTotalBook(BookObject $similar){
            $sql="SELECT COUNT(book_id) AS total FROM tblbook ";
            if($similar->getBook_deleted()){
                $sql .= "WHERE book_deleted = 1 "; //Bị đánh dấu xóa - Trong thùng rác
            }else{
                $sql .= "WHERE book_deleted = 0 "; // Ko bị xóa
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
    }


?>     
