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
        .listAnhsanpham{
            width: 1500px;
            margin: 0px auto;
            display: flex;
            background-color: #eef3f7;
        }
        .contenAnhsanpham{
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
        .button_1{
            border-radius: 10px;
            border: 1px solid gray;
            background-color: #ffff;
            transition: 0.5s;
        }
        .button_1 a{
            text-decoration: none;
            color: black;
            transition: 0.5s;
        }
        .button_1:hover{
            background-color: #FF0066;
           
        }
        .button_1 a:hover{
            color: white;
        }
        .button_2{
            border-radius: 10px;
            border: 0;
            background-color: #2596be;
            transition: 0.5s;
        }
        .button_2 a{
            text-decoration: none;
            color: black;
            transition: 0.5s;
        }
        .button_2:hover{
            background-color: rgb(37, 150, 190);
           
        }
        .button_2 a:hover{
            color: white;
        }
    </style>
</head>
<body>
    <section class="listAnhsanpham">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenAnhsanpham">
            <div class="list">
                <i class="fa-solid fa-list"></i>
            </div>
            <h1>Danh sách ảnh sản phẩm</h1>
            <form action="?act=listAnhsanpham" style="margin-top: 10px;">
                <input type="text" name="key" placeholder="Bạn muốn tìm gì...." style="width: 250px; height: 35px; border-radius: 10px; border: 0.5px solid gray;">
                <select name="ma_sp" id="" style="width: 230px; height: 35px; border-radius: 10px;">
                    <option value="0">Tất cả</option>
                    <?php
                        foreach ($listSP as $list){
                    ?>
                    <option value="<?= $list['ma_sp'] ?>"><?= $list['ten_sp'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Go" style="border-radius: 10px; width: 40px; height: 35px;">
            </form>
            <article style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh 1</th>
                            <th>Ảnh 2</th>
                            <th>Ảnh 3</th>
                            <th>Ảnh 4</th>
                            <th>Ảnh 5</th>
                            <th>Mã sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                        foreach($listAnh as $anh){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $anh['id_anh_sp'] ?></td>
                            <td><img src="<?= $anh['anh1'] ?>" alt=""></td>
                            <td><img src="<?= $anh['anh2'] ?>" alt=""></td>
                            <td><img src="<?= $anh['anh3'] ?>" alt=""></td>
                            <td><img src="<?= $anh['anh4'] ?>" alt=""></td>
                            <td><img src="<?= $anh['anh5'] ?>" alt=""></td>
                            <td><?= $anh['ma_sp'] ?></td>
                            <td>
                                <button class="button_1"><a href="?act=deleteAnhsanpham&id=<?= $anh['id_anh_sp'] ?>">Xóa</a></button>
                                <button class="button_2"><a href="?act=updateAnhsanpham&id=<?= $anh['id_anh_sp'] ?>">Sửa</a></button>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </article>
            <section class="button" style="margin-bottom: 40px; margin-top: 20px;">
                <button type="button" class="btn btn-primary">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary">Xóa tất cả</button>
                <button type="reset" class="btn btn-success">Bỏ chọn tất cả</button>
                <a href="?act=createAnhsanpham"><button type="button" class="btn btn-danger">Thêm mới</button></a> 
            </section>
        </section>
    </section>
</body>
</html>