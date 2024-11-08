<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .layout{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        form{
            margin-top: 30px;
            margin-bottom: 30px;
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
    <section class="layout">
        <?php require_once "../Admin/header.php"; ?>
        <section class="conten" style="width: 80%; margin-left: 10px;">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1>Thêm mới ảnh chi tiết sản phẩm </h1>
            <form action="?act=postcreateAnhsanpham" method="POST" enctype="multipart/form-data">
                <label for="exampleInputPassword1" class="form-label">Chọn sản phẩm</label>
                <select name="ma_danhmuc_me" id="" style="border-radius: 10px; height: 35px; width: 200px;">
                   
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập tên danh mục con</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tenDanhmucCon">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chọn ảnh danh mục Con</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="anhDanhmucCon">
                </div>
                    <input type="submit" value="Thêm mới" name="Themmoi">
            </form>
            <section class="button" style="margin-top: 20px;">
                <button type="reset" class="btn btn-success">Nhập lại</button>
                <a href="?act=listDanhmuccon"><button type="button" class="btn btn-danger">Danh sách</button></a> 
            </section>
        </section>
    </section>
</body>
</html>