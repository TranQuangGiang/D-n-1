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
            margin: 0px;
            padding: 0px;
        }
        .Sanpham{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .formSanpham{
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
    </style>
    <script src="./ckeditor_4.22.1_full (1)\ckeditor/ckeditor.js"></script>
</head>
<body>
    <section class="Sanpham">
        <?php require_once "../Admin/header.php"; ?>
        <section class="formSanpham">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1 style="margin-bottom: 40px;">Update Sản Phẩm</h1>
            <?php
                if(isset($_SESSION['update'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['update'] ."</div>";
                    unset($_SESSION['update']);
                }
            ?>
            <form action="?act=postupdateSanpham&id=<?= $Sanpham['ma_sp'] ?>" method="POST" enctype="multipart/form-data">
                <label for="">Mã Danh mục</label>
                <select name="ma_danhmuc" id="" style="height: 30px; border-radius: 10px">
                    <?php 
                        foreach ($listDanhmuc as $Danhmuc){
                    ?>
                    <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <label for="">Mã Danh Con</label>
                <select name="ma_danhmuc_con" id="" style="height: 30px; border-radius: 10px">
                    <?php 
                        foreach ($listDMC as $DanhmucCon){
                    ?>
                    <option value="<?= $DanhmucCon['id_danhmuc_con'] ?>"><?= $DanhmucCon['ten_danhmuc_con'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <a href="?act=listSanpham" style="margin-left: 480px"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenSanpham" value="<?= isset($Sanpham['ten_sp']) ? $Sanpham['ten_sp'] : ''?>">
                </div>
                <div class="mb-0">
                        <label for="exampleInputEmail1" class="form-label">Ngày nhập hàng</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ngaynhap" value="<?= isset($Sanpham['ngaynhap']) ? $Sanpham['ngaynhap'] : ''?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nhập thông tin sản phẩm</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="thongtin"> <?= isset($Sanpham['mota_sanpham']) ? $Sanpham['mota_sanpham'] : ''?> </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hãng sản xuất</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hangsanxuat" value="<?= isset($Sanpham['hang_sanxuat']) ? $Sanpham['hang_sanxuat'] : ''?>">
                </div>
                <input type="submit" value="Sửa đổi" name="update" style="width: 120px; height: 35px; border-radius: 10px;">
                <section class="button" style="margin-top: 30px; margin-bottom: 30px">
                    <button type="reset" class="btn btn-secondary">Nhập lại</button>
                </section>
            </form>
            <script>
                CKEDITOR.replace('thongtin', {
                    removePlugins: 'exportpdf,cloudservices' // Vô hiệu hóa các plugin không cần thiết
                });
            </script>
        </section>
    </section>
</body>
</html>