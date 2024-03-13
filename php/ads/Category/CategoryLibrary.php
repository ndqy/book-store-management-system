<?php 
    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/CategoryObject.php');
    require_once('CategoryModel.php');

    
    class CategoryLibrary{
        public function viewAddCategory(CategoryObject $similar){
            $um = new UserModel();
            $manager = $um->getManagers();
            echo "<!-- Modal -->";
            echo "<div class=\"modal fade\" id=\"addCate\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"addUserLabel\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog modal-lg\">";
                echo "<form method=\"post\" action=\"CategoryAE.php\" class=\"needs-validation\" novalidate>";
                    echo "<div class=\"modal-content\">";
                        echo "<div class=\"modal-header\">";
                            echo "<h1 class=\"modal-title fs-5\" id=\"addUserLabel\"><i class=\"bi bi-tags\"></i> Thêm mới danh mục</h1>";
                            echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                        echo "</div>";

                        echo "<div class=\"modal-body\">";
                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-name\" class=\"form-label\">Tên danh mục</label>";
                                    echo "<input type=\"text\" class=\"form-control\" id=\"user-name\" name=\"txtCateName1\" required>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào tên danh mục";
                                        echo "</div>";
                                echo "</div>";

                                echo "<div class=\"col-lg-6\">";
                                    echo "<label for=\"user-permission\" class=\"form-label\">Người quản lý</label>";
                                    echo "<select class=\"form-select\" required id=\"user-permission\" name=\"slcManager1\">";
                                    echo "<option value=\"\" selected>--- Chọn ---</option>";
                                    $manager->forEach(function($key, $value){
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    });
                                    echo "</select>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy lựa chọn người quản lý";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";

                            echo "<div class=\"row mb-3\">";
                                echo "<div class=\"col-lg-12\">";
                                    echo "<label for=\"full-name\" class=\"form-label\">Ghi chú</label>";
                                    echo "<textarea class=\"form-control\" name=\"txtCateNote1\" rows=\"3\"></textarea>";
                                    echo "<div class=\"invalid-feedback\">";
                                        echo "Hãy nhập vào ghi chú của danh mục";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class=\"modal-footer\">";
                            echo "<button type=\"submit\" name =\"addCate\" class=\"btn btn-primary\"><i class=\"bi bi-plus-lg\"></i> Thêm mới</button>";
                            echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        public function viewResCategory(CategoryObject $item) {
            // TODO Auto-generated method stub
            $tmp = "";
            
            $tmp .= "<div class=\"modal fade\" id=\"resCate".$item->getCategory_id()."\" tabindex=\"-1\" aria-labelledby=\"ResUserLabel\".item.getUser_id().\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog modal-lg\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"ResUserLabel".$item->getCategory_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục danh mục <b>".$item->getCategory_name()."</b></h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            
            $tmp .= "<div class=\"row mb-3\">";
            $tmp .= "<div class=\"col-lg-12\">";
            $tmp .= "Bạn có chắc chắn muốn khôi phục danh mục <b>".$item->getCategory_name()."</b>?<br>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
    
            $tmp .= "<a href=\"CategoryDR.php?idr=".$item->getCategory_id()."\" class=\"btn btn-success\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</a>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            return $tmp;
        }
        public function viewDelCategory(CategoryObject $item) {
            $tmp = "";
            $title = "";
            if($item->isCategory_delete()) {
                $title = "Xóa vĩnh viễn ";
            }else {
                $title = "Xóa tài khoản ";
            }
            
            $tmp .= "<div class=\"modal fade\" id=\"delCate".$item->getCategory_id()."\" tabindex=\"-1\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"DelUserLabel".$item->getCategory_id()."\"><i class=\"bi bi-trash3\"></i> ".$title."</h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            if($item->isCategory_delete()) {
                $tmp .= "Bạn có chắc chắn xóa vĩnh viễn danh mục <b>".$item->getCategory_name()."</b>?<br>";
            }else {
                $tmp .= "Bạn có chắc chắn xóa danh mục <b>".$item->getCategory_name()."</b>?<br>";
                $tmp .= "Hệ thống tạm thời lưu vào thùng rác, có thể phục hồi trong vòng 30 ngày.";
            }
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
            if($item->isCategory_delete()) {
                $tmp .= "<a href=\"CategoryDR.php?id=".$item->getCategory_id()."&name=".$item->getCategory_name()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa vĩnh viễn</a>";
            }else {
                $tmp .= "<a href=\"CategoryDR.php?iddel=".$item->getCategory_id()."&name=".$item->getCategory_name()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa</a>";
            }
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            return $tmp;
        }
        public function viewCatetories($items, $total, $similar, $page, $totalperpage){
            echo "<table class=\"table table-hover\">";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class=\"text-center\" scope=\"col\">#</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Tên danh mục</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Ghi chú</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Người quản lý</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Tổng số sách</th>";
                        echo "<th class=\"text-center\" scope=\"col\">Ngày cập nhật</th>";
                        echo "<th class=\"text-center\" scope=\"col\" colspan=\"3\">Thực hiện</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $um = new UserModel();
                $manager= $um->getManagers();
                        foreach($items as $item) {
                            echo "<tr  data-bs-toggle=\"modal\" data-bs-target=\"#infoCate".$item->getCategory_id()."\">";
                                echo "<th class=\"text-center\" scope=\"row\">".$item->getCategory_id()."</th>";
                                echo "<td class=\"text-center\">".$item->getCategory_name()."</td>";
                                echo "<td class=\"text-center\">".$item->getCategory_notes()."</td>";
                                echo "<td class=\"text-center\">".$manager->get($item->getCategory_manager_id())."</td>";
                                echo "<td class=\"text-center\">"."100"."</td>";
                                echo "<td class=\"text-center\">".$item->getCategory_last_modified()."</td>";
                                if($item->isCategory_delete()){
                                    echo "<td class=\"  align-middle\"><button type=\"button\" class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#infoCate".$item->getCategory_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                                    echo $this->viewInfoCategory($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-success btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#resCate".$item->getCategory_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i></button></td>";
                                    echo $this->viewResCategory($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#delCate".$item->getCategory_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";
                                    echo $this->viewDelCategory($item);
                                }else{
                                    echo "<td class=\"align-middle\"><button type=\"button\" class=\"btn btn-primary btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#infoCate".$item->getCategory_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                                    echo $this->viewInfoCategory($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-warning btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#editCate".$item->getCategory_id()."\"><i class=\"bi bi-pencil-square\"></i></button></td>";
                                    echo $this->viewEditCategory($item);
                                    echo "<td class=\"align-middle\"><button class=\"btn btn-danger btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#delCate".$item->getCategory_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";
                                    echo $this->viewDelCategory($item);
                                }
                            echo "</tr>";
                        }
                echo "</tbody>";
            echo "</table>";
            
        }   
        public function viewInfoCategory(CategoryObject $item) {
            $um = new UserModel();
            $manager = $um->getManagers();
            $tmp = "";
            $tmp .= "<!-- Modal -->";
            $tmp .= "<div class=\"modal fade\" id=\"infoCate".$item->getCategory_id()."\" tabindex=\"-1\" aria-labelledby=\"infoUserLabel\" aria-hidden=\"true\">";
                $tmp .= "<div class=\"modal-dialog modal-lg\">";	  
                    $tmp .= "<div class=\"modal-content\">";
                        $tmp .= "<div class=\"modal-header\">";
                            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"infoUserLabel\"><i class=\"bi bi-tags\"></i> Thông tin danh mục <b>".$item->getCategory_name()."</b></h1>";
                            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                        $tmp .= "</div>";
                        $tmp .= "<div class=\"modal-body\">";
                  
                            $tmp .= "<div class=\"row mb-3\">";
                    
                                $tmp .= "<div class=\"col-lg-6\">";
                                $tmp .= "<label for=\"user-name\" class=\"form-label\">ID</label>";
                                $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-name".$item->getCategory_id()."\" name=\"txtCateName\" value=\"".$item->getCategory_id()."\" readonly>";	
                                $tmp .= "</div>";
                                
                                $tmp .= "<div class=\"col-lg-6\">";
                                $tmp .= "<label for=\"user-name\" class=\"form-label\">Tên danh mục</label>";
                                $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-name".$item->getCategory_id()."\" name=\"txtCateName\" value=\"".$item->getCategory_name()."\" readonly>";	
                                $tmp .= "</div>";
                    
                            $tmp .= "</div>";
                    
                            $tmp .= "<div class=\"row mb-3\">";
                            
                                $tmp .= "<div class=\"col-lg-6\">";
                                    $tmp .= "<label for=\"full-name\" class=\"form-label\">Người tạo</label>";
                                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"full-name\" name=\"txtFullName\" value=\"".$manager->get($item->getCategory_manager_id())."\" readonly>";
                                $tmp .= "</div>";
                                $tmp .= "<div class=\"col-lg-6\">";
                                    $tmp .= "<label for=\"user-permission\" class=\"form-label\">Ngày cập nhật</label>";
                                    $tmp .= "<input type=\"text\" class=\"form-control\" id=\"user-permis\" required name=\"txtPermis\" value=\"".$item->getCategory_last_modified()."\" disabled readonly>";
                                $tmp .= "</div>";
                            $tmp .= "</div>";

                         $tmp .= "</div>";//modal-body
                        $tmp .= "<div class=\"modal-footer\">";
                            if($item->isCategory_delete()) {
                                $tmp .= "<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#resCate".$item->getCategory_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</button>";
                                $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                            }else {
                                $tmp .= "<button class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#editCate".$item->getCategory_id()."\"><i class=\"bi bi-gear\"></i> Chỉnh sửa</button>";
                                $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                            }
                        $tmp .= "</div>";//modal-footer
                    $tmp .= "</div>";//modal-content
                $tmp .= "</div>";//modal-dialog
            $tmp .= "</div>";//modal fade
            return $tmp;
            
        }
        // public function viewEditCategory(CategoryObject $item) {
        //     $tmp = "";
        //     $um = new UserModel();
        //     $manager = $um->getManagers();
        //     $tmp .= "<!-- Modal -->";
        //     $tmp .= "<div class=\"modal fade\" id=\"editCate".$item->getCategory_id()."\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"editUserLabel\" aria-hidden=\"true\">";
        //         $tmp .= "<div class=\"modal-dialog modal-lg\">";
        //             $tmp .= "<form method=\"post\" action=\"\" class=\"needs-validation\" novalidate>";
        //                 $tmp .= "<div class=\"modal-content\">";
        //                     $tmp .= "<div class=\"modal-header\">";
        //                         $tmp .= "<h1 class=\"modal-title fs-5\" id=\"editUserLabel\"><i class=\"bi bi-person-gear\"></i> Chỉnh sửa thông tin danh mục <b>".$item->getCategory_name()."</b></h1>";
        //                         $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
        //                     $tmp .= "</div>";

        //                     $tmp .="<div class=\"modal-body\">";
        //                         $tmp .="<div class=\"row mb-3\">";
        //                             $tmp .="<div class=\"col-lg-6\">";
        //                                 $tmp .="<label for=\"user-name\" class=\"form-label\">Tên danh mục</label>";
        //                                 $tmp .="<input type=\"text\" class=\"form-control\" id=\"user-name\" name=\"txtCateName1\" required>";
        //                                 $tmp .="<div class=\"invalid-feedback\">";
        //                                    $tmp .="Hãy nhập vào tên danh mục";
        //                                 $tmp .="</div>";
        //                             $tmp .="</div>";
        //                             $tmp .="<div class=\"col-lg-6\">";
        //                                 $tmp .="<label for=\"user-manager\" class=\"form-label\">Người quản lý</label>";
        //                                 $tmp .="<select class=\"form-select\" required id=\"user-manager\" name=\"slcManager1\">";
        //                                     $tmp .="<option value=\"\" selected>--- Chọn ---</option>";
        //                                     // $manager->forEachAppend(function($key, $value,$tmp){
        //                                     //     $tmp .= "<option value=\" ";
        //                                     //     $tmp .= $key;
        //                                     //     $tmp .= "\">";
        //                                     //     $tmp .= $value;
        //                                     //     $tmp .= "</option>";
        //                                     // });
        //                                 $tmp .="</select>";
        //                                 $tmp .="<div class=\"invalid-feedback\">";
        //                                     $tmp .="Hãy lựa chọn người quản lý";
        //                                 $tmp .="</div>";
        //                             $tmp .="</div>";
        //                         $tmp .="</div>";
        //                         $tmp .="<div class=\"row mb-3\">";
        //                             $tmp .="<div class=\"col-lg-12\">";
        //                                 $tmp .="<label for=\"full-name\" class=\"form-label\">Ghi chú</label>";
        //                                 $tmp .="<input typeeditCate=\"text\" class=\"form-control\" row =\"3\" id=\"full-name\" name=\"txtCateNote1\">";
        //                                 $tmp .="<div class=\"invalid-feedback\">";
        //                                     $tmp .="Hãy nhập vào ghi chú của danh mục";
        //                                 $tmp .="</div>";
        //                             $tmp .="</div>";
        //                         $tmp .="</div>";
        //                         //==========================================
        //                         $tmp .= "<input type=\"hidden\" name =\"idForPost\" value=\"".$item->getCategory_id()."\"  id=\"\">";
        //                         $tmp .= "<input type=\"hidden\" name =\"act\" value=\"edit\">";
                                
        //                     $tmp .= "</div>";
        //                     $tmp .= "<div class=\"modal-footer\">";
        //                         $tmp .= "<button type=\"submit\" name=\"editCate\" class=\"btn btn-primary\"><i class=\"bi bi-check2\"></i> Hoàn tất</button>";
        //                         $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
        //                     $tmp .= "</div>";
        //                 $tmp .= "</div>";
        //             $tmp .= "</form>";
        //         $tmp .= "</div>";
        //     $tmp .= "</div>";
            
        //     return $tmp;
        // }
        public function viewEditCategory(CategoryObject $item) {

            $um = new UserModel();
            $manager = $um->getManagers();
            echo "<!-- Modal -->";
            echo "<div class=\"modal fade\" id=\"editCate".$item->getCategory_id()."\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"editUserLabel\" aria-hidden=\"true\">";
                echo "<div class=\"modal-dialog modal-lg\">";
                    echo "<form method=\"post\" action=\"CategoryAE.php\" class=\"needs-validation\" novalidate>";
                        echo "<div class=\"modal-content\">";
                            echo "<div class=\"modal-header\">";
                                echo "<h1 class=\"modal-title fs-5\" id=\"editUserLabel\"><i class=\"bi bi-person-gear\"></i> Chỉnh sửa thông tin danh mục <b>".$item->getCategory_name()."</b></h1>";
                                echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                            echo "</div>";

                            echo "<div class=\"modal-body\">";
                                echo "<div class=\"row mb-3\">";
                                    echo "<div class=\"col-lg-6\">";
                                        echo "<label for=\"user-name\" class=\"form-label\">Tên danh mục</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"user-name\" name=\"txtCateName2\" value=\"".$item->getCategory_name()."\" required>";
                                        echo "<div class=\"invalid-feedback\">";
                                           echo "Hãy nhập vào tên danh mục";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class=\"col-lg-6\">";
                                        echo "<label for=\"user-manager\" class=\"form-label\">Người quản lý</label>";
                                        echo "<select class=\"form-select\" required id=\"user-manager\" name=\"slcManager2\">";
                                        //echo "<option value=\"".$item->getCategory_manager_id()."\" selected>".$manager->get($item->getCategory_manager_id())."</option>";
                                        echo "<option value=\"\" selected>--- Chọn ---</option>";    
                                            $manager->forEach(function($key, $value){
                                                // if($key == $item->getCategory_manager_id){
                                                //     echo "<option value=\"\" selected>--- Chọn ---</option>";
                                                // }
                                                echo "<option value=\" ";
                                                echo $key;
                                                echo "\">";
                                                echo $value;
                                                echo "</option>";
                                            });
                                        echo "</select>";
                                        echo "<div class=\"invalid-feedback\">";
                                            echo "Hãy lựa chọn người quản lý";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class=\"row mb-3\">";
                                    echo "<div class=\"col-lg-12\">";
                                        echo "<label for=\"full-name\" class=\"form-label\" >Ghi chú</label>";
                                        //echo "<input type=\"text\" class=\"form-control\" rows=\"3\" id=\"full-name\" name=\"txtCateNote1\">";
                                        echo "<textarea class=\"form-control\" name=\"txtCateNote2\" rows=\"3\" >".$item->getCategory_notes()."</textarea>";
                                        echo "<div class=\"invalid-feedback\">";
                                            echo "Hãy nhập vào ghi chú của danh mục";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                //==========================================
                                echo "<input type=\"hidden\" name =\"idForPost\" value=\"".$item->getCategory_id()."\"  id=\"\">";
                                echo "<input type=\"hidden\" name =\"act\" value=\"edit\">";
                                
                            echo "</div>";
                            echo "<div class=\"modal-footer\">";
                                echo "<button type=\"submit\" name=\"editCate\" class=\"btn btn-primary\"><i class=\"bi bi-check2\"></i> Hoàn tất</button>";
                                echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            
            //return $tmp;
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
    
?>
