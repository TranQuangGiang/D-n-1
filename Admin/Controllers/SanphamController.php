<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/danhmuccon.php";
    class SanphamControllers{
        public $SanphamModel;
        public $DanhmucModel;
        public $danhmuccon;
        public function __construct(){
            $this -> SanphamModel = new Sanpham();
            $this -> DanhmucModel = new Danhmuc();
            $this-> danhmuccon = new Subcategory();
        }
        public function listSanPham(){
            if(isset($_POST['go']) && ($_POST['go'])){
                $keyword = $_POST['keyword'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $ma_danhmuc_con = $_POST['ma_danhmuc_con'];
            }
            else{
                $keyword = '';
                $ma_danhmuc = 0;
                $ma_danhmuc_con = 0;
            }
            $listDMC = $this->danhmuccon->listDMC(); 
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            $ListSanpham = $this->SanphamModel->listSanpham($keyword,$ma_danhmuc,$ma_danhmuc_con);
            require_once "./Views/sanpham/ListSanpham.php";
        }
        public function list(){
            $listSP = $this->SanphamModel->list();
        }
        public function deleteSanPham(){
            $idsp = $_GET['id'];
            $this->SanphamModel->deleteSanpham($idsp);
            header ("location:".BASE_URL_ADMIN."?act=listSanpham");
        }
        public function createSanPham(){
            $listDMC = $this->danhmuccon->listDMC(); // thêm hãng sản xuất danh mục con
            $listDanhmuc = $this->DanhmucModel->listDanhmuc(); // danh mục mẹ
            require_once "./Views/sanpham/CreateSanpham.php";
        }
        public function postcreateSanpham(){
            if(isset($_POST['create']) && ($_POST['create'])){
                $image="./Uploads".$_FILES['anhSanpham']['name'];
                if(move_uploaded_file($_FILES['anhSanpham']['tmp_name'],$image))
                $anhSanpham = $image;
                
                $tensanpham = $_POST['tenSanpham'];
                $giaban = $_POST['giaban'];
                $giagoc = $_POST['giagoc'];
                $ngaynhap = $_POST['ngaynhap'];
                $thongtin = $_POST['thongtin'];
                $hangsx = $_POST['hangsanxuat'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $ma_danhmuc_con = $_POST['danhmuc_con'];
                $this->SanphamModel->createSanpham($tensanpham,$anhSanpham,$giaban,$giagoc,$ngaynhap,$thongtin,$hangsx,$ma_danhmuc,$ma_danhmuc_con);
                header ("location:".BASE_URL_ADMIN."?act=listSanpham");
            }
        }
        public function updateSanpham(){
            $idsp = $_GET['id'];
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            $Sanpham = $this->SanphamModel->find($idsp);
            require_once "./Views/sanpham/UpdateSanpham.php";
        }
        public function postupdateSanpham(){
            if(isset($_POST['update']) && ($_POST['update'])){
                $idsp = $_GET['id'];
                $Sanpham = $this->SanphamModel->find($idsp);
                $anhsp = $Sanpham['image'];
                $image = "./Uploads/".basename($_FILES['anhSanpham']['name']);
                if(move_uploaded_file($_FILES['anhSanpham']['tmp_name'],$image)){
                    $anhsp = $image;
                } 
                $tensanpham = $_POST['tenSanpham'];
                $giaban = $_POST['giaban'];
                $giagoc = $_POST['giagoc'];
                $ngaynhap = $_POST['ngaynhap'];
                $thongtin = $_POST['thongtin'];
                $mausac = $_POST['mausac'];
                $hangsx = $_POST['hangsanxuat'];
                $dungluong = $_POST['dungluong'];
                $ma_danhmuc = $_POST['ma_danhmuc'];
                $this->SanphamModel->updateSanpham($idsp,$tensanpham,$anhsp,$giaban,$giagoc,$ngaynhap,$thongtin,$mausac,$hangsx,$dungluong,$ma_danhmuc);
                header ("location:".BASE_URL_ADMIN."?act=listSanpham");
            }
        }
        public function eyeSanpham(){
            $idsp = $_GET['id'];
            $eyeSanpham = $this->SanphamModel->eye($idsp);
            require_once "./Views/sanpham/eyeSanpham.php";
        }
    }
?>