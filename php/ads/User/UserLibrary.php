<?php 
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/UserObjects.php');
    require_once('UserModel.php');
    
    class UserLibrary{
        public function viewAddUser($similar){
            echo "<!-- Modal -->";
            echo "<div class=\"modal fade\" id=\"addUser\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"addUserLabel\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog modal-lg\">";
            echo "<form method=\"post\" action=\"UserAE.php\" class=\"needs-validation\" novalidate>";
            echo "<div class=\"modal-content\">";
            echo "<div class=\"modal-header\">";
            echo "<h1 class=\"modal-title fs-5\" id=\"addUserLabel\"><i class=\"bi bi-person-add\"></i> Thêm mới người sử dụng</h1>";
            echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            echo "</div>";
            echo "<div class=\"modal-body\">";
            echo "<div class=\"row mb-3\">";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"user-name\" class=\"form-label\">Tên tài khoản</label>";
            echo "<input type=\"text\" class=\"form-control\" id=\"user-name\" name=\"txtUserName1\" required>";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập vào tên tài khoản";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"full-name\" class=\"form-label\">Họ tên</label>";
            echo "<input type=\"text\" class=\"form-control\" id=\"full-name\" name=\"txtFullName1\">";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập vào họ tên của người dùng";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"row mb-3\">";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"password\" class=\"form-label\">Mật khẩu</label>";
            echo "<input type=\"password\" class=\"form-control\" id=\"password\" required name=\"txtPassword1\">";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập vào mật khẩu cho tài khoản";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"confirm-password\" class=\"form-label\">Nhập lại mật khẩu</label>";
            echo "<input type=\"password\" class=\"form-control\" id=\"confirm-password\" required name=\"txtConfirmPassword1\">";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập lại mật khẩu cho tài khoản";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"row mb-3\">";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"email-address\" class=\"form-label\">Hộp thư</label>";
            echo "<input type=\"email\" class=\"form-control\" id=\"email-address\" required name=\"txtEmailAddress1\">";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập vào tên địa chỉ hộp thư";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"phone-number\" class=\"form-label\">Điện thoại</label>";
            echo "<input type=\"text\" class=\"form-control\" id=\"phone-number\" required name=\"txtPhoneNumber1\">";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy nhập số điện thoại cho tài khoản";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"row mb-3\">";
            echo "<div class=\"col-lg-6\">";
            echo "<label for=\"user-permission\" class=\"form-label\">Quyền thực thi</label>";
            echo "<select class=\"form-select\" required id=\"user-permission\" name=\"slcPermis1\">";
            echo "<option value=\"\" selected>--- Chọn ---</option>";
            echo "<option value=\"1\">Khách hàng</option>";
            if($similar->getUser_permission() == 3 ) {
                echo "<option value=\"2\">Quản lý</option>";
            }else{
                if($similar->getUser_permission() > 3 ) {
                    echo "<option value=\"2\">Quản lý</option>";
                    echo "<option value=\"3\">Quản trị</option>";
                }
            }
            echo "</select>";
            echo "<div class=\"invalid-feedback\">";
            echo "Hãy lựa chọn quyền thực thi";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-lg-6\">";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"modal-footer\">";
            echo "<button type=\"submit\" name =\"addUser\" class=\"btn btn-primary\"><i class=\"bi bi-person-plus\"></i> Thêm mới</button>";
            echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        public function viewResUser(UserObject $item) {
            // TODO Auto-generated method stub
            $tmp = "";
            
            $tmp .= "<div class=\"modal fade\" id=\"resUser".$item->getUser_id()."\" tabindex=\"-1\" aria-labelledby=\"ResUserLabel\".item.getUser_id().\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog modal-lg\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"ResUserLabel".$item->getUser_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục tài khoản người dùng <b>".$item->getUser_fullname()." / ". $item->getUser_name()."</b></h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            
            $tmp .= "<div class=\"row mb-3\">";
            $tmp .= "<div class=\"col-lg-12\">";
            $tmp .= "Bạn có chắc chắn muốn khôi phục tài khoản của <b>".$item->getUser_fullname()." / ".$item->getUser_name()."</b>?<br>";
            $tmp .= "Người dùng có thể sử dụng tài khoản để đăng nhập và làm việc với hệ thống.";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
    
            $tmp .= "<a href=\"UserDR.php?idr=".$item->getUser_id()."&name=".$item->getUser_fullname()."\" class=\"btn btn-success\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</a>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            return $tmp;
        }
        public function viewDelUser(UserObject $item) {
            $tmp = "";
            $title = "";
            if($item->getUser_deleted()) {
                $title = "Xóa vĩnh viễn ";
            }else {
                $title = "Xóa tài khoản ";
            }
            
            $tmp .= "<div class=\"modal fade\" id=\"delUser".$item->getUser_id()."\" tabindex=\"-1\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"DelUserLabel".$item->getUser_id()."\"><i class=\"bi bi-trash3\"></i> ".$title."</h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            if($item->getUser_deleted()) {
                $tmp .= "Bạn có chắc chắn xóa vĩnh viễn tài khoản <b>".$item->getUser_fullname()." (".$item->getUser_name().")</b>?<br>";
                $tmp .= "Tài khoản không thể phục hồi được nữa.";
            }else {
                $tmp .= "Bạn có chắc chắn xóa tài khoản <b>".$item->getUser_fullname()." (".$item->getUser_name().")</b>?<br>";
                $tmp .= "Hệ thống tạm thời lưu vào thùng rác, có thể phục hồi trong vòng 30 ngày.";
            }
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
            if($item->getUser_deleted()) {
                $tmp .= "<a href=\"UserDR.php?id=".$item->getUser_id()."&name=".$item->getUser_fullname()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa vĩnh viễn</a>";
            }else {
                $tmp .= "<a href=\"UserDR.php?iddel=".$item->getUser_id()."&name=".$item->getUser_fullname()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa</a>";
            }
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            return $tmp;
        }
        public function viewUsers($items){
            echo "<table class=\"table table-hover\">";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class=\"text-center\" scope=\"col\">#</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Họ tên</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Tài khoản</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Hộp thư</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Điện thoại</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Địa chỉ</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Ngày cập nhật</th>";
                        echo "<th class=\"text-center\" scope=\"col\" colspan=\"3\">Thực hiện</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                        foreach($items as $item) {
                            echo "<tr>";
                                echo "<th class=\"text-center\" scope=\"row\">".$item->getUser_id()."</th>";
                                echo "<td class=\"text-center\">".$item->getUser_fullname()."</td>";
                                echo "<td class=\"text-center\">".$item->getUser_name()."</td>";
                                echo "<td class=\"text-center\">".$item->getUser_email()."</td>";
                                echo "<td class=\"text-center\">".$item->getUser_phone()."</td>";
                                echo "<td class=\"text-center\">".$item->getUser_address()."</td>";
                                echo "<td class=\"text-center\">".$item->getUser_last_modified()."</td>";
                                if($item->getUser_deleted()){
                                    echo "<td class=\"align-middle\"><button type=\"button\" class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#infoUser".$item->getUser_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                                    echo $this->viewInfoUser($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-success btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#resUser".$item->getUser_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i></button></td>";
                                    echo $this->viewResUser($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#delUser".$item->getUser_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";
                                    echo $this->viewDelUser($item);
                                }else{
                                    echo "<td class=\"align-middle\"><button type=\"button\" class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#infoUser".$item->getUser_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                                    echo $this->viewInfoUser($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-warning btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#editUser".$item->getUser_id()."\"><i class=\"bi bi-pencil-square\"></i></button></td>";
                                    echo $this->viewEditUser($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#delUser".$item->getUser_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";
                                    echo $this->viewDelUser($item);
                                }
                            echo "</tr>";
                        }
                echo "</tbody>";
            echo "</table>";
            
        }   
        public function viewInfoUser($item) {
            $tmp = "";
            $permis = "";
            $per = $item->getUser_permission();
            switch ($per) {
            case 1: $permis = "Khách hàng"; break;
            case 2: $permis = "Quản lý"; break;
            case 3: $permis = "Quản trị"; break;
            case 4: $permis = "Quản trị cấp cao"; break;
            default: $permis = "none";
            }
            $tmp .= "<!-- Modal -->";
            $tmp .= "<div class=\"modal fade\" id=\"infoUser".$item->getUser_id()."\" tabindex=\"-1\" aria-labelledby=\"infoUserLabel\" aria-hidden=\"true\">";
              $tmp .= "<div class=\"modal-dialog modal-lg\">";	  
                $tmp .= "<div class=\"modal-content\">";
                  $tmp .= "<div class=\"modal-header\">";
                    $tmp .= "<h1 class=\"modal-title fs-5\" id=\"infoUserLabel\"><i class=\"bi bi-person-vcard\"></i> Thông tin tài khoản <b>".$item->getUser_fullname(). " / " . $item->getUser_name() ."</b></h1>";
                    $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                  $tmp .= "</div>";
                  $tmp .= "<div class=\"modal-body\">";
                  
                    $tmp .= "<div class=\"row mb-3\">";
                    
                    $tmp .= "<div class=\"col-lg-6\">";
                    $tmp .= "<label for=\"user-name\" class=\"form-label\">Tên tài khoản</label>";
                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-name".$item->getUser_id()."\" name=\"txtUserName\" value=\"".$item->getUser_name()."\" disabled readonly>";	
                    $tmp .= "</div>";
                    
                    $tmp .= "<div class=\"col-lg-6\">";
                    $tmp .= "<label for=\"full-name\" class=\"form-label\">Họ tên</label>";
                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"full-name\" name=\"txtFullName\" value=\"".$item->getUser_fullname()."\"disabled readonly>";
                    $tmp .= "</div>";
                    
                    $tmp .= "</div>";
                    
                    $tmp .= "<div class=\"row mb-3\">";
                    $tmp .= "<div class=\"col-lg-6\">";
                    $tmp .= "<label for=\"email-address\" class=\"form-label\">Hộp thư</label>";
                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"email-address\" required name=\"txtEmailAddress\" value=\"".$item->getUser_email()."\" disabled readonly>";
                    $tmp .= "</div>";
                    
                    $tmp .= "<div class=\"col-lg-6\">";
                    $tmp .= "<label for=\"phone-number\" class=\"form-label\">Điện thoại</label>";
                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"phone-number\" required name=\"txtPhoneNumber\" value=\"".$item->getUser_phone()."\" disabled readonly>";
                    $tmp .= "</div>";
                    
                    $tmp .= "</div>";
                    
                    $tmp .= "<div class=\"row mb-3\">";
                    $tmp .= "<div class=\"col-lg-6\">";
                    $tmp .= "<label for=\"user-permission\" class=\"form-label\">Quyền thực thi</label>";
                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-permis\" required name=\"txtPermis\" value=\"".$permis."\" disabled readonly>";
                    $tmp .= "</div>";
                    $tmp .= "</div>";
     
                  $tmp .= "</div>";//modal-body
                  $tmp .= "<div class=\"modal-footer\">";
                  if($item->getUser_deleted()) {
                    $tmp .= "<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#resUser".$item->getUser_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</button>";
                      $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                  }else {
                      $tmp .= "<button class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#editUser".$item->getUser_id()."\"><i class=\"bi bi-person-gear\"></i> Chỉnh sửa</button>";
                      $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                  }
                  $tmp .= "</div>";//modal-footer
                $tmp .= "</div>";//modal-content
              $tmp .= "</div>";//modal-dialog
            $tmp .= "</div>";//modal fade
            return $tmp;
            
        }
        public function viewEditUser($user) {
            $tmp = "";
            
            $tmp .= "<!-- Modal -->";
            $tmp .= "<div class=\"modal fade\" id=\"editUser".$user->getUser_id()."\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"editUserLabel\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog modal-lg\">";
            $tmp .= "<form method=\"post\" action=\"UserAE.php\" class=\"needs-validation\" novalidate>";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"editUserLabel\"><i class=\"bi bi-person-gear\"></i> Chỉnh sửa thông tin <b>".$user->getUser_fullname()." / ".$user->getUser_name()."</b></h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            $tmp .= "<div class=\"row mb-3\">";
            
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"user-name\" class=\"form-label\">Tên tài khoản</label>";
            $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-name\" name=\"txtUserName\" value=\"".$user->getUser_name()."\" disabled readonly required>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"full-name\" class=\"form-label\">Họ tên</label>";
            $tmp .= "<input type=\"text\" class=\"form-control\" id=\"full-name\" name=\"txtFullName2\" value=\"".$user->getUser_fullname()."\">";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            
            $tmp .= "<div class=\"row mb-3\">";
            
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"email-address\" class=\"form-label\">Hộp thư</label>";
            $tmp .= "<input type=\"text\" class=\"form-control\" id=\"email-address\" required name=\"txtEmailAddress2\" value=\"".$user->getUser_email()."\">";
            $tmp .= "</div>";
            
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"phone-number\" class=\"form-label\">Điện thoại</label>";
            $tmp .= "<input type=\"text\" class=\"form-control\" id=\"phone-number\" required name=\"txtPhoneNumber2\" value=\"".$user->getUser_phone()."\">";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"row mb-3\">";
            
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"user-permission\" class=\"form-label\">Quyền thực thi</label>";
            $tmp .= "<select class=\"form-select\" required id=\"user-permission\" name=\"slcPermis2\">";
            $tmp .= "<option value=\"\" selected>--- Chọn ---</option>";
            $tmp .= "<option value=\"1\">Khách hàng</option>";
            if($user->getUser_permission() >=3 ) {
                $tmp .= "<option value=\"2\">Quản lý</option>";
                $tmp .= "<option value=\"3\">Quản trị </option>";
            }else {
                if($user->getUser_permission() < 3 ) {
                $tmp .= "<option value=\"2\">Quản lý</option>";
                }
            }
            
            $tmp .= "</select>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"col-lg-6\">";
            $tmp .= "<label for=\"address\" class=\"form-label\">Địa chỉ</label>";
            $tmp .= "<input type=\"text\" class=\"form-control\" id=\"address\" name=\"txtAddress2\" value=\"".$user->getUser_address()."\">";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            //==========================================
            $tmp .= "<input type=\"hidden\" name =\"idForPost\" value=\"".$user->getUser_id()."\"  id=\"\">";
            $tmp .= "<input type=\"hidden\" name =\"act\" value=\"edit\">";
            $tmp .= "<div class=\"modal-footer\">";
            $tmp .= "<button type=\"submit\" name=\"editUser\" class=\"btn btn-primary\"><i class=\"bi bi-check2\"></i> Hoàn tất</button>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</form>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            return $tmp;
        }
        public function getPagination($url, $total, $page, $totalperpage) {
            $tmp = "";
            
            // Đếm tổng số trang
            $pages = (int) ($total / $totalperpage);
            if ($total % $totalperpage != 0) {
                $pages++;
            }
            
            // Trang không hợp lệ thì quay về trang 1
            if ($page > $pages || $page <= 0) {
                $page = 1;
            }
            
            $tmp .= "<nav aria-label=\"...\">";
            $tmp .= "<ul class=\"pagination justify-content-center\">";
            
            if ($page == 1) {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\" disabled=\"disabled\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
            } else {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page - 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
            }
            
            // Left Current
            $leftcurrent = "";
            $count = 0;
            
            for ($i = $page - 1; $i > 0; $i--) {
                $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $i . "\">" . $i . "</a></li>" . $leftcurrent;
                
                if (++$count >= 2) {
                    break;
                }
            }
            
            if ($page == 4) {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=1\">" . 1 . "</a></li>";
            }
            
            if ($page > 4) {
                $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" disabled=\"disabled\">...</a></li>" . $leftcurrent;
                $leftcurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=1" . "\"><span aria-hidden=\"true\">1</span></a></li>" . $leftcurrent;
            }
            
            $tmp .= $leftcurrent;
            $tmp .= "<li class=\"page-item\"><a class=\"page-link active\" href=\"#\">" . $page . "</a></li>";
            
            // Right Current
            $rightcurrent = "";
            $count = 0;
            
            for ($i = $page + 1; $i < $pages; $i++) {
                $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $i . "\">" . $i . "</a></li>";
                
                if (++$count >= 2) {
                    break;
                }
            }
            
            if ($page < $pages - 3) {
                $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" disabled=\"disabled\">...</a></li>";
                $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . $pages . "\">" . $pages . "</a></li>";
                $rightcurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
            }
            
            $tmp .= $rightcurrent;
            
            if ($page == $pages - 2 || $page == $pages - 3) {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 2) . "\">" . $pages . "</a>";
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
            }
            
            if ($page == $pages - 1) {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\">".$pages . "</a>";
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $url . "page=" . ($page + 1) . "\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
        
            }
            
            if ($page == $pages) {
                $tmp .= "<li class=\"page-item\"><a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"false\" disabled=\"disabled\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
            }
            
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            return $tmp;
        }
        public function creatChart($items) {
            $data = "";
            $cates = "";
            foreach($items as $item){
                $data.=$item->getUser_logined();
                $cates.="'" . $item->getUser_fullname()." / " . $item->getUser_name() . "'";
                if(array_search($item,$items)<count($items)) {
                    $data.=",";
                    $cates.=",";
                }
            }
            // echo $data;
            // echo "---------------";
            // echo $cates;
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
                $height = count($items)*50;
                //echo $height;
                //echo "height: $height";
                $tmp .= "height: $height";	
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
            $tmp .= "categories: [".$cates."],";
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
    
    // $user = new UserObject();
    // $user->setUser_deleted(false);
    // $ul = new UserLibrary();
    // $um = new UserModel();
    // $items = $um->getUsers($user, 1 ,10);
    // $total = $um->getTotalUsers($user);
    // $ul->viewUsers($items, $total, $user,1,10);
    // <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
?>
