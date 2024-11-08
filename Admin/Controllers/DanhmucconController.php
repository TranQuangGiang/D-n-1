<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Model/danhmuc.php";
    class DanhmucconConstrollers{
        public $danhmuccon;
        public $DanhmucModel;
        public function __construct(){
            $this->danhmuccon = new Subcategory();
            $this -> DanhmucModel = new Danhmuc();
        }
        public function listDanhmucCon($page) {
            $keyword = $_POST['keyword'] ?? '';
            $ma_danhmuc_me = $_POST['ma_danhmuc_me'] ?? 0;
        
            $limit = 9;
            $start = ($page - 1) * $limit;
        
            // Fetch the data and pagination info
            $result = $this->danhmuccon->listDanhmucCon($keyword, $ma_danhmuc_me, $limit, $start);
            $listDanhmuccon = $result['data'];
            $totalPages = $result['totalPages'];
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
        
            require_once "./Views/danhmucCon/listDanhmucCon.php";
        }
        
        public function listDMC(){ // để thêm hãng sản xuất
            $listDMC = $this->danhmuccon->listDMC();
        }
        public function deleteDanhmucCon(){
            $iddm_con = $_GET['id'];
            $this->danhmuccon->deteleDanhmucCon($iddm_con);
            header("location:".BASE_URL_ADMIN."?act=listDanhmuccon");
        }
        public function createDanhmucCon(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/danhmucCon/createDanhmucCon.php";
        }
        public function postcreateDanhmucCon(){
            if(isset($_POST['Themmoi']) && ($_POST['Themmoi'])){
                $ten_danhmuc_con = $_POST['tenDanhmucCon'];
                $ma_danhmuc_me = $_POST['ma_danhmuc_me'];

                $image = "./Uploads".$_FILES['anhDanhmucCon']['name'];
                if(move_uploaded_file($_FILES['anhDanhmucCon']['tmp_name'],$image))
                $anhDanhmucCon = $image;

                $this->danhmuccon->createDanhmucCon($ten_danhmuc_con,$anhDanhmucCon,$ma_danhmuc_me);
                header("location:".BASE_URL_ADMIN."?act=listDanhmuccon");
            }
        }
        public function updateDanhmucCon(){
            $iddm_con = $_GET['id'];
            $danhmucCon = $this->danhmuccon->find($iddm_con);
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once "./Views/danhmucCon/updateDanhmucCon.php";
        }
        public function postupdateDanhmuccon(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $iddm_con = $_GET['id'];
                $danhmucCon = $this->danhmuccon->find($iddm_con);
                $anhDanhmucCon = $danhmucCon['anh_danhmuc_con'];
                $image = "./Uploads/".basename($_FILES['anhDanhmucCon']['name']);
                if(move_uploaded_file($_FILES['anhDanhmucCon']['tmp_name'],$image)){
                    $anhDanhmucCon = $image;
                }
                $tenDanhmucCon = $_POST['danhmucCon'];
                $ma_danhmuc_me = $_POST['ma_danhmuc_me'];
                $this->danhmuccon->updateDanhmuccon($iddm_con,$tenDanhmucCon,$anhDanhmucCon,$ma_danhmuc_me);
                header ("location:".BASE_URL_ADMIN."?act=listDanhmuccon");
            }
        }
    }
?>