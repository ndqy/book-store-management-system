
<?php
    session_start();
    require_once( "../../../php/ads/User/UserLibrary.php");
    require_once( "../../../php/ads/Log/LogModel.php");
    require_once("CategoryModel.php");
    //Thêm mới
    if(isset($_POST['addCate'])){
        $name = $_POST['txtCateName1'];
        $slcManager = $_POST['slcManager1'];
        $note = $_POST['txtCateNote1'];
        if( !empty($name) &&
            !empty($slcManager) 
            ){
            $cate = new CategoryObject();
            $cate->setCategory_name($name);
            $cate->setCategory_manager_id($slcManager);
            $cate->setCategory_notes($note);
            //$date = date('Y-m-d H:i:s');
            $date = date('Y-m-d');
            $cate->setCategory_created_author_id(3);
            $cate->setCategory_last_modified($date);
            $cate->setCategory_created_date($date);
            $cm = new CategoryModel();
            $bool = $cm->addCategory($cate);
            if($bool){

                $lm = new LogModel();
                $lo = new LogObject();
                $lo->setLog_name($cate->getCategory_name());
                $lo->setLog_user_name($_SESSION['name']);               
                $lo->setLog_date(date('Y-m-d H:i:s'));
                $lo->setLog_user_permission($_SESSION['permis']);
                $lo->setLog_action(1);
                $lo->setLog_position(2);
                $test = $lm->addLog($lo);
                if($test){
                    header('Location: BookList.php');
                }else{
                    header('Location: BookList.php?err=AddLog');
                }

            }else{
                header('Location: CategoryList.php?err=ADD');
            }
        }else{
            header('Location: CategoryList.php?err=NULL');
        }

    }
    //Chỉnh sửa thông tin danh mục
    if(isset($_POST['editCate'])){
        $act = $_POST['act'];
        $id = $_POST['idForPost'];
        if($id>0 &&  $act == 'edit'){   
            $name = $_POST['txtCateName2'];
            $slcManager = $_POST['slcManager2'];
            $note = $_POST['txtCateNote2']; 
            if( !empty($name) &&
            !empty($slcManager)
            ){       
                $cate = new CategoryObject();
                $cate->setCategory_id($id);
                $cate->setCategory_name($name);
                $cate->setCategory_manager_id($slcManager);
                $cate->setCategory_notes($note);
                //$date = date('Y-m-d H:i:s');
                $date = date('Y-m-d');
                $cate->setCategory_last_modified($date);
                $cm = new CategoryModel();
                $bool = $cm->editCategory($cate,"GENERAL");
                if($bool){
                   
                    $lm = new LogModel();
                    $lo = new LogObject();
                    $lo->setLog_name($cate->getCategory_name());
                    $lo->setLog_user_name($_SESSION['name']);               
                    $lo->setLog_date(date('Y-m-d H:i:s'));
                    $lo->setLog_user_permission($_SESSION['permis']);
                    $lo->setLog_action(2);
                    $lo->setLog_position(2);
                    $test = $lm->addLog($lo);
                    if($test){
                        header('Location: CategoryList.php');
                    }else{
                        header('Location: CategoryList.php?err=AddLog');
                    }
                    
                }else{
                    header('Location: CategoryList.php?err=EDIT');
                }
            }else{
                header('Location: CategoryList.php?err=NULL');
            }
        }else{
            header('Location: CategoryList.php?err=NOTOK');
        }    
    }
    

?>