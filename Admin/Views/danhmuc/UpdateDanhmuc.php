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
        .Danhmuc{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .button{
            margin-top: 30px;
        }
        .conten{
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
</head>
<body>
    <section class="Danhmuc">
        <?php require_once "../Admin/header.php"; ?>
        <section class="conten">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1>Cập nhập danh mục</h1>
            <form action="?act=postupdateDanhmuc&id=<?= $Danhmuc['ma_danhmuc'] ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenDanhmuc" value="<?= isset($Danhmuc['ten_danhmuc']) ? $Danhmuc['ten_danhmuc'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh danh mục</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhDanhmuc">
                    <img src="<?= $Danhmuc['anh_danhmuc'] ?>" alt="" width="150" height="200">
                </div>
                <input type="submit" value="Sửa đổi" name="update" style="width: 120px; height: 30px; border-radius: 10px; border: 1px solid gray">
                <section class="button">
                    <button type="reset" class="btn btn-success">Nhập lại</button>
                    <a href="?act=listDanhmuc"><button type="button" class="btn btn-danger">Danh sách</button></a> 
                </section>
            </form>
        </section>
    </section>
</body>
</html>