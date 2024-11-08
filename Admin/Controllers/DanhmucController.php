<?php
    class DanhmucConstrollers{
        public $DanhmucModel;
        public function __construct(){
            $this->DanhmucModel = new Danhmuc();
        }
        public function listDanhmuc(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/danhmuc/ListDanhmuc.php";
        }
        public function deletedanhmuc(){
            $id = $_GET['id']; 
            $this->DanhmucModel->deleteDanhmuc($id);
            header ("location:".BASE_URL_ADMIN."?act=listDanhmuc");
        }
        public function createDanhmuc(){
            require_once "./Views/danhmuc/CreateDanhmuc.php";
        }
        public function postcreateDanhmuc(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $tenDanhmuc = $_POST['tenDanhmuc'];

                $anhDanhmuc = "./Uploads".$_FILES['anhDanhmuc']['name'];
                if(move_uploaded_file($_FILES['anhDanhmuc']['tmp_name'],$anhDanhmuc))
                $image = $anhDanhmuc;
                $this->DanhmucModel->createDanhmuc($tenDanhmuc,$image);
                header ("location:".BASE_URL_ADMIN."?act=listDanhmuc");
            }
        }
        public function updateDanhmuc(){
            $iddm=$_GET['id'];
            $Danhmuc = $this->DanhmucModel->find($iddm);
            require_once "./Views/danhmuc/UpdateDanhmuc.php";
        }
        public function postupdateDanhmuc(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $iddm=$_GET['id'];
                $tenDanhmuc = $_POST['tenDanhmuc'];
                
                $Danhmuc = $this->DanhmucModel->find($iddm);
                $anhUpdate = $Danhmuc['anh_danhmuc'];
                $anhDanhmuc = "./Uploads/".basename($_FILES['anhDanhmuc']['name']);
                if(move_uploaded_file($_FILES['anhDanhmuc']['tmp_name'],$anhDanhmuc)){
                    $anhUpdate = $anhDanhmuc;
                }
                $this->DanhmucModel->updateDanhmuc($iddm,$tenDanhmuc,$anhUpdate);
                header ("location:".BASE_URL_ADMIN."?act=listDanhmuc");
            }
        }
    }

?>