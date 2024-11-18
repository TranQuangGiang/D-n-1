<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .Danhmuc{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .contenDanhmuc{
            width: 80%;
            margin-left: 10px;
        }
        .list{
            width: 100%;
            background-color: #fff;
            height: 80px;
        }
        .list i{
            margin-left: 10px;
            line-height: 80px;
            font-size: 22px;
        }
        a i{
            transition: 0.5s;
        }
        .a1 i:hover{
            color: #EE7C6B;
        }
    </style>
</head>
<body>
    <section class="Danhmuc">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <div class="button" style="display: flex; margin-bottom: 30px;">
                <h1>Thêm mới sản phẩm biến thể</h1>
                <a style="margin-top: 20px; margin-left: 520px;" href="?act=listProductDetail"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a>
            </div>
            <article>
                <?php
                    if(isset($_SESSION['create'])){
                        echo "<div class='alert alert-success'>" . $_SESSION['create'] ."</div>";
                        unset($_SESSION['create']);
                    }
                ?>
                <form action="?act=postcreateDetail" method="POST" enctype="multipart/form-data">
                    <label for="">Sản phẩm</label>
                    <select name="id_sanpham" style="width: 200px; height: 35px; border-radius: 10px;">
                        <option value="0" selected>Chọn sản phẩm</option>
                        <?php foreach($listSP as $sanpham) { ?>
                            <option value="<?= $sanpham['ma_sp'] ?>"><?= $sanpham['ten_sp'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="">Giá Sản phẩm</label>
                    <select name="id_price" style="width: 200px; height: 35px; border-radius: 10px;">
                        <option value="0" selected>Chọn giá sản phẩm</option>
                        <?php foreach($listgia as $price) { ?>
                            <option value="<?= $price['id_price'] ?>"><?= $price['price'] ?></option>
                        <?php } ?>
                    </select> <br> <br>
                    <label for="">Chọn màu sản phẩm</label>
                    <select name="id_mau" style="width: 200px; height: 35px; border-radius: 10px;">
                        <option value="0" selected>Chọn màu sản phẩm</option>
                        <?php foreach($listMS as $mausac) { ?>
                            <option value="<?= $mausac['id_mau'] ?>"><?= $mausac['ten_mau'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="">Chọn dung lương sản phẩm</label>
                    <select name="id_dungluong" style="width: 200px; height: 35px; border-radius: 10px;">
                        <option value="0" selected>Chọn dung lượng sản phẩm</option>
                        <?php foreach($listDL as $dungluong) { ?>
                            <option value="<?= $dungluong['id_dungluong'] ?>"><?= $dungluong['ten_dungluong'] ?></option>
                        <?php } ?>
                    </select> <br><br>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Chọn ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image" style="height: 45px;">
                    </div>
                    <div class="mb-3" style="margin-top: 20px;">
                        <label for="exampleInputEmail1" class="form-label">Nhập số lượng hàng</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="quantyti">
                    </div>
                    <section class="button" style="margin-top: 20px; display: flex;">
                        <input type="submit" value="Thêm mới" name="Themmoi" style="width: 100px; height: 40px; border-radius: 5px; border: 0; background-color: #0dcaf0;">
                        <button type="reset" style="margin-left: 10px;" class="btn btn-secondary">Nhập lại</button>
                    </section>
                </form>
            </article>
        </section>
    </section>
</body>
</html>