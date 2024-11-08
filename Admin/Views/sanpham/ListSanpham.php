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
        .thongtin{
            text-align: justify;
            width: 250px;
            font-size: 12px;
        }
        table{
            margin-top: 20px;
        }
        table th{
            text-align: center;
        }
        table td{
            text-align: center;
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
    </style>
</head>
<body>
    <section class="Sanpham">
        <?php require_once "../Admin/header.php"; ?>
        <section class="contenDanhmuc">
            <article>
                <div class="list">
                    <i class="fa-solid fa-list"></i>
                </div>
                <h1>Danh sách các sản phẩm</h1>
                <form action="?act=listSanpham" method="POST">
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm cần tìm" class="keyword" style="width: 300px; border-radius: 10px; height: 35px;">
                    <select name="ma_danhmuc" id="" style="width: 250px; height: 35px;border-radius: 10px;">
                        <option value="0" selected>Danh mục</option>
                        <?php 
                            foreach($listDanhmuc as $Danhmuc){
                        ?>
                        <option value="<?= $Danhmuc['ma_danhmuc'] ?>"><?= $Danhmuc['ten_danhmuc'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                    <select name="ma_danhmuc_con" id="" style="width: 250px; height: 35px;border-radius: 10px;">
                        <option value="0" selected>Hãng sản xuất</option>
                        <?php 
                            foreach($listDMC as $DMC){
                        ?>
                        <option value="<?= $DMC['id_danhmuc_con'] ?>"><?= $DMC['ten_danhmuc_con'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                    <input type="submit" name="go" value="Go" style="width: 60px; font-family: sans-serif; border-radius: 10px; height: 35px;">
                    <a href="?act=createSanpham" style="margin-left: 180px"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Thêm mới</button></a> 
                </form>
                <table class="table table-striped">
                    <tr>
                        <th>Check <input type="checkbox"></th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên/Ảnh Sản Phẩm</th>
                        <th>Giá Bán</th>
                        <th>Giá Gốc</th>
                        <th>Ngày nhập</th>
                        <th>Hãng Sản Xuất</th>
                        <th>Dung lượng</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                        foreach($ListSanpham as $Sanpham){
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?= $Sanpham['ma_sp'] ?></td>
                        <td><?= $Sanpham['ten_sp'] ?><img src="<?= $Sanpham['image'] ?>" alt="" width="50" height="50"></td>
                        <td><?= $Sanpham['giaban'] ?></td>
                        <td><?= $Sanpham['giagoc'] ?></td>
                        <td><?= $Sanpham['ngaynhap'] ?></td>
                        <td><?= $Sanpham['hang_sanxuat'] ?></td>
                        <td><?= $Sanpham['dungluong'] ?></td>
                        <td>
                            <a href="?act=eyeSanpham&id=<?= $Sanpham['ma_sp'] ?>"><i class="fa-solid fa-eye"></i></a>
                            <a href="?act=deleteSanpham&id=<?= $Sanpham['ma_sp'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i> </a> 
                            <a href="?act=updateSanpham&id=<?= $Sanpham['ma_sp'] ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                        </td>
                    </tr> 
                    <?php 
                    } 
                    ?>
                </table>
            </article>
        </section>
    </section>
</body>
</html>