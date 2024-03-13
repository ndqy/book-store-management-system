<?php

use HashMap\HashMap;

    require_once("../../../php/ads/Connection.php");
    require_once('../../objects/BookObject.php');
    require_once('BookModel.php');
    require_once( "../../../php/ads/User/UserLibrary.php");
    require_once( "../../../php/ads/Category/CategoryLibrary.php");
    require_once("../../../lib/HashMap.php");

    class BookLibrary{
        public function viewBooks($items, $total, $similar, $page, $totalperpage){
            
            echo "<div class=\"row gy-4 mb-4\">";
              foreach($items as $item){
                echo "<div class=\"col-xl-2 col-md-4 d-flex\" style=\"padding: 5px\" data-aos=\"fade-up\" data-aos-delay=\"100\">";
                $name = $item->getBook_name();
                if(strlen($name) > 52){
                    $tmp = substr($name,0,52);
                    $name = substr($name,0,strripos($tmp," "))." ...";
                }
                
                echo "<div class=\"member\">";
                     echo "<div class=\"ctnbook\">";
                        echo "<img src=\"".$item->getBook_image()."\" class=\"img-fluid\"  data-bs-toggle=\"modal\" data-bs-target=\"#viewBook".$item->getBook_id()."\" alt=\"".$item->getBook_name()."\">";
                        echo "<h4  data-bs-toggle=\"modal\" data-bs-target=\"#viewBook".$item->getBook_id()."\">".$name."</h4>";
                        echo "<span>".$item->getBook_author_name()."</span>";
                        echo "<p>".$item->getBook_price()." VND</p>";
                    echo "</div>";
                    echo "<div class=\"social\">";
                    if($item->getBook_deleted()){
                        //echo "<td class=\"item\"><button class=\"btn btn-sm\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#viewBook".$item->getBook_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                       // $this->viewInfoBook($item);
                        echo "<td class=\"item\"><button class=\"btn btn-sm btn-success\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#resBook".$item->getBook_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i></button></td>";

                        echo "<td class=\"item\"><button class=\"btn btn-sm btn-danger\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#delBook".$item->getBook_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";

                        
                    }else{
                        //echo "<td class=\"item\"><button class=\"btn btn-sm\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#viewBook".$item->getBook_id()."\"><i class=\"bi bi-eye\"></i></button></td>";
                        //$this->viewInfoBook($item);
                        echo "<td class=\"item\"><button class=\"btn btn-sm btn-warning\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#editBook".$item->getBook_id()."\"><i class=\"bi bi-pencil-square\"></i></button></td>";

                        echo "<td class=\"item\"><button class=\"btn btn-sm btn-danger\" id=\"btnnn\" data-bs-toggle=\"modal\" data-bs-target=\"#delBook".$item->getBook_id()."\"><i class=\"bi bi-trash3\"></i></button></td>";

                        
                    }
                    echo "</div>";
                    echo "</div><!-- member-->";
                    $this->viewInfoBook($item);
                    $this->viewEditBook($item);
                    $this->viewDelBook($item);
                    $this->viewResBook($item);
                echo "</div><!-- End 1 Book -->";
            }
            echo "</div>";
        }   
        
        public function addBook(BookObject $item){
            $um = new UserModel();
            $manager = $um->getManagers();
            $cm = new CategoryModel();
            $cate = $cm->getCategoryBook();
            echo "<div class=\"modal fade\" id=\"addBook\" tabindex=\"-1\">";
            echo "<div class=\"modal-dialog modal-xl modal-dialog-scrollable\">";
            echo "<form method=\"post\" action=\"BookAE.php\" class=\"needs-validation\" novalidate enctype=\"multipart/form-data\">";
                 echo "<div class=\"modal-content\">";
                echo "<div class=\"modal-header\">";
                echo "<h5 class=\"modal-title\"><i class=\"bi bi-journal-plus\"></i> Thêm sách mới</h5>";
                echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                echo "</div>";
                echo "<div class=\"modal-body\">";
                    
                echo "<!-- ======= Portfolio Details Section ======= -->";
                    echo "<section id=\"portfolio-details\" class=\"portfolio-details\">";
                    echo "<div class=\"container\">";

                        echo "<div class=\"row\">";

                        echo "<div class=\"col-lg-5\">";
                            echo "<div class=\"portfolio-info\">";
                                echo "<h3>Hình ảnh cuốn sách</h3>";
                                echo "<div class=\"portfolio-details-slider swiper\">";
                                echo "<div class=\"swiper-wrapper align-items-center\">";

                                    echo "<div class=\"swiper-slide\" id=\"swiper-slide\">";
                                    //echo "<img src=\"../../../lib/imgs/abc.jpg\" alt=\"Xin mời tải ảnh\">";
                                    echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=\"portfolio-info\">";
                            echo "<h3>Thông tin chi tiết</h3>";
                            echo "<ul>";
                                echo "<li><strong>Chọn ảnh</strong>: ";
                                echo "<input type=\"file\" class=\"form-control mt-2\" name=\"fileToUpload\" id=\"fileToUpload\" onchange=\"PreviewImg()\">";
                                echo "</li>";
                                echo "<li><strong>Tên sách</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtBookName1\" required>";
                                echo "</li>";
                                echo "<li><strong>Tác giả</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtAuthorName1\" required>";
                                echo "</li>";
                                echo "<li><strong>Dịch giả</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtTranslatorName1\" >";
                                echo "</li>";
                                echo "<li><strong>Nhà xuất bản</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPublisherName1\" >";
                                echo "</li>"; 
                                echo "<li><strong>Giá bán</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPrice1\" required>";
                                echo "</li>";
                                echo "<li><strong>Số trang</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPage1\" >";
                                echo "</li>";
                                echo "<li><strong>Kích thước</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtSize1\" >";
                                echo "</li>";
                                echo "<li><strong>Tổng số sách</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtTotal1\" >";
                                echo "</li>";
                                echo "<li><strong>Loại bìa</strong>: ";
                                echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcPaperback1\">";
                                echo "<option value=\"\" selected>--- Chọn ---</option>";
                                echo "<option value=\"0\">Bìa cứng</option>";
                                echo "<option value=\"1\">Bìa mềm</option>";
                                    echo "</select>";
                                echo "</li>";
                                echo "<li><strong>Thể loại</strong>: ";
                                echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcCategory1\">";
                                    echo "<option value=\"\" selected>--- Chọn ---</option>";
                                    $cate->forEach(function($key, $value){
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    });
                                    echo "</select>";

                                    echo "</li>";
                                    echo "<li><strong>Người quản lý</strong>: ";
                                    echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcManager1\">";
                                    echo "<option value=\"\" selected>--- Chọn ---</option>";
                                    $manager->forEach(function($key, $value){
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    });
                                    echo "</select>";

                                echo "</li>";
                            echo "</ul>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class=\"col-lg-7\">";

                        echo "<div class=\"portfolio-info\" height=\"auto\">";
                            echo "<h3>Mô tả sản phẩm</h3>";
                            echo "<textarea id=\"content\" name=\"content\" class=\"col-lg-7\" height=\"auto\"></textarea>";
                            echo "</div>";
                        echo "</div>";

                        echo "</div>";

                    echo "</div>";
                    echo "</section><!-- End Portfolio Details Section -->";
                        echo "</div>";
                    echo "<div class=\"modal-footer\">";
                        echo "<button type=\"submit\" name =\"addBook\" class=\"btn btn-primary\"><i class=\"bi bi-journal-arrow-up\"></i> Thêm mới</button>";
                        echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                    echo "</div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        echo "</div><!-- End Modal Dialog Scrollable-->";
        
        echo "<script src=\"../../../lib/js/ckeditor.js\"></script>";
        echo "<script>";
            echo "ClassicEditor";
                echo ".create( document.querySelector( '#content' ), { ";
                    echo "ckfinder: { ";
                    echo " uploadUrl: 'fileupload.php' ";
                    echo "} ";
                echo "} )";
                /*echo ".then( editor => { ";
                echo "console.log( editor ); ";
                echo "} ); ";*/
                echo ".then( editor => {";
                    echo "window.editor = editor;";
                echo "} )";
                echo ".catch( err => {";
                    echo "console.error( err.stack );";
                echo "} );";
        echo "</script>";
        }
        public function viewInfoBook(BookObject $item){
            $um = new UserModel();
            $manager = $um->getManagers();
            $cm = new CategoryModel();
            $cate = $cm->getCategoryBook();
            echo "<div class=\"modal fade\" id=\"viewBook".$item->getBook_id()."\" tabindex=\"-1\">";
            echo "<div class=\"modal-dialog modal-xl modal-dialog-scrollable\">";
                 echo "<div class=\"modal-content\">";
                echo "<div class=\"modal-header\">";
                echo "<h5 class=\"modal-title\"><i class=\"bi bi-journal-richtext\"></i> Thông tin cuốn sách <b>".$item->getBook_name()."</b></h5>";
                echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                echo "</div>";
                echo "<div class=\"modal-body\">";
                    
                echo "<!-- ======= Portfolio Details Section ======= -->";
                    echo "<section id=\"portfolio-details\" class=\"portfolio-details\">";
                    echo "<div class=\"container\">";

                        echo "<div class=\"row\">";

                        echo "<div class=\"col-lg-5\">";
                            echo "<div class=\"portfolio-info\">";
                                echo "<h3>Hình ảnh cuốn sách</h3>";
                                echo "<div class=\"portfolio-details-slider swiper\">";
                                    echo "<div class=\"swiper-wrapper align-items-center\">";

                                        echo "<div class=\"swiper-slide\" id=\"swiper-slide\">";
                                         echo "<img src=\"".$item->getBook_image()."\" alt=\"".$item->getBook_name()."\">";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=\"portfolio-info\">";
                            echo "<h3>Thông tin chi tiết</h3>";
                            echo "<ul>";
                                echo "<li><strong>Tên sách</strong>: ".$item->getBook_name()."";
                                echo "</li>";
                                echo "<li><strong>Tác giả</strong>: ".$item->getBook_author_name()."";
                                echo "</li>";
                                echo "<li><strong>Dịch giả</strong>: ".$item->getBook_translator()."";
                                echo "</li>";
                                echo "<li><strong>Nhà xuất bản</strong>: ".$item->getBook_publisher()."";
                                echo "</li>"; 
                                echo "<li><strong>Giá bán</strong>: ".$item->getBook_price()." VND";
                                echo "</li>";
                                echo "<li><strong>Số trang</strong>: ".$item->getBook_page()."";
                                echo "</li>";
                                echo "<li><strong>Kích thước</strong>: ".$item->getBook_size()."";
                                echo "</li>";
                                echo "<li><strong>Tổng số sách</strong>: ".$item->getBook_total()."";
                                echo "</li>";
                                echo "<li><strong>Loại bìa</strong>: ".($item->getBook_name() ? "Bìa cứng" : "Bìa mềm")."";
                                echo "</li>";
                                echo "<li><strong>Thể loại</strong>: ".$cate->get($item->getBook_category_id())."";
                                echo "</li>";
                                echo "<li><strong>Người quản lý</strong>: ".$manager->get($item->getBook_manager_id())."";
                                echo "</li>";
                            echo "</ul>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class=\"col-lg-7\">";

                            echo "<div class=\"portfolio-info\" id=\"portfolio-info-img\" height=\"auto\">";
                            echo "<h3>Mô tả sản phẩm</h3>";
                            echo $item->getBook_notes();
                            echo "</div>";
                        echo "</div>";

                        echo "</div>";

                    echo "</div>";
                    echo "</section><!-- End Portfolio Details Section -->";
                        echo "</div>";
                    echo "<div class=\"modal-footer\">";
                    if($item->getBook_deleted()) {
                        echo "<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#resBook".$item->getBook_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</button>";
                        echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                    }else {
                        echo "<button type=\"button\" class=\"btn btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editBook".$item->getBook_id()."\"><i class=\"bi bi-journal-arrow-up\"></i> Cập nhật</button>";
                        echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Thoát</button>";
                   
                    }
                         echo "</div>";
            echo "</div>";
            echo "</div>";
        echo "</div><!-- End Modal Dialog Scrollable-->";
        
        }
        public function viewEditBook(BookObject $item){
            $um = new UserModel();
            $manager = $um->getManagers();
            $cm = new CategoryModel();
            $cate = $cm->getCategoryBook();
           
            echo "<div class=\"modal fade\" id=\"editBook".$item->getBook_id()."\" tabindex=\"-1\">";
            echo "<div class=\"modal-dialog modal-xl modal-dialog-scrollable\">";
            echo "<form method=\"post\" action=\"BookAE.php\" class=\"needs-validation\" novalidate enctype=\"multipart/form-data\">";
                 echo "<div class=\"modal-content\">";
                echo "<div class=\"modal-header\">";
                echo "<h5 class=\"modal-title\"><i class=\"bi bi-journal-bookmark-fill\"></i> Cập nhật thông tin cuốn sách <b>".$item->getBook_name()."</b></h5>";
                echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                echo "</div>";
                echo "<div class=\"modal-body\">";
                    
                echo "<!-- ======= Portfolio Details Section ======= -->";
                    echo "<section id=\"portfolio-details\" class=\"portfolio-details\">";
                    echo "<div class=\"container\">";

                        echo "<div class=\"row\">";

                        echo "<div class=\"col-lg-5\">";
                            echo "<div class=\"portfolio-info\">";
                                echo "<h3>Hình ảnh cuốn sách</h3>";
                                echo "<div class=\"portfolio-details-slider swiper\">";
                                echo "<div class=\"swiper-wrapper align-items-center\">";

                                    echo "<div class=\"swiper-slide\" id=\"swiper-slide".$item->getBook_id()."\">";
                                        echo "<img src=\"".$item->getBook_image()."\" id=\"changeImg".$item->getBook_id()."\" alt=\"".$item->getBook_name()."\" onchange=\"PreviewImg".$item->getBook_id()."()\" >";
                                    echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=\"portfolio-info\">";
                            echo "<h3>Thông tin chi tiết</h3>";
                            echo "<ul>";
                                echo "<li><strong>Chọn ảnh</strong>: ";
                                echo "<input type=\"file\" class=\"form-control mt-2\" name=\"fileToUpload2\" id=\"fileToUpload".$item->getBook_id()."\" onchange=\"PreviewImg".$item->getBook_id()."()\"> ";
                                echo "</li>";
                                echo "<li><strong>Tên sách</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtBookName2\" value=\"".$item->getBook_name()."\" required>";
                                echo "</li>";
                                echo "<li><strong>Tác giả</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtAuthorName2\" value=\"".$item->getBook_author_name()."\"  required>";
                                echo "</li>";
                                echo "<li><strong>Dịch giả</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtTranslatorName2\"  value=\"".$item->getBook_translator()."\"   >";
                                echo "</li>";
                                echo "<li><strong>Nhà xuất bản</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPublisherName2\"  value=\"".$item->getBook_publisher()."\"   >";
                                echo "</li>"; 
                                echo "<li><strong>Giá bán</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPrice2\"  value=\"".$item->getBook_price()."\"  required>";
                                echo "</li>";
                                echo "<li><strong>Số trang</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtPage2\"  value=\"".$item->getBook_page()."\"  >";
                                echo "</li>";
                                echo "<li><strong>Kích thước</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtSize2\"  value=\"".$item->getBook_size()."\"  >";
                                echo "</li>";
                                echo "<li><strong>Tổng số sách</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtTotal2\"  value=\"".$item->getBook_total()."\"  >";
                                echo "</li>";
                                echo "<li><strong>Loại bìa</strong>: ";
                                echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcPaperback2\">";
                                if($item->getBook_paperback()){
                                    echo "<option value=\"\" >--- Chọn ---</option>";
                                    echo "<option value=\"0\">Bìa mềm</option>";
                                    echo "<option value=\"1\" selected>Bìa cứng</option>";
                                }else{
                                    echo "<option value=\"\" >--- Chọn ---</option>";
                                    echo "<option value=\"0\" selected>Bìa mềm</option>";
                                    echo "<option value=\"1\" >Bìa cứng</option>";
                                }
                                    echo "</select>";
                                echo "</li>";
                                echo "<li><strong>Thể loại</strong>: ";
                                echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcCategory2\">";
                                    echo "<option value=\"\" selected>--- Chọn ---</option>";
                                    $cate->forEach(function($key, $value){
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    });
                                    echo "</select>";

                                    echo "</li>";
                                    echo "<li><strong>Người quản lý</strong>: ";
                                    echo "<select class=\"form-select mt-2\" required id=\"user-permission\" name=\"slcManager2\">";
                                    echo "<option value=\"\" selected>--- Chọn ---</option>";
                                    $manager->forEach(function($key, $value){
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    });
                                    echo "</select>";

                                echo "</li>";
                                echo "<li><strong>Ngày cập nhật</strong>: ";
                                echo "<input type=\"text\" class=\"form-control mt-2\" name=\"txtUpdate2\"  value=\"".$item->getBook_modified_date()."\"  >";
                                echo "</li>";
                            echo "</ul>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class=\"col-lg-7\">";
                            echo "<div class=\"portfolio-info\" height=\"auto\">";
                                echo "<h3>Mô tả sản phẩm</h3>";
                                echo "<textarea id=\"content".$item->getBook_id()."\" name=\"content\" class=\"col-lg-7\" height=\"auto\"></textarea>";
                            echo "</div>";
                        echo "</div>";
                        /*echo "<div class=\"portfolio-info\" height=\"auto\">";
                            echo "<h3>Mô tả sản phẩm</h3>";
                            echo "<textarea id=\"content\" name=\"content\" class=\"col-lg-7\" height=\"auto\"></textarea>";
                            
                            //echo "<textarea id=\"content\" name=\"content\" class=\"col-lg-7\" height=\"auto\">";
                            //echo $item->getBook_notes();
                            //echo "</textarea>";
                            echo "</div>";
                        echo "</div>";*/

                        echo "</div>";

                    echo "</div>";
                    echo "</section><!-- End Portfolio Details Section -->";
                        echo "</div>";
                    echo "<div class=\"modal-footer\">";
                    //=================================
                    echo "<input type=\"hidden\" name=\"idForPost\"  value=\"".$item->getBook_id()."\"  >";
                        echo "<button type=\"submit\" name =\"editBook\" class=\"btn btn-primary\"><i class=\"bi bi-journal-arrow-up\"></i> Hoàn tất</button>";
                        echo "<button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
                    echo "</div>";
            echo "</div>";
            
                                
            echo "</form>";
            echo "</div>";
        echo "</div><!-- End Modal Dialog Scrollable-->";
        ?>
        <script type="text/javascript">
    function PreviewImg<?php echo $item->getBook_id() ?>(){
        var fileSelect = document.getElementById("fileToUpload<?php echo $item->getBook_id() ?>").files;
        if(fileSelect.length>0){
          
            var fileToLoad = fileSelect[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent){
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("swiper-slide<?php echo $item->getBook_id() ?>").innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
            // echo "// Lấy thẻ <img> bằng id";
             var img = document.getElementById('changeImg<?php echo $item->getBook_id() ?>'); 
            //echo "// Ẩn thẻ <img>";
            img.style.display = 'none'; 
        }
    }
    </script>
    <?php
        
        echo "<script> ";
            echo "ClassicEditor ";
                echo ".create( document.querySelector( '#content".$item->getBook_id()."' ), { ";
                    echo "ckfinder: { ";
                    echo " uploadUrl: 'fileupload.php' ";
                    echo "} ";
                echo "} )";
                /*echo ".then( editor => { ";
                echo "console.log( editor ); ";
                echo "} ); ";*/
                echo ".then( editor => { ";
                    //echo "window.editor = editor; ";
                    echo "editor.setData('".$item->getBook_notes()."'); ";
                echo "} )";
                echo ".catch( err => {";
                    echo "console.error( err.stack );";
                echo "} );";
        echo "</script>";
        
        }


        public function viewResBook(BookObject $item) {
            // TODO Auto-generated method stub
            $tmp = "";
            
            $tmp .= "<div class=\"modal fade\" id=\"resBook".$item->getBook_id()."\" tabindex=\"-1\" aria-labelledby=\"ResUserLabel\".item.getUser_id().\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog modal-lg\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"ResUserLabel".$item->getBook_id()."\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục cuốn sách <b>".$item->getBook_name()."</b></h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            
            $tmp .= "<div class=\"row mb-3\">";
            $tmp .= "<div class=\"col-lg-12\">";
            $tmp .= "Bạn có chắc chắn muốn khôi phục cuốn sách <b>".$item->getBook_name()."</b>?<br>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
    
            $tmp .= "<a href=\"BookDR.php?idr=".$item->getBook_id()."&name=".$item->getBook_name()."\" class=\"btn btn-success\"><i class=\"bi bi-bootstrap-reboot\"></i> Khôi phục</a>";
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            echo $tmp;
        }
        public function viewDelBook(BookObject $item) {
            $tmp = "";
            $title = "";
            if($item->getBook_deleted()) {
                $title = "Xóa vĩnh viễn ";
            }else {
                $title = "Xóa cuốn sách ";
            }
            
            $tmp .= "<div class=\"modal fade\" id=\"delBook".$item->getBook_id()."\" tabindex=\"-1\" aria-hidden=\"true\">";
            $tmp .= "<div class=\"modal-dialog\">";
            $tmp .= "<div class=\"modal-content\">";
            $tmp .= "<div class=\"modal-header\">";
            $tmp .= "<h1 class=\"modal-title fs-5\" id=\"DelUserLabel".$item->getBook_id()."\"><i class=\"bi bi-trash3\"></i> ".$title."</h1>";
            $tmp .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-body\">";
            if($item->getBook_deleted()) {
                $tmp .= "Bạn có chắc chắn xóa vĩnh viễn cuốn sách <b>".$item->getBook_name()."</b>?<br>";
            }else {
                $tmp .= "Bạn có chắc chắn xóa cuốn sách <b>".$item->getBook_name()."</b>?<br>";
                $tmp .= "Hệ thống tạm thời lưu vào thùng rác, có thể phục hồi trong vòng 30 ngày.";
            }
            $tmp .= "</div>";
            $tmp .= "<div class=\"modal-footer\">";
            if($item->getBook_deleted()) {
                $tmp .= "<a href=\"BookDR.php?id=".$item->getBook_id()."&name=".$item->getBook_name()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa vĩnh viễn</a>";
            }else {
                $tmp .= "<a href=\"BookDR.php?iddel=".$item->getBook_id()."&name=".$item->getBook_name()."\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i> Xóa</a>";
            }
            $tmp .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\"><i class=\"bi bi-x-lg\"></i> Hủy</button>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            echo $tmp;
        }
        public function countCate(){
            $bm = new BookModel();
            $tmp = $bm->getBookCategory();
            $hmap = new HashMap("String", "Integer");
            foreach ($tmp as  $item) {
                //echo $item->getBook_name();
        	    $hmap->put($item->getBook_category_id()." ", $hmap->getOrDefault($item->getBook_category_id()." ", 0) + 1);
            }
            return $hmap;
        }
    }


?>