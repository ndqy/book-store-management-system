
<?php
    require_once( "../../../lib/HashMap.php");
    require_once( "../../../php/ads/Category/CategoryModel.php");
    require_once( "../../../php/ads/User/UserModel.php");
    require_once( "../../../php/ads/Log/LogLibrary.php");
    use HashMap\HashMap;

    /*$book = new BookObject();
    $book->setBook_deleted(false);
    $bm = new BookModel();
    print_r($bm->getBooks($book,1,10));*/
    /*
    $tmp = "AAA";
    $map = new HashMap("Int", "String");
    $map->put(1,"Mot");
    $map->put(2,"Hai");
    $map->put(3,"Ba");
    $map->put(4,"Bon");

    $map->forEach(function($key, $value){
        $tmpp = $key."-".$value."<br>";
    });
    $tmp .=$tmpp;
    echo $tmp;*/
    /*
    $user = new UserObject();
    $user->setUser_deleted(false);
    $um = new UserModel();
    $tmp = new HashMap("int", "String");
    $tmp = $um->getManagers($user);
    $tmp->forEach(function($key, $value){
        echo $key."-".$value."<br>";
    });
    echo "__________________________";
    $tmp->forEach(function($key, $value){
        if($key==1){
            echo "AAAAAAAAAAAAAA";
        }
    });*/
    /*echo date('Y-m-d');
    /*$cm = new CategoryModel();
    $cates = $cm->getCategoryBook2(); // Tên danh mục
    $catekey = $cates->keySet();
    $bl = new BookLibrary();
    $items = $bl->countCate(); //số lượng
    $keys = $items->keySet();
    $i=0;
    foreach($catekey as $cate){
        foreach($keys as $key){
            if($cate == $key){
                echo "{";
                    echo "value: ".$items->get($key).",";
                    echo "name: '".$cates->get($key)."'";
                    echo "}";
                    $i++;
                    if($i<count($keys)){
                        echo ", ";
                    }
            }
            
        }
    }*/
    
?><!--
<!DOCTYPE html>
<html>
<body>
   <!-- <div class="row mb-3">
        <label for="PDetail" class="col-lg-2 offset-lg-1 col-form-label d-flex align-items-center">Thông tin chi tiết</label>
        <div class="col-lg-8">
            <div id="PDetil"></div>
        </div>
    </div>
    <h2>Thêm tóm tắt cho cuốn sách</h2>
    <script src="../../../lib/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#PDetil' ), {
                
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="PreviewImg()">
  <input type="submit" value="Upload Image" name="submit">
  <div id="swiper-slide"><img class="img-fluid"  onchange="PreviewImg()" id="changeImg" src="../../../lib\imgs\student.jpg" ></div>
</form>
<script type="text/javascript">
    function PreviewImg(){
        var fileSelect = document.getElementById("fileToUpload").files;
        if(fileSelect.length>0){
          
            var fileToLoad = fileSelect[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent){
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("swiper-slide").innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
            // echo "// Lấy thẻ <img> bằng id";
          var img = document.getElementById('changeImg'); 
                //echo "// Ẩn thẻ <img>";
                img.style.display = 'none'; 
        }
    }
    </script>
<!--
<script type="text/javascript">
    function PreviewImg(){
        var fileSelect = document.getElementById("fileToUpload").files;
        if(fileSelect.length>0){
            var fileToLoad = fileSelect[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent){
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("perviewImg").innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
      </script>-->
    
<?php 

    // $target_dir = "../../../lib/imgs/";
    // $target_file = $target_dir.$_FILES["fileToUpload"]["name"];
    // //echo  $target_dir."That bai".$target_file;
    // $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // if($file_extension =='jpg' || $file_extension =='png' || $file_extension =='jpeg' ){
    //    // move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //         echo "<img src=\" ".$target_file."\" class=\"img-fluid\"    >";
    //         echo "Thanh cong";
    //     }else{
    //         echo "That bai";
    //     }
    // }else{
    //     echo "AAAAAAAAAAAAAAAAAAAAAAAAAAA";
    // }
    /*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<img src=\" ".$target_file."\" class=\"img-fluid\"    >";
        echo "Thanh cong";
    }else{
        echo "That bai";
    }*/

?>

</body>
</html>
