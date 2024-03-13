
<?php
    session_start();
    require_once( "../../../php/ads/User/UserLibrary.php");
    require_once( "../../../php/ads/Log/LogModel.php");
    require_once("BookModel.php");
    require_once("BookLibrary.php");
    //Thêm mới
    if(isset($_POST['addBook'])){
        $bookname = $_POST['txtBookName1'];
        $imgname = $_FILES['fileToUpload']['name'];
        $author = $_POST['txtAuthorName1'];       
        $price = $_POST['txtPrice1'];
        $pageback = $_POST['slcPaperback1'];
        $category = $_POST['slcCategory1'];
        $slcManager = $_POST['slcManager1'];
        $note = $_POST['content'];
        $total = $_POST['txtTotal1'];
        /*echo 'BOOK NAME'.$bookname.'<br>';
        $file_path = '../../../lib/imgs/'.$imgname;
        echo 'IMG'.$file_path.'<br>';
        echo 'AUTHOR'.$author.'<br>';
        echo 'PRICE'.$price.'<br>';
        echo 'PAGEBACK'.$pageback.'<br>';
        echo 'CATEGORY'.$category.'<br>';
        echo 'SLCMANAGER'.$slcManager.'<br>';
        echo 'NOTE'.$note.'<br>';
        echo 'TOTAL'.$total.'<br>';*/
        if( !empty($bookname) &&
            !empty($author) &&
            !empty($price) &&
            !empty($total) &&
            $pageback!=-1 &&
            !empty($category) &&
            !empty($slcManager) 
            ){
            
            $file_path = '../../../lib/imgs/'.$imgname;
            $size = $_POST['txtSize1'];
            $page = $_POST['txtPage1'];
            $translator = $_POST['txtTranslatorName1'];
            $publisher = $_POST['txtPublisherName1'];
            
            //upload ảnh
            $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if($file_extension=='jpg' || $file_extension=='png' || $file_extension=='jpeg'|| $file_extension=='webp' ){
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path);
            }
            /*echo $file_path.'<br>';
            echo $size.'<br>';
            echo $page.'<br>';
            echo $translator.'<br>'.$publisher;*/
            $book = new BookObject();
            //$date = date('Y-m-d H:i:s');
            $date = date('Y-m-d');
            $book->setBook_author_name($author);
            //$book->setBook_best_seller();
            $book->setBook_category_id($category);
            $book->setBook_created_date($date);
            //$book->setBook_deleted();
            //$book->setBook_discount_price();
            //$book->setBook_id();
            $book->setBook_image($file_path);
            //$book->setBook_intro();//
            $book->setBook_manager_id($slcManager);
            $book->setBook_modified_date($date);
            $book->setBook_name($bookname);
            $book->setBook_notes($note);
            $book->setBook_page($page);
            $book->setBook_paperback($pageback);
            $book->setBook_price($price);
            //$book->setBook_promotion();
            $book->setBook_publisher($publisher);
            $book->setBook_size($size);
            //$book->setBook_sold();
            $book->setBook_total($total);
            $book->setBook_translator($translator);
            //$book->setBook_visited();


            $bm = new BookModel();
            $bool = $bm->addBook($book);
            if($bool){
                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($book->getBook_name());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(1);
                $lo->setLog_position(3);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: BookList.php');
                }else{
                    header('Location: BookList.php?err=AddLog');
                }
                
                
            }else{
                header('Location: BookList.php?err=ADD');
            }
        }else{
            header('Location: BookList.php?err=NULL');
        }

    }
    //Chỉnh sửa thông tin danh mục
    if(isset($_POST['editBook'])){
        $id = $_POST['idForPost'];
        if($id>1){   
            $bookname = $_POST['txtBookName2'];
            $imgname = $_FILES['fileToUpload2']['name'];
            $author = $_POST['txtAuthorName2'];       
            $price = $_POST['txtPrice2'];
            $pageback = $_POST['slcPaperback2'];
            $category = $_POST['slcCategory2'];
            $slcManager = $_POST['slcManager2'];
            $note = $_POST['content'];
            $total = $_POST['txtTotal2'];
            if( !empty($bookname) &&
            !empty($author) &&
            !empty($price) &&
            !empty($total) &&
            $pageback!=-1 &&
            !empty($category) &&
            !empty($slcManager) 
            ){
            
                $file_path = '../../../lib/imgs/'.$imgname;
                $size = $_POST['txtSize2'];
                $page = $_POST['txtPage2'];
                $translator = $_POST['txtTranslatorName2'];
                $publisher = $_POST['txtPublisherName2'];
                //upload ảnh
                $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                if($file_extension=='jpg' || $file_extension=='png' || $file_extension=='jpeg'|| $file_extension=='webp' ){
                    move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $file_path);
                }
                /*echo $file_path.'<br>';
                echo $size.'<br>';
                echo $page.'<br>';
                echo $translator.'<br>'.$publisher;*/
                $book = new BookObject();
                //$date = date('Y-m-d H:i:s');
                $date = date('Y-m-d');
                $book->setBook_id($id);
                $book->setBook_author_name($author);
                //$book->setBook_best_seller();
                $book->setBook_category_id($category);
                //$book->setBook_created_date($date);
                //$book->setBook_deleted();
                //$book->setBook_discount_price();
                //$book->setBook_id();
                $book->setBook_image($file_path);
                //$book->setBook_intro();//
                $book->setBook_manager_id($slcManager);
                $book->setBook_modified_date($date);
                $book->setBook_name($bookname);
                $book->setBook_notes($note);
                $book->setBook_page($page);
                $book->setBook_paperback($pageback);
                $book->setBook_price($price);
                //$book->setBook_promotion();
                $book->setBook_publisher($publisher);
                $book->setBook_size($size);
                //$book->setBook_sold();
                $book->setBook_total($total);
                $book->setBook_translator($translator);
                //$book->setBook_visited();


                $bm = new BookModel();
                $bool = $bm->editBook($book,"GENERAL");
                if($bool){
                    $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($book->getBook_name());
                    $lo->setLog_user_name($_SESSION['name']);
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(2);
                    $lo->setLog_position(3);
                    $test = $lm->addLog($lo);
                    if($test){
                    header('Location: BookList.php');
                    }else{
                        header('Location: BookList.php?err=AddLog');
                    }
                   
                    
                }else{
                    header('Location: BookList.php?err=EDIT');
                }
            }else{
                header('Location: BookList.php?err=NULL');
            }
        }else{
            header('Location: BookList.php?err=NOPERMIS');
        }
    }
    

?>