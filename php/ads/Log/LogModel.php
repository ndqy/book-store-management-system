<?php 
   
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/LogObject.php');
    require_once("../../../lib/HashMap.php");
    use HashMap\HashMap;
    class LogModel{ 
       
        public function addLog(LogObject $item){
           
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){
                $sql = "INSERT INTO tbllog (log_name, log_user_permission, 
                log_date, log_user_name, log_action, 
                log_position)
                VALUES ('".$item->getLog_name()."','"
                .$item->getLog_user_permission()."','"
                .$item->getLog_date()."','"
                .$item->getLog_user_name()."',"
                .$item->getLog_action().","
                .$item->getLog_position()."); ";
                // $result = mysqli_query($conn,$sql);
                //echo $sql;
                $result = $conns->query($sql);
                return $result;                 
            }
            return false;
            
        }
        //Lấy danh sách    
        public function getLogs(){
            $dbConnection = new DBConnection();
            $conns = $dbConnection->getConnection();
            if($conns != null){ 
                $sql="SELECT * FROM tbllog ";
              
                $sql .= "ORDER BY log_date DESC ";
                $sql .= "LIMIT 0 , 15; ";
                //echo $sql;
                // $result = mysqli_query($conn,$sql);
                $result = $conns->query($sql);
                $items = [];
                $item = null;
                while($row = mysqli_fetch_array($result)){
                    $item = new LogObject();
                    $item->setLog_name($row['log_name']);
                    $item->setLog_user_permission($row['log_user_permission']);
                    $item->setLog_date($row['log_date']);
                    $item->setLog_user_name($row['log_user_name']);
                    $item->setLog_action($row['log_action']);
                    $item->setLog_position($row['log_position']);
                    $items[] = $item;
                }
                return $items;
            }
        }

    }


?>     
