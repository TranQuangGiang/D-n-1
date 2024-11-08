<?php
    class Sanpham{
        public $sanpham;
        public function __construct(){
            $this->sanpham = connect_db();
        }
        public function listSanpham($keyword,$ma_danhmuc,$ma_danhmuc_con){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE 1";
                if($keyword != ""){
                    $sql.=" and ten_sp like '%".$keyword."%'";
                }
                if($ma_danhmuc > 0){
                    $sql.=" and ma_danhmuc ='".$ma_danhmuc."%'";
                }
                if($ma_danhmuc_con > 0){
                    $sql.=" and ma_danhmuc_con ='".$ma_danhmuc_con."%'";
                }
                $stmt = $this->sanpham->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function list(){
            try{
                $sql = "SELECT * FROM `sanpham`";
                $stmt = $this -> sanpham -> query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function deleteSanpham($idsp){
            try{
                $sql = "DELETE FROM sanpham WHERE `sanpham`.`ma_sp` = {$idsp}";
                $this->sanpham->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function createSanpham($tensanpham,$anhSanpham,$giaban,$giagoc,$ngaynhap,$thongtin,$mausac,$hangsx,$dungluong,$ma_danhmuc,$ma_danhmuc_con){
            try{
                $sql = "INSERT INTO `sanpham` (`ten_sp`, `image`, `giaban`, `giagoc`, `ngaynhap`, `thongtin`, `mausac`, `hang_sanxuat`, `dungluong`, `ma_danhmuc`, `ma_danhmuc_con`) VALUES ('$tensanpham', '$anhSanpham', '$giaban', '$giagoc', '$ngaynhap', '$thongtin', '$mausac', '$hangsx', '$dungluong ', '$ma_danhmuc', '$ma_danhmuc_con')";
                $this->sanpham->query($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function updateSanpham($idsp,$tensanpham,$anhsp,$giaban,$giagoc,$ngaynhap,$thongtin,$mausac,$hangsx,$dungluong,$ma_danhmuc){
            try{
                $sql = "UPDATE `sanpham` SET `ten_sp` = '$tensanpham', `image` = '$anhsp', `giaban` = '$giaban', `giagoc` = '$giagoc', `ngaynhap` = '$ngaynhap', `thongtin` = '$thongtin', `mausac` = '$mausac', `hang_sanxuat` = '$hangsx', `dungluong` = '$dungluong', `ma_danhmuc` = '$ma_danhmuc' WHERE `sanpham`.`ma_sp` = {$idsp}";
                $this->sanpham->exec($sql);
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function find($idsp){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_sp` = {$idsp}";
                $stmt = $this->sanpham->query($sql);
                $data = $stmt->fetch();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function eye($idsp){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_sp` = {$idsp}";
                $stmt = $this->sanpham->query($sql);
                $data = $stmt->fetchAll();
                return $data;
            }
            catch(Exception $e){
                $e -> getMessage();
            }
        }
        public function __destruct(){
            $this->sanpham = null;
        }
    }
?>