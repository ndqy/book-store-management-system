<?php

use HashMap\HashMap;

    require_once("../../../php/ads/Connection.php");
    require_once('LogModel.php');
    require_once("../../../lib/HashMap.php");

    class LogLibrary{
        public function viewLogs($items){
           
            //$date = date('Y-m-d')
            $dates = [];
            foreach($items as $item){
                $str = $item->getLog_date();
                $dates[] = substr($str,0,10);
            }
            $dates = array_unique($dates);
            arsort($dates);
            
            //print_r($dates);

            echo "<!-- Recent activity -->";
            echo "<div class=\"card\">";
            
            $daynow = date('Y-m-d');
            echo "<div class=\"card-body\">";
            if(in_array($daynow,$dates)){
                echo "<h5 class=\"card-title\" style=\"padding: 20px 0 0px 0\">Lịch sử làm việc<br><span>| Hôm nay</span></h5>";
            }else {
                echo "<h5 class=\"card-title\" style=\"padding: 20px 0 0px 0\">Lịch sử làm việc</h5>";
            }
            
                forEach($items as $item){ 
                    $activity = "";
                    $color = "";
                    switch ($item->getLog_action()) {
                        case 1:
                            $activity = " đã thêm mới ";
                            $color = " text-primary ";
                            break;
                        case 2:
                            $activity = " đã cập nhật ";
                            $color = " text-warning ";
                            break;
                        case 3:
                            $activity = " đã xóa ";
                            $color = " text-muted ";
                            break;
                        case 4:
                            $activity = " đã xóa vĩnh viễn ";
                            $color = " text-danger ";
                            break;
                        case 5:
                            $activity = " đã khôi phục ";
                            $color = " text-success ";
                            break;
                        case 6:
                            $activity = " đã đánh dấu hoàn thành ";
                            $color = " text-success ";
                            break;
                        case 7:
                            $activity = " đã thêm mới hóa đơn của ";
                            $color = " text-success ";
                            break;
                        case 8:
                            $activity = " đã cập nhật hóa đơn của ";
                            $color = " text-success ";
                            break;
                        case 9:
                            $activity = " đã xóa hóa đơn của ";
                            $color = " text-success ";
                            break;

                        
                    }
                    
                    $modul="";
                    switch ($item->getLog_position()) {
                        case 1:
                            $modul = " Người dùng ";
                            break;
                        case 2:
                            $modul = " Danh mục ";
                            break;
                        case 3:
                            $modul = " Sách ";
                            break;
                        case 4:
                            $modul = " Hóa đơn ";
                            break;
                    }
                    
                    //$date = date('Y-m-d');
                    if(strcmp($daynow, substr($item->getLog_date(),0,10)) == 0) {
                        echo "<div class=\"activity mb-2\">";

                            echo "<div class=\"activity-item d-flex\">";
                                echo "<div class=\"activite-label\">".substr($item->getLog_date(),11)."</div>";
                                echo "<i class='bi bi-circle-fill activity-badge ".$color." align-self-start'></i>";
                                echo "<div class=\"activity-content\">";
                                echo "<b>".$item->getLog_user_name()."</b>" . $activity ." <a href=\"#\" class=\"fw-bold text-dark\"><i>".$item->getLog_name()."</i></a> tại Modul<b>" . $modul."</b>";
                            echo "</div>";
                            echo "</div><!-- End activity item-->";

                            echo "</div>";
                    }
                }
            
                //$tmp = date('Y-m-d');
                foreach($dates as $date){
                    if(strcmp($date, $daynow) != 0) {
                        echo "<h5 class=\"card-title\" style=\"margin: -20px 0 0px 0\"><br><span>| ".$date."</span></h5>";
                            
                        forEach($items as $item){  
                            $activity = "";
                            $color = "";
                            switch ($item->getLog_action()) {
                                case 1:
                                    $activity = " đã thêm mới ";
                                    $color = "text-primary";
                                    break;
                                case 2:
                                    $activity = " đã cập nhật ";
                                    $color = "text-warning";
                                    break;
                                case 3:
                                    $activity = " đã xóa ";
                                    $color = "text-danger";
                                case 4:
                                    $activity = " đã xóa vĩnh viễn ";
                                    $color = " text-danger ";
                                    break;
                                    case 5:
                                        $activity = " đã khôi phục ";
                                        $color = " text-success ";
                                        break;
                                    case 6:
                                        $activity = " đã đánh dấu hoàn thành ";
                                        $color = " text-success ";
                                        break;
                                    case 7:
                                        $activity = " đã thêm mới hóa đơn của ";
                                        $color = " text-success ";
                                        break;
                                    case 8:
                                        $activity = " đã cập nhật hóa đơn của ";
                                        $color = " text-success ";
                                        break;
                                    case 9:
                                        $activity = " đã xóa hóa đơn của ";
                                        $color = " text-success ";
                                        break;
                            }
                            
                            $modul="";
                            switch ($item->getLog_position()) {
                                case 1:
                                    $modul = " Người dùng ";
                                    break;
                                case 2:
                                    $modul = " Danh mục";
                                    break;
                                case 3:
                                    $modul = " Sách ";
                                    break;
                                case 4:
                                    $modul = " Hóa đơn ";
                                    break;
                            }
                            
                            
                            if(strcmp($date, substr($item->getLog_date(),0,10)) == 0 ) {
                                //echo "<h5 class=\"card-title\" style=\"margin: -20px 0 0px 0;\"><br><span>| "+key+"</span></h5>";
                                    echo "<div class=\"activity mb-2\">";
                
                                    echo "<div class=\"activity-item d-flex\">";
                                        echo "<div class=\"activite-label\">".substr($item->getLog_date(),11)."</div>";
                                        echo "<i class='bi bi-circle-fill activity-badge ".$color." align-self-start'></i>";
                                        echo "<div class=\"$activity-content\">";
                                        echo "<b>".$item->getLog_user_name()."</b>" . $activity ." <a href=\"#\" class=\"fw-bold text-dark\"><i>".$item->getLog_name()."</i></a> tại Modul<b>" . $modul."</b>";
                                        echo "</div>";
                                    echo "</div><!-- End activity item-->";
                
                                    echo "</div>";
                            }
                        }
                    }
                }


            echo "</div>";
            echo "</div><!-- End Recent activity -->";
    

        }

    }
?>