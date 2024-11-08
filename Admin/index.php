<?php
    // require_once toàn bộ file commons
    require_once "../commons/env.php";
    require_once "../commons/function.php";
    // require_once toàn bộ controllers
    require_once "./Controllers/DanhmucController.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/AnhsanphamController.php";
    require_once "./Controllers/HomeController.php";
    // require_once toàn bộ file model
    require_once "./Model/danhmuc.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/danhmuccon.php";
    require_once "./Model/anhsanpham.php";
    // Rote
    $act = $_GET['act'] ?? '/';
    $page = (int)($_GET['page'] ?? 1); // Lấy số trang từ URL hoặc mặc định là 1
    match($act){
        // Trang chủ
        'homeAdmin' => (new HomeControllers())->homeAdmin(),
        // Dannhmuc
        'listDanhmuc' => (new DanhmucConstrollers())->listDanhmuc(),
        'deleteDanhmuc' => (new DanhmucConstrollers())->deleteDanhmuc(),
        'createDanhmuc' => (new DanhmucConstrollers())->createDanhmuc(),
        'postcreateDanhmuc' => (new DanhmucConstrollers())->postcreateDanhmuc(),
        'updateDanhmuc' => (new DanhmucConstrollers())->updateDanhmuc(),
        'postupdateDanhmuc' => (new DanhmucConstrollers())->postupdateDanhmuc(),
        // Sản Phẩm
        'listSanpham' => (new SanphamControllers())->listSanPham(),
        'listSanpham' => (new SanphamControllers())->list(),
        'deleteSanpham' => (new SanphamControllers())->deleteSanPham(),
        'createSanpham' => (new SanphamControllers())->createSanPham(),
        'postCreateSanPham' => (new SanphamControllers())->postcreateSanpham(),
        'updateSanpham' => (new SanphamControllers())->updateSanpham(),
        'postupdateSanpham' => (new SanphamControllers())->postupdateSanpham(),
        'eyeSanpham' => (new SanphamControllers())->eyeSanpham(),
        // Danhmuc con
        'listDanhmuccon' => (new DanhmucconConstrollers())->listDanhmucCon($page),
        'deleteDanhmuccon' => (new DanhmucconConstrollers())->deleteDanhmucCon(),
        'createDanhmuccon' => (new DanhmucconConstrollers())->createDanhmucCon(),
        'postcreateDanhmuccon' => (new DanhmucconConstrollers())-> postcreateDanhmucCon(),
        'updateDanhmuccon' => (new DanhmucconConstrollers()) -> updateDanhmucCon(),
        'postupdateDanhmuccon' => (new DanhmucconConstrollers()) -> postupdateDanhmuccon(),
        // anhsanpham
        'listAnhsanpham' => (new AnhSanphamControllers())->listAnhsanpham(),
        'deleteAnhsanpham' => (new AnhSanphamControllers())->deleteAnhsanpham(),
        'createAnhsanpham' => (new AnhSanphamControllers())->createAnhsanpham(),
        'postcreateAnhsanpham' => (new AnhSanphamControllers())->postcreateAnhsanpham(),
    };
    

