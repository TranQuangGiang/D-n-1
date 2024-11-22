<?php
    class Client{
        public $client;
        public function __construct(){
            $this->client = connect_db();
        }
        public function listsanphamDanhmuc($id_danhmuc_con){
            try{
                $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`ma_danhmuc_con` = {$id_danhmuc_con}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function ListProductDetail($id_sp){
            try{
                $sql = "SELECT * FROM `sanpham_chitiet` WHERE `sanpham_chitiet`.`id_sanpham` = {$id_sp}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetchAll();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function listDanhmucCon($id_danhmuc_con){
            try{
                $sql = "SELECT * FROM `danhmuc_con` WHERE `danhmuc_con`.`id_danhmuc_con` = {$id_danhmuc_con}";
                $stmt = $this->client->query($sql);
                $data = $stmt -> fetch();
                return $data;
            }
            catch (Exception $e){
                $e -> getMessage();
            }
        }
        public function __destruct(){
            $this->client = null;
        }
    }
?>