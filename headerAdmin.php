<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin D & Q</title>
    <!-- css dashoard admin -->
    <link href="./css/styles.css" rel="stylesheet" />
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="./js/loginadmin.js"></script>
</head>

<body>
    <?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
    } else {
        echo "Bạn ko có quyền truy cập trang web này";
        die();
    }
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand" href="./adindex.php"><i class="fas fa-home"></i> &nbsp;D&Q Shop</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
        </button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <a style="color: #86cfda"> Xin chào </a>
            <b style="color: snow">
                <?php
                if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
                    echo $_COOKIE['usernameAD'];
                }
                ?>
            </b>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="#">Quản lý tài khoản</a>

                    <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item click_dangxuatadmin" style="cursor:pointer" class="">Đăng xuất</span>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> Trang chủ</div>
                        <a class="nav-link" href="./adindex.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-bolt"></i></div>
                            Trang chủ

                        </a>
                        <a class="nav-link" href="./baocaoexcel.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                            thống kê dữ liệu
                        </a>
                        <a class="nav-link" href="./baocaoexcel.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sitemap"></i></div>
                            báo cáo
                        </a>
                        <div class="sb-sidenav-menu-heading">Dữ liệu</div>
                        <?php
                        if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
                            include("./model/dbconfig.php");
                            include("./model/phanquyentableModel.php");
                            $acc = new PhanQuyenTableModel(0, 0, 0, 0, 0);
                            $result = $acc->search_phan_quyen_full_maad($conn, $_COOKIE['MaAD']);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['MaTable'] == 1 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed ad_sanpham" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        sản phẩm
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./sanphamadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 2 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        loại sản phẩm
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./loaisanphamadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 3 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed ad_danhmuc" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        danh mục
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./danhmucadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 4 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        đánh giá
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./danhgiaadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 5 && $row['TrangThai']) {
                                        echo '  <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        bài viết
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./baivietadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 6 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts6">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        khuyến mại
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./khuyenmaiadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 7 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts7" aria-expanded="false" aria-controls="collapseLayouts7">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        thuế
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts7" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 8 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts8">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        giao hàng
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 9 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts9">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        nhà cung cấp
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts9" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./nhacungcapadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 10 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts10" aria-expanded="false" aria-controls="collapseLayouts10">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        hình ảnh sản phẩm
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./haspadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 11 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts11" aria-expanded="false" aria-controls="collapseLayouts11">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        khách hàng
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts11" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./khachhangadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 12 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts12" aria-expanded="false" aria-controls="collapseLayouts12">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        hóa đơn nhập
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts12" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 13 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts13" aria-expanded="false" aria-controls="collapseLayouts13">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        chi tiết hóa đơn nhập
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts13" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 14 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts14" aria-expanded="false" aria-controls="collapseLayouts14">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        hóa đơn bán
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts14" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 15 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts15" aria-expanded="false" aria-controls="collapseLayouts15">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        chi tiết hóa đơn bán
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts15" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 16 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts16" aria-expanded="false" aria-controls="collapseLayouts16">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        tài khoản admin
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts16" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./accountadmin.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 17 && $row['TrangThai']) {
                                        echo ' <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts17" aria-expanded="false" aria-controls="collapseLayouts17">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        nhân viên
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts17" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                    if ($row['MaTable'] == 18 && $row['TrangThai']) {
                                        echo '<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts18" aria-expanded="false" aria-controls="collapseLayouts18">
                                        <div class="sb-nav-link-icon"><i class="far fa-edit"></i></div>
                                        tìm kiếm
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts18" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                                hiển thị
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                                thêm
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                                sửa
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                                                xóa
                                            </a>
                                        </nav>
                                    </div>';
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="sb-sidenav-menu-heading">Khác</div>
                        <a class="nav-link" href="lichsududoan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Lịch sử dự đoán
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Đã đăng nhập : </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid admin_content">