<?php 
   
    //require_once("../../../php/ads/Connection.php");

    class BookModel2{ 
        
        //Lấy theo ID      
        public function getBook2($id){
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
                }
                return $item;
            }
        }
        //Lấy tất cả sách
        public function getBooks2($similar,$page, $totalperpage){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $at = ($page-1)*$totalperpage;
                $sql="SELECT * FROM tblbook ";
                $sql .= "WHERE book_deleted = 0 "; // Ko bị xóa
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


        //Lấy 15 cuốn sách mới nhất
        public function getNewBook(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $sql="SELECT * FROM tblbook ";
                $sql .= "WHERE book_deleted = 0 "; // Ko bị xóa
                $sql .= "ORDER BY book_created_date DESC ";
                $sql .= "LIMIT 0, 15; ";
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

        
        //Lấy Sách theo danh mục
       public function getBooksCate($similar, $page, $totalperpage){
        $dbConnection = new DBConnection();
        $conns = $dbConnection->getConnection();
        if($conns != null){ 
            $at = ($page-1)*$totalperpage;
            $sql="SELECT * FROM tblbook ";
            $sql .= "WHERE book_deleted = 0 AND book_category_id =".$similar; // Ko bị xóa
           
            $sql .= " ORDER BY book_id DESC ";
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


         //Lấy danh sách    
         public function getCategories(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $sql="SELECT * FROM tblcategory ";
                $sql .= "WHERE category_delete = 0 "; // Ko bị xóa
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
        //đểm tổng số sách
        public function getTotalBook($id){
            $sql="SELECT COUNT(book_id) AS total FROM tblbook ";
            $sql .= "WHERE book_deleted = 0 "; // Ko bị xóa
            if($id!=0){
                $sql .= "AND book_category_id = $id "; // Ko bị xóa
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
