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
    require_once "./Model/client.php";
    class ClientController{
        public $DanhmucModel;
        public $detailModel;
        public $SanphamModel;
        public $dungluongModel;
        public $priceModel;
        public $danhmuccon;
        public $clientModel;
        public function __construct(){
            $this -> DanhmucModel = new Danhmuc();
            $this-> detailModel = new productDetail();
            $this -> SanphamModel = new Sanpham();
            $this->dungluongModel = new Dungluong();
            $this->priceModel = new Price();
            $this->danhmuccon = new Subcategory();
            $this->clientModel = new Client();
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
        public function listsanphamDanhmuc(){
            $id_danhmuc_con = $_GET['id'];
            $listsanphamDanhmuc = $this->clientModel->listsanphamDanhmuc($id_danhmuc_con); 
            foreach($listsanphamDanhmuc as $product){
                $id_sp = $product['ma_sp'];
                $listProductDetail = $this->clientModel->ListProductDetail($id_sp);
                $id_danhmuc_con = $product['ma_danhmuc_con'];
                $ten_danhmuc_con = $this->danhmuccon->getByNameDanhmucCon($id_danhmuc_con);
            }    
            $listDanhmuc = $this->DanhmucModel->listDanhmuc();
            require_once './Views/client/sanphamDanhmuc.php';
        }
        
    }
  
?>