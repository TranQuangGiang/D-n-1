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
                <h1>Thêm mới dung lượng</h1>
                <a style="margin-top: 20px; margin-left: 640px;" href="?act=listdungluong"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a>
            </div>
            <article>
                <?php
                    if(isset($_SESSION['themmoi'])){
                        echo "<div class='alert alert-success'>" . $_SESSION['themmoi'] ."</div>";
                        unset($_SESSION['themmoi']);
                    }
                ?>
                <form action="?act=postcreateDungluong" method="POST" enctype="multipart/form-data">
                    <label for="">Sản phẩm</label>
                    <select name="ma_sanpham" style="width: 200px; height: 35px; border-radius: 10px;">
                        <option value="0" selected>Chọn sản phẩm</option>
                        <?php foreach($listSP as $sanpham) { ?>
                            <option value="<?= $sanpham['ma_sp'] ?>"><?= $sanpham['ten_sp'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="mb-3" style="margin-top: 20px;">
                        <label for="exampleInputEmail1" class="form-label">Nhập tên dung lượng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tendungluong">
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