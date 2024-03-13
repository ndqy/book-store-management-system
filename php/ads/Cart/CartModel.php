<?php 
   
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/CartObject.php');
    require_once("../../../lib/HashMap.php");
    use HashMap\HashMap;
    class CartModel{ 
        
        public function addCart($item){
           
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "INSERT INTO tblcart (cart_user_name, cart_adderss, 
                cart_book_name, cart_book_price, cart_book_total, cart_creat_date, 
                cart_last_modifle, cart_user_phone,  cart_note)
                VALUES ('".$item->getCart_user_name()."','"
                .$item->getCart_adderss()."','"
                .$item->getCart_book_name()."',"
                .$item->getCart_book_price().","
                .$item->getCart_book_total().",'"
                .$item->getCart_creat_date()."','"
                .$item->getCart_last_modifle()."','"
                .$item->getCart_user_phone()."','"
                .$item->getCart_note()."'); ";
                // $result = mysqli_query($conn,$sql);
                //cho $sql;
                $result = $conns->query($sql);
                return $result;                 
            }
            return false;
            
        }
        
        public function editCart(CartObject $item, $TYPE){

            $sql  = "UPDATE tblcart SET ";
            switch ($TYPE){
                case "GENERAL":
                    $sql .= "cart_user_name = '".$item->getCart_user_name()."',";
                    $sql .= "cart_adderss =  '".$item->getCart_adderss()."',";
                    $sql .= "cart_book_name =  '".$item->getCart_book_name()."',";
                    $sql .= "cart_book_price =  ".$item->getCart_book_price().",";
                    $sql .= "cart_book_total =  ".$item->getCart_book_total().",";
                    $sql .= "cart_status =  ".$item->getCart_status().",";
                    $sql .= "cart_note =  '".$item->getCart_note()."',";
                    $sql .= "cart_user_phone =  '".$item->getCart_user_phone()."',";
                    break;
                case "STATUS":
                    $sql .= "cart_status =  1,";
                    break;
            }
            
            $sql .= "cart_last_modifle =  '".$item->getCart_last_modifle()."'";
            $sql .= "WHERE  cart_id  = ".$item->getCart_id()."";
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }

        public function delCart($item){
            $sql  = "DELETE FROM tblcart ";
            $sql .= "WHERE cart_id = ".$item->getCart_id();
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
               $result = $conns->query($sql);
                return $result;     
            }
            return false;
        }
        //Lấy theo ID      
        public function getCart($id){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblcart WHERE cart_id = ".$id;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $item = null;
                if($row = mysqli_fetch_array($result)){
                    $item = new CartObject();
                    $item->setCart_id($row['cart_id']);
                    $item->setCart_user_name($row['cart_user_name']);
                    $item->setCart_adderss($row['cart_adderss']);
                    $item->setCart_book_name($row['cart_book_name']);
                    $item->setCart_book_price($row['cart_book_price']);
                    $item->setCart_book_total($row['cart_book_total']);
                    $item->setCart_creat_date($row['cart_creat_date']);
                    $item->setCart_last_modifle($row['cart_last_modifle']);
                    $item->setCart_status($row['cart_status']);
                    $item->setCart_user_phone($row['cart_user_phone']);
                    $item->setCart_note($row['cart_note']);
                }
                return $item;
            }
        }
        //Lấy danh sách    
        public function getCarts($similar, $page, $totalperpage){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $at = ($page-1)*$totalperpage;
                $sql="SELECT * FROM tblcart "; 
                if($similar->getCart_status()){
                    $sql .= " WHERE cart_status = 1 "; //Da hoan thanh
                }else{
                    $sql .= " WHERE cart_status = 0 "; // Chua hoan thanh
                }              
                $sql .= "ORDER BY cart_id DESC ";
                $sql .= "LIMIT ".$at." , ".$totalperpage."; ";
                //echo $sql;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new CartObject();
                    $item->setCart_id($row['cart_id']);
                    $item->setCart_user_name($row['cart_user_name']);
                    $item->setCart_adderss($row['cart_adderss']);
                    $item->setCart_book_name($row['cart_book_name']);
                    $item->setCart_book_price($row['cart_book_price']);
                    $item->setCart_book_total($row['cart_book_total']);
                    $item->setCart_creat_date($row['cart_creat_date']);
                    $item->setCart_last_modifle($row['cart_last_modifle']);
                    $item->setCart_status($row['cart_status']);
                    $item->setCart_user_phone($row['cart_user_phone']);
                    $item->setCart_note($row['cart_note']);
                    $items[] = $item;
                }
                return $items;
            }
        }
        public function getTotalCart(CartObject $similar){
            $sql="SELECT COUNT(cart_id) AS total FROM tblcart ";
            if($similar->getCart_status()){
                $sql .= "WHERE cart_status = 1 "; //Da hoan thanh
            }else{
                $sql .= "WHERE cart_status = 0 "; // Chua hoan thanh
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
        /*public function getCategoryBook(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql="SELECT * FROM tblcategory";
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
                $sql="SELECT * FROM tblcategory";
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
        }*/
    }


?>     
