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
        select{
            border-radius: 5px;
            height: 30px;
            width: 150px;
            font-size: 14px;
        }
        option{
            font-size: 12px;
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
            <h1>Thêm mới sản phẩm</h1>
            <?php
                if(isset($_SESSION['create'])){
                    echo "<div class='alert alert-success'>" . $_SESSION['create'] ."</div>";
                    unset($_SESSION['create']);
                }
            ?>
            <form action="?act=postCreateSanPham" method="POST" enctype="multipart/form-data">
                <label for="">Mã danh mục</label>
                <select name="ma_danhmuc" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listDanhmuc as $Danhmuc){
                    ?>
                    <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <label for="">Hãng sản xuất</label>
                <select name="danhmuc_con" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listDMC as $DMC){
                    ?>
                    <option value="<?= $DMC['id_danhmuc_con'] ?>"><?= $DMC['ten_danhmuc_con'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <a href="?act=listSanpham" style="margin-left: 530px;"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenSanpham">
                </div>
                <div class="mb-0">
                    <div class="mb-3 form_be3">
                        <label for="exampleInputEmail1" class="form-label">Ngày nhập hàng</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ngaynhap">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nhập thông tin sản phẩm</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="thongtin" id="thongtin"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hãng sản xuất</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hangsanxuat">
                </div>
                <input type="submit" value="Thêm mới" name="create" style="width: 150px; height: 40px; border: 0; border-radius: 10px; margin-bottom: 50px; background-color: #00CCFF; color: #fff;">
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