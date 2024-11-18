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
                <div class="conten" style="display: flex;">
                    <h1 style="margin-top: 10px;">Xem chi tiết sản phẩm</h1>
                    <a href="?act=listSanpham" style="margin-left: 650px; margin-top: 20px"><button type="button" class="btn btn-success"><i class="fa-solid fa-list"></i> Danh sách</button></a> 
                </div> 
                <table class="table table-striped">
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên/Ảnh Sản Phẩm</th>
                        <th>Ngày nhập</th>
                        <th>Thông tin chi tiết</th>
                        <th>Hãng Sản Xuất</th>
                        <th>Mã danh mục mẹ</th>
                        <th>Mã danh mục con</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                        foreach($eyeSanpham as $eye){
                            $id_danhmuc = $Sanpham['ma_danhmuc'];
                            $id_danhmuc_con = $Sanpham['ma_danhmuc_con'];
                            $ten_danhmuc = $this->DanhmucModel->getByNameDanhmuc($id_danhmuc);
                            $ten_danhmuc_con = $this->danhmuccon->getByNameDanhmucCon($id_danhmuc_con);
                    ?>
                    <tr>
                        <td><?= $eye['ma_sp'] ?></td>
                        <td><?= $eye['ten_sp'] ?></td>
                        <td><?= $eye['ngaynhap'] ?></td>
                        <td style="text-align: justify; width: 200px;"><?= $eye['mota_sanpham'] ?></td>
                        <td><?= $eye['hang_sanxuat'] ?></td>
                        <td><?= $ten_danhmuc['ten_danhmuc'] ?></td>
                        <td><?= $ten_danhmuc_con['ten_danhmuc_con'] ?></td>
                        <td>
                            <a href="?act=deleteSanpham&id=<?= $eye['ma_sp'] ?>"><i class="fa-solid fa-trash" style="color: red;"></i> </a> 
                            <a href="?act=updateSanpham&id=<?= $eye['ma_sp'] ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                        </td>
                    </tr> 
                    <?php 
                    } 
                    ?>
                </table>
            </article>
        </section>
    </section>
    </section>
</body>
</html>