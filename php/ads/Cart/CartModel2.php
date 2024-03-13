<?php 

    use HashMap\HashMap;
    class CartModel2{ 
        
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
        
    }


?>     
