<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .layout{
            width: 1500px;
            margin: 0px auto;
            background-color: #F2F4F7;
        }
        .Product_news{
            width: 100%;
            height: 700px;
            margin-top: 0px;
            overflow: hidden;
        }
        .Product_news h1{
            font-family: 'Inter';
            font-weight: 600;
            border-bottom: 5px solid #6633FA; 
            width: 200px;
            margin-top: 10px;
        }
        .product_one{
            min-width: 250px;
            height: 370px;
            position: relative;
            background-color: #fff;
            margin: 0px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.5s;
        }
        .product_one:hover .img_product img{
            transform: scale(1.05);
        }
        .img_product{
            overflow: hidden;
            margin-top: 5px;
            text-align: center;
        }
        .img_product img{
            transition: 0.5s;
            width: 200px;
            height: 190px;
            margin-top: 40px;
        }
        .title_product h3{
            font-weight: 600;
            font-family: 'Inter';
            font-size: 17px;
            margin-left: 20px;
            margin-bottom: 3px;
        }
        .Price p{
            color: red;
            font-family: 'Inter';
            font-size: 16px;
            font-weight: 400;
            margin-top: 0px;
            margin-left: 20px;
            margin-bottom: 10px;
        }
        .tragop button{
            width: 100px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid #6633FA;
            font-family: 'Inter';
            font-size: 14px;
            font-weight: 600;
            color: #6633FA;
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: #fff;
        }
        .box-product{
            width: 94%;
            margin: 0px auto;
            display: flex;
            overflow: hidden;
        }
        .box-product .left{
            position: absolute;
            top: 170px;
            left: 5px;
            font-size: 22px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            line-height: 48px;
            color: #B3B3B3;
        }
        .box-product .right{
            position: absolute;
            top: 170px;
            right: 0px;
            width: 48px;
            height: 48px;
            font-size: 22px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            line-height: 48px;
            color: #B3B3B3;
        }
        .Xemchitiet{
            margin-left: 20px;
            margin-top: 0px;
        }
        .Xemchitiet a{
            text-decoration: none;
            color: #0500FF;
            font-family: 'Inter';
            font-size: 15px;
            font-weight: 500;
        }
        .box-lon{
            width: 100%;
            position: relative;
        }
        .box-lon i{
            position: absolute;
        }
        .box-lon .left{
            top: 170px;
            left: 20px;
            font-size: 26px;
            color: #B3B3B3;
        }
        .box-lon .right{
            top: 170px;
            right: 20px;
            font-size: 26px;
            color: #B3B3B3;
        }
    </style>
</head>
<body>
    <section class="layout">
        <?php include("./Views/client/header.php"); ?>
        <div class="Product_news">
            <h1>Sản phẩm mới</h1>
            <div id="product_items" class="box-lon">
                <i class="fa-solid fa-chevron-left left"></i>
                <i class="fa-solid fa-chevron-right right"></i>
                <div class="box-product">
                    <?php 
                        $productList = $this->detailModel->listClient();
                        foreach($productList as $product){
                        // lấy tên sản phẩm
                        $id_sp = $product['id_sanpham'];
                        $ten_sp = $this->SanphamModel->getByNameProducts($id_sp);
                        // lấy dung lượng
                        $id_dungluong = $product['id_dungluong_sp'];
                        $ten_dungluong = $this->dungluongModel->getByNameDungluong($id_dungluong);
                        // lấy giá sản phẩm
                        $id_price = $product['id_price'];
                        $value_price = $this->priceModel->getByNamePrice($id_price);
                    ?>
                    <div class="product_one">
                        <div class="img_product">
                            <img src="<?= $product['image_url'] ?>" alt="">
                        </div>
                        <div class="title_product">
                            <h3><?= $ten_sp['ten_sp'] ?> <?= $ten_dungluong['ten_dungluong'] ?></h3>
                        </div>
                        <div class="Price">
                            <p><?= $value_price['price'] ?> đ</p> 
                        </div>
                        <div class="Xemchitiet">
                            <a href="">Xem chi tiết</a>
                        </div>
                        <div class="tragop">
                            <button>Trả góp 0%</button>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>