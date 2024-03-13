<?php 
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/CartObject.php');
    require_once('CartModel.php');

    
    class CartLibrary{

        public function viewCarts($items){
            echo "<table class=\"table table-hover\">";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class=\"text-center\" scope=\"col\">#</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Khách hàng</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Ngày tạo</th>";
                        //echo "<th class=\"text-center\" scope=\"col\">Điện thoại</th>";
                        //echo "<th class=\"text-center\" scope=\"col\">Địa chỉ</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Tên sách</th>";
                        echo "<th class=\"text-center\" scope=\"col\">SL</th>";
                        echo "<th class=\"text-center\" scope=\"col\">ĐG</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Thành tiền</th>";
                        
                        //echo "<th class=\"text-center\" scope=\"col\">Ngày cập nhật</th>";
                        echo "<th class=\"text-center\" scope=\"col\" >Thực hiện</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                        foreach($items as $item) {
                            $customer = $item->getCart_user_name();
                            if(strlen($customer) > 20){
                                
                                $customer = substr($customer,strpos($customer," "),20)."...";
                                //$customer = substr($customer,0,strripos($tmp," "))." ...";
                            }
                            $name = $item->getCart_book_name();
                            if(strlen($name) > 40){
                                $tmp = substr($name,0,40);
                                $name = substr($name,0,strripos($tmp," "))." ...";
                            }
                            echo "<tr  data-bs-toggle=\"modal\" data-bs-target=\"#infoCart".$item->getCart_id()."\">";
                            
                                echo "<th class=\"text-center\" scope=\"row\">".$item->getCart_id()."</th>";
                                echo "<td class=\"text-center\">".$customer."</td>";
                                echo "<td class=\"text-center\">".$item->getCart_creat_date()."</td>";
                               // echo "<td class=\"text-center\">".$item->getCart_user_phone()."</td>";
                                //echo "<td class=\"text-center\">".$item->getCart_adderss()."</td>";
                                echo "<td class=\"text-center\">".$name."</td>";
                                echo "<td class=\"text-center\">".$item->getCart_book_total()."</td>";
                                echo "<td class=\"text-center\">".$item->getCart_book_price()."</td>";
                                $money = $item->getCart_book_total() * $item->getCart_book_price();
                                echo "<td class=\"text-center\">".$money."</td>";
                                //echo "<td class=\"text-center\">".$item->getCart_last_modifle()."</td>";
                               if($item->getCart_status()){
                                   
                                    echo "<td class=\"text-center\"><button class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#infoCart".$item->getCart_id()."\"><i class=\"bi bi-eye\"></i></button>";
                                    
                                    //echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm mx-2\" data-bs-toggle=\"modal\" data-bs-target=\"#delCart".$item->getCart_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";
                                    echo "<button class=\"btn btn-danger btn-sm mx-2\" data-bs-toggle=\"modal\" data-bs-target=\"#delCart".$item->getCart_id()."\"><i class=\"bi bi-trash3\"></i></button>";
                                    //echo $this->viewDelCart($item);
                                    echo "<button class=\"btn btn-success btn-sm\"><i class=\"bi bi-printer\"></i></button></td>";
                                   
                                    //echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#passCart".$item->getCart_id()."\"><i class=\"bi bi-cart-check\"></i></button></td>";
                                   // echo $this->viewPassCart($item);
                                }else{
                                    
                                    echo "<td class=\"text-center\"><button class=\"btn btn-warning btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#editCart".$item->getCart_id()."\"><i class=\"bi bi-pencil-square\"></i></button>";
                                    
                                    echo "<button class=\"btn btn-danger btn-sm mx-2\" data-bs-toggle=\"modal\" data-bs-target=\"#delCart".$item->getCart_id()."\"><i class=\"bi bi-trash3\"></i></button>";
                                    
                                    echo "<button class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#passCart".$item->getCart_id()."\"><i class=\"bi bi-cart-check\"></i></button>";
                                    
                                    echo "<button class=\"btn btn-success btn-sm mx-2\"><i class=\"bi bi-printer\"></i></button></td>";
                                   
                                }
                            echo "</tr>";
                            echo $this->viewPassCart($item);
                            echo $this->viewDelCart($item);
                            echo $this->viewEditCart($item);
                            echo $this->viewInfoCart($item);
                        }
                echo "</tbody>";
            echo "</table>";
            
        }   

        public function viewAddCart(CartObject $similar){
            echo "<!-- Modal -->";
            echo "<div class=\"modal fade\" id=\"addCart\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"addUserLabel\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog modal-lg\">";
                echo "<form method=\"post\" action=\"CartAE.php\" class=\"needs-validation\" novalidate>";
                    echo "<div class=\"modal-content\">";
                        echo "<div class=\"modal-header\">";
                            echo "<h1 class=\"modal-title fs-5\" id=\"addUserLabel\"><i class=\"bi bi-cart-plus\"></i> Thêm mới đơn hàng</h1>";
                            echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                        echo "</div>";

                        echo "<div class=\"modal-body\">";
                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Tên người nhận</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserName1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào tên người nhận";
                                        echo "</div>";
                                echo "</div>";

                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Số điện thoại người nhận</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserPhone1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào SĐT người nhận";
                                        echo "</div>";
                                echo "</div>";

                            echo "</div>";

                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Tên sách</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookName1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào tên sách";
                                    echo "</div>";
                                echo "</div>";

                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Giá bán</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookPrice1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào giá bán";
                                        echo "</div>";
                                echo "</div>";

                            echo "</div>";

                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Số lượng</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookTotal1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào số lượng sách";
                                        echo "</div>";
                                echo "</div>";

                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Địa chỉ người nhận</label>";
                                    echo "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserAddress1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào địa chỉ người nhận";
                                        echo "</div>";
                                echo "</div>";

                            echo "</div>";

                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-12\">";
                                    echo "<label for=\"full-name\" class=\"form-label\">Ghi chú</label>";
                                    echo "<textarea class=\"form-control\" name=\"txtCartNote1\" rows=\"3\"></textarea>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào ghi chú của danh mục";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class=\"modal-footer\">";
                            echo "<button type=\"submit\" name =\"addCart\" class=\"btn btn-primary\"><i class=\"bi bi-cart-plus\"></i> Thêm mới</button>";
                            echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
            echo "</div>";
            echo "</div>";
        }
       
        public function viewDelCart(CartObject $item) {
            $tmp = "";
            
            $tmp .= "<div class=\"modal fade\" id=\"delCart".$item->getCart_id()."\" tabindex=\"-1\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"DelUserLabel".$item->getCart_id()."\"><i class=\"bi bi-trash3\"></i> Xóa đơn hàng</h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";

            $tmp .= "Bạn có chắc chắn xóa đơn hàng của <b>".$item->getCart_user_name()."</b>?<br>";
            $tmp .= "Hệ thống không thể phục hồi đơn hàng này được nữa.";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
            $tmp .= "<a href=\"CartDP.php?id=".$item->getCart_id()."&name=".$item->getCart_user_name()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa vĩnh viễn</a>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            return $tmp;
        }
        
        public function viewPassCart(CartObject $item) {
            $tmp = "";
            
            $tmp .= "<div class=\"modal fade\" id=\"passCart".$item->getCart_id()."\" tabindex=\"-1\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" ><i class=\"bi bi-cart-check\"></i> Xác nhận hoàn tất đơn hàng</h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";

            $tmp .= "Bạn có chắc chắn xác nhận hoàn thành đơn hàng của <b>".$item->getCart_user_name()."</b>?<br>";
            //$tmp .= "Hệ thống không thể phục hồi đơn hàng này được nữa.";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
            $tmp .= "<a href=\"CartDP.php?idp=".$item->getCart_id()."&name=".$item->getCart_user_name()."\" class=\"btn btn-primary\"><i class=\"bi bi-check-lg\"></i> Hoàn thành</a>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            return $tmp;
        }

        public function viewInfoCart(CartObject $item) {
            
            $tmp = "";
            $tmp .= "<!-- Modal -->";
            $tmp .= "<div class=\"modal fade\" id=\"infoCart".$item->getCart_id()."\" tabindex=\"-1\" aria-labelledby=\"infoUserLabel\" aria-hidden=\"true\">";
                $tmp .= "<div class=\"modal-dialog modal-lg\">";	  
                    $tmp .= "<div class=\"modal-content\">";
                        $tmp .= "<div class=\"modal-header\">";
                            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"infoUserLabel\"><i class=\"bi bi-cart2\"></i> Thông tin đơn hàng của khách hàng <b>".$item->getCart_user_name()."</b></h1>";
                            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                        $tmp .= "</div>";

                        $tmp .= "<div class=\"modal-body\">";
                  
                            $tmp .=  "<div class=\"row mb-3\">";
                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Tên người nhận</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserName1\" readonly  value=\"".$item->getCart_user_name()."\"required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào tên người nhận";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Số điện thoại người nhận</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserPhone1\" readonly value=\"".$item->getCart_user_phone()."\"  required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào SĐT người nhận";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                        $tmp .=  "</div>";

                        $tmp .=  "<div class=\"row mb-3\">";
                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Tên sách</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookName1\"  readonly value=\"".$item->getCart_book_name()."\"  required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào tên sách";
                                $tmp .=  "</div>";
                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Giá bán</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookPrice1\"  readonly  value=\"".$item->getCart_book_price()."\" required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào SĐT người nhận";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                        $tmp .=  "</div>";

                        $tmp .=  "<div class=\"row mb-3\">";
                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Số lượng</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookTotal1\"  readonly value=\"".$item->getCart_book_total()."\" required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào số lượng sách";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Địa chỉ người nhận</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserAddress1\"  readonly value=\"".$item->getCart_adderss()."\"  required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào địa chỉ người nhận";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                        $tmp .=  "</div>";

                        $tmp .=  "<div class=\"row mb-3\">";
                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Ngày tạo</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookTotal1\"  readonly value=\"".$item->getCart_creat_date()."\"  required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào ngày tạo";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"col-lg-6\">";
                                $tmp .=  "<label for=\"user-name\" class=\"form-label\">Ngày cập nhật</label>";
                                $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserAddress1\"  readonly  value=\"".$item->getCart_last_modifle()."\" required>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào ngày cập nhật";
                                    $tmp .=  "</div>";
                            $tmp .=  "</div>";

                        $tmp .=  "</div>";

                        $tmp .=  "<div class=\"row mb-3\">";
                            $tmp .=  "<div class=\"col-lg-12\">";
                                $tmp .=  "<label for=\"full-name\" class=\"form-label\">Ghi chú</label>";
                                $tmp .=  "<textarea class=\"form-control\" name=\"txtCartNote1\" rows=\"3\"   readonly >".$item->getCart_note()."</textarea>";
                                $tmp .=  "<div class=\"invalid-feedback\">";
                                    $tmp .=  "Hãy nhập vào ghi chú của danh mục";
                                $tmp .=  "</div>";
                            $tmp .=  "</div>";
                        $tmp .=  "</div>";

                        $tmp .= "</div>";//modal-body
                        $tmp .= "<div class=\"modal-footer\">";
                            if($item->getCart_status()) {
                               // $tmp .= "<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#resCart".$item->getCart_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</button>";
                                $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                            }else {
                                $tmp .= "<button class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#editCart".$item->getCart_id()."\"><i class=\"bi bi-gear\"></i> Chỉnh sửa</button>";
                                $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                            }
                        $tmp .= "</div>";//modal-footer
                    $tmp .= "</div>";//modal-content
                $tmp .= "</div>";//modal-dialog
            $tmp .= "</div>";//modal fade
            return $tmp;
            
        }
        
        public function viewEditCart(CartObject $item) {
            
            $tmp = "";
            $tmp .= "<!-- Modal -->";
            $tmp .= "<div class=\"modal fade\" id=\"editCart".$item->getCart_id()."\" tabindex=\"-1\" aria-labelledby=\"infoUserLabel\" aria-hidden=\"true\">";
                $tmp .= "<div class=\"modal-dialog modal-lg\">";
                $tmp .=  "<form method=\"post\" action=\"CartAE.php\" class=\"needs-validation\" novalidate>";
                    	  
                    $tmp .= "<div class=\"modal-content\">";
                        $tmp .= "<div class=\"modal-header\">";
                            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"infoUserLabel\"><i class=\"bi bi-cart2\"></i> Cập nhật thông tin đơn hàng của khách hàng <b>".$item->getCart_user_name()."</b></h1>";
                            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                        $tmp .= "</div>";
                        $tmp .= "<div class=\"modal-body\">";
                  
                            $tmp .=  "<div class=\"row mb-3\">";
                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Tên người nhận</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserName\" value=\"".$item->getCart_user_name()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào tên người nhận";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Số điện thoại người nhận</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserPhone\"  value=\"".$item->getCart_user_phone()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào SĐT người nhận";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";
                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"row mb-3\">";
                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Tên sách</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookName\" value=\"".$item->getCart_book_name()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào tên sách";
                                    $tmp .=  "</div>";
                                $tmp .=  "</div>";

                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Giá bán</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookPrice\" value=\"".$item->getCart_book_price()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào SĐT người nhận";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"row mb-3\">";
                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Số lượng</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartBookTotal\" value=\"".$item->getCart_book_total()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào số lượng sách";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Địa chỉ người nhận</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  name=\"txtCartUserAddress\" value=\"".$item->getCart_adderss()."\" required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào địa chỉ người nhận";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"row mb-3\">";

                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Ngày cập nhật</label>";
                                    $tmp .=  "<input type=\"text\" class=\"form-control\"  value=\"".$item->getCart_last_modifle()."\" readonly  required>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào ngày cập nhật";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                                $tmp .=  "<div class=\"col-lg-6\">";
                                    $tmp .=  "<label for=\"user-name\" class=\"form-label\">Ngày tạo</label>";
                                    $tmp .=  "<select class=\"form-select\" required id=\"user-permission\" name=\"slcStatus\">";
                                    $tmp .=  "<option value=\"0\" selected>Chưa hoàn thành</option>";
                                        $tmp .=  "<option value=\"1\">Đã hoàn thành</option>";
                                   
                                    $tmp .=  "</select>"; 
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào ngày tạo";
                                        $tmp .=  "</div>";
                                $tmp .=  "</div>";

                            $tmp .=  "</div>";

                            $tmp .=  "<div class=\"row mb-3\">";
                                $tmp .=  "<div class=\"col-lg-12\">";
                                    $tmp .=  "<label for=\"full-name\" class=\"form-label\">Ghi chú</label>";
                                    $tmp .=  "<textarea class=\"form-control\" name=\"txtCartNote\" rows=\"3\" >".$item->getCart_note()."</textarea>";
                                    $tmp .=  "<div class=\"invalid-feedback\">";
                                        $tmp .=  "Hãy nhập vào ghi chú của danh mục";
                                    $tmp .=  "</div>";
                                $tmp .=  "</div>";
                            $tmp .=  "</div>";
                            //==========================================
                            $tmp .=  "<input type=\"hidden\" name =\"idForPost\" value=\"".$item->getCart_id()."\"  id=\"\">";
                                        

                        $tmp .= "</div>";//modal-body
                        $tmp .= "<div class=\"modal-footer\">";
                            
                        $tmp .=  "<button type=\"submit\" name=\"editCart\" class=\"btn btn-primary\"><i class=\"bi bi-check2\"></i> Hoàn tất</button>";
                        $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                            
                        $tmp .= "</div>";//modal-footer
                    $tmp .= "</div>";//modal-content
                    $tmp .=  "</form>";
                $tmp .= "</div>";//modal-dialog
            $tmp .= "</div>";//modal fade
            return $tmp;
            
        }
        

        public function creatChart($items) {
            $data = "";
            $Carts = "";
            foreach($items as $item){
                $data.=$item->getUser_logined();
                $Carts.="'" . $item->getUser_fullname()." / " . $item->getUser_name() . "'";
                if(array_search($item,$items)<count($items)) {
                    $data.=",";
                    $Carts.=",";
                }
            }
            // echo $data;
            // echo "---------------";
            // echo $Carts;
            $tmp = "";
            $tmp .= "<div class=\"card\">";
            $tmp .= "<div class=\"card-body\">";
            $tmp .= "<h5 class=\"card-title\">Biểu đồ số lần đăng nhập của người dùng</h5>";
    
            $tmp .= "<!-- Bar Chart -->";
            $tmp .= "<div id=\"barChart\"></div>";
            $tmp .= "";
            $tmp .= "<script>";
            $tmp .= "document.addEventListener(\"DOMContentLoaded\", () => {";
            $tmp .= "new ApexCharts(document.querySelector(\"#barChart\"), {";
            $tmp .= "series: [{";
            $tmp .= "data: [".$data."]";
            $tmp .= "}],";
            $tmp .= "chart: {";
            $tmp .= "type: 'bar',";
            if(count($items)<5) {
                $tmp .= "height: 200";	
            }else {
                $tmp .= "height: " . $items->size()*50 .")";	
            }
            $tmp .= "},";
            $tmp .= "plotOptions: {";
            $tmp .= "bar: {";
            $tmp .= "borderRadius: 4,";
            $tmp .= "horizontal: true,";
            $tmp .= "}";
            $tmp .= "},";
            $tmp .= "dataLabels: {";
            $tmp .= "enabled: false";
            $tmp .= "},";
            $tmp .= "xaxis: {";
            $tmp .= "Cartgories: [".$Carts."],";
            $tmp .= "show: true,";
            $tmp .= "labels: {";
            $tmp .= "show: true,";
            $tmp .= "align: 'right',";
            $tmp .= "minWidth: 0,";
            $tmp .= "maxWidth: 300,";
            $tmp .= "style: {";
            $tmp .= "colors: [],";
            $tmp .= "fontSize: '15px',";
            $tmp .= "fontFamily: 'Helvetica, Arial, sans-serif',";
            $tmp .= "fontWeight: 400,";
            $tmp .= "cssClass: 'apexcharts-yaxis-label'";
            $tmp .= "},";
            $tmp .= "},";
            $tmp .= "},";
    
            $tmp .= "yaxis: {";
            $tmp .= "show: true,";
            $tmp .= "labels: {";
            $tmp .= "show: true,";
            $tmp .= "align: 'right',";
            $tmp .= "minWidth: 0,";
            $tmp .= "maxWidth: 300,";
            $tmp .= "style: {";
            $tmp .= "colors: [],";
            $tmp .= "fontSize: '15px',";
            $tmp .= "fontFamily: 'Helvetica, Arial, sans-serif',";
            $tmp .= "fontWeight: 400,";
            $tmp .= "cssClass: 'apexcharts-yaxis-label'";
            $tmp .= "},";
            $tmp .= "},";
            $tmp .= "}";
            
            $tmp .= "}).render();";
            $tmp .= "});";
            $tmp .= "</script>";
            $tmp .= "<!-- End Bar Chart -->";
              $tmp .= "</div>";//card
              $tmp .= "</div>";//card-body	
            return $tmp;
        }
    }
    
?>
