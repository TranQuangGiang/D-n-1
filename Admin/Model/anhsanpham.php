<?php
    class Anhsanpham{
        public $anhsanpham;
        public function __construct(){
            $this -> anhsanpham = connect_db();
        }
        public function listAnh(){
            try{
                $sql = "SELECT * FROM `anh_sanpham`";
                $stmt = $this -> anhsanpham -> query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function deleteAnhsanpham($id_anh_sp){
            try{
                $sql = "DELETE FROM anh_sanpham WHERE `anh_sanpham`.`id_anh_sp` = {$id_anh_sp}";
                $this->anhsanpham->exec($sql);
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
    }
?>