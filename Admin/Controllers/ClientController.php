<?php
    require_once "./Controllers/DanhmucController.php";
    require_once "./Model/danhmuc.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Model/SanphamDetail.php";
    require_once "./Controllers/SanphamController.php";
    require_once "./Model/sanpham.php";
    require_once "./Controllers/DungluongController.php";
    require_once "./Model/dungluong.php";
    require_once "./Controllers/PriceController.php";
    require_once "./Model/price.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Model/danhmuccon.php";
    class ClientController{
        public $DanhmucModel;
        public $detailModel;
        public $SanphamModel;
        public $dungluongModel;
        public $priceModel;
        public $danhmuccon;
        public function __construct(){
            $this -> DanhmucModel = new Danhmuc();
            $this-> detailModel = new productDetail();
            $this -> SanphamModel = new Sanpham();
            $this->dungluongModel = new Dungluong();
            $this->priceModel = new Price();
            $this->danhmuccon = new Subcategory();
        }
        public function homeClient(){
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require './Views/client/homeClient.php';
        }
        public function DanhmucNav(){
            $DanhmucNav = $this->danhmuccon->listNav($danhmuc_me);
            require_once './Views/client/homeClient.php';
        }
        public function listSanPhamClient() {
            $productList = $this->detailModel->listClient(); // Renamed for clarity
            require_once './Views/client/homeClient.php';
        }
    }
  
?>