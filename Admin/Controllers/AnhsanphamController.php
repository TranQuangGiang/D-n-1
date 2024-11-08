<?php
    require_once "./Controllers/AnhsanphamController.php";
    require_once "./Model/anhsanpham.php";
    class AnhSanphamControllers{
        public $SanphamModel;
        public $anhModel;
        public function __construct(){
            $this -> SanphamModel = new Sanpham();
            $this -> anhModel = new Anhsanpham();
        }
        public function listAnhsanpham(){
            $listSP = $this->SanphamModel->list();
            $listAnh = $this->anhModel->listAnh();
            require_once "./Views/anhsanpham/listAnhsanpham.php";
        }
        public function deleteAnhsanpham(){
            $id_anh_sp = $_GET['id'];
            $this->anhModel->deleteAnhsanpham($id_anh_sp);
            header ("location: ".BASE_URL_ADMIN."?act=listAnhsanpham");
        }
    }
?>