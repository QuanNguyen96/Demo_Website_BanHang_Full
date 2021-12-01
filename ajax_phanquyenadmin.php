<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save_account_phanquyen": {
                add_save_account_phanquyen();
                break;
            }
        case "edit_quyen_show": {
                edit_quyen_show();
                break;
            }
        case "update_save_account_phanquyen": {
                update_save_account_phanquyen();
                break;
            }
    }
}
function update_save_account_phanquyen()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/phanquyentableModel.php');
        $maad = $_POST['maad'];
        $quyen_sp = $_POST['quyen_sp'];
        $quyen_loaisanpham = $_POST['quyen_loaisanpham'];
        $quyen_danhmuc = $_POST['quyen_danhmuc'];
        $quyen_danhgia = $_POST['quyen_danhgia'];
        $quyen_baiviet = $_POST['quyen_baiviet'];
        $quyen_khuyenmai = $_POST['quyen_khuyenmai'];
        $quyen_thue = $_POST['quyen_thue'];
        $quyen_giaohang = $_POST['quyen_giaohang'];
        $quyen_nhacungcap = $_POST['quyen_nhacungcap'];
        $quyen_img_sanpham = $_POST['quyen_img_sanpham'];
        $quyen_khachhang = $_POST['quyen_khachhang'];
        $quyen_hoadonnhap = $_POST['quyen_hoadonnhap'];
        $quyen_ct_hoadonnhap = $_POST['quyen_ct_hoadonnhap'];
        $quyen_hoadonban = $_POST['quyen_hoadonban'];
        $quyen_ct_hoadonban = $_POST['quyen_ct_hoadonban'];
        $quyen_taikhoanadmin = $_POST['quyen_taikhoanadmin'];
        $quyen_nhanvien = $_POST['quyen_nhanvien'];
        $quyen_timkiem = $_POST['quyen_timkiem'];
        // add quyền bảng sản phẩm
        $acc1 = new PhanQuyenTableModel(0, 1, 0,  0, $quyen_sp);
        $acc1->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc2 = new PhanQuyenTableModel(0, 2, 0,  0, $quyen_loaisanpham);
        $acc2->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc3 = new PhanQuyenTableModel(0, 3, 0,  0, $quyen_danhmuc);
        $acc3->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc4 = new PhanQuyenTableModel(0, 4, 0,  0, $quyen_danhgia);
        $acc4->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc5 = new PhanQuyenTableModel(0, 5, 0,  0, $quyen_baiviet);
        $acc5->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc6 = new PhanQuyenTableModel(0, 6, 0,  0, $quyen_khuyenmai);
        $acc6->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc7 = new PhanQuyenTableModel(0, 7, 0,  0, $quyen_thue);
        $acc7->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc8 = new PhanQuyenTableModel(0, 8, 0,  0, $quyen_giaohang);
        $acc8->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc9 = new PhanQuyenTableModel(0, 9, 0,  0, $quyen_nhacungcap);
        $acc9->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc10 = new PhanQuyenTableModel(0, 10, 0,  0, $quyen_img_sanpham);
        $acc10->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc11 = new PhanQuyenTableModel(0, 11, 0,  0, $quyen_khachhang);
        $acc11->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc12 = new PhanQuyenTableModel(0, 12, 0,  0, $quyen_hoadonnhap);
        $acc12->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩmF
        $acc13 = new PhanQuyenTableModel(0, 13, 0,  0, $quyen_ct_hoadonnhap);
        $acc13->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc14 = new PhanQuyenTableModel(0, 14, 0,  0, $quyen_hoadonban);
        $acc14->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc15 = new PhanQuyenTableModel(0, 15, 0,  0, $quyen_ct_hoadonban);
        $acc15->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc16 = new PhanQuyenTableModel(0, 16, 0,  0, $quyen_taikhoanadmin);
        $acc16->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc17 = new PhanQuyenTableModel(0, 17, 0,  0, $quyen_nhanvien);
        $acc17->update_phanquyen($conn, $maad);
        // add quyền bảng sản phẩm
        $acc18 = new PhanQuyenTableModel(0, 18, 0,  0, $quyen_timkiem);
        $acc18->update_phanquyen($conn, $maad);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function edit_quyen_show()
{
    include('./model/dbconfig.php');
    include('./model/phanquyentableModel.php');
    if (isset($_POST['maacc'])) {
        $maacc = $_POST['maacc'];
        $pg = new  PhanQuyenTableModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $pg->search_1dm($conn, $maacc);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['MaTable'] == 1) {
                $pg_sanpham = $row['TrangThai'];
            }
            if ($row['MaTable'] == 2) {
                $pg_loaisanpham = $row['TrangThai'];
            }
            if ($row['MaTable'] == 3) {
                $pg_danhmuc = $row['TrangThai'];
            }
            if ($row['MaTable'] == 4) {
                $pg_danhgia = $row['TrangThai'];
            }
            if ($row['MaTable'] == 5) {
                $pg_baiviet = $row['TrangThai'];
            }
            if ($row['MaTable'] == 6) {
                $pg_khuyenmai = $row['TrangThai'];
            }
            if ($row['MaTable'] == 7) {
                $pg_thue = $row['TrangThai'];
            }
            if ($row['MaTable'] == 8) {
                $pg_giaohang = $row['TrangThai'];
            }
            if ($row['MaTable'] == 9) {
                $pg_nhacungcap = $row['TrangThai'];
            }
            if ($row['MaTable'] == 10) {
                $pg_hasp = $row['TrangThai'];
            }
            if ($row['MaTable'] == 11) {
                $pg_khachhang = $row['TrangThai'];
            }
            if ($row['MaTable'] == 12) {
                $pg_hoadonnhap = $row['TrangThai'];
            }
            if ($row['MaTable'] == 13) {
                $pg_ct_hoadonnhap = $row['TrangThai'];
            }
            if ($row['MaTable'] == 14) {
                $pg_hoadonban = $row['TrangThai'];
            }
            if ($row['MaTable'] == 15) {
                $pg_ct_hoadonban = $row['TrangThai'];
            }
            if ($row['MaTable'] == 16) {
                $pg_taikhoanadmin = $row['TrangThai'];
            }
            if ($row['MaTable'] == 17) {
                $pg_nhanvien = $row['TrangThai'];
            }
            if ($row['MaTable'] == 18) {
                $pg_timkiem = $row['TrangThai'];
            }
        };
        $data = [
            "pg_sanpham" => $pg_sanpham,
            "pg_loaisanpham" => $pg_loaisanpham,
            "pg_danhmuc" => $pg_danhmuc,
            "pg_danhgia" => $pg_danhgia,
            "pg_baiviet" => $pg_baiviet,
            "pg_khuyenmai" => $pg_khuyenmai,
            "pg_thue" => $pg_thue,
            "pg_giaohang" => $pg_giaohang,
            "pg_nhacungcap" => $pg_nhacungcap,
            "pg_hasp" => $pg_hasp,
            "pg_khachhang" => $pg_khachhang,
            "pg_hoadonnhap" => $pg_hoadonnhap,
            "pg_ct_hoadonnhap" => $pg_ct_hoadonnhap,
            "pg_hoadonban" => $pg_hoadonban,
            "pg_ct_hoadonban" => $pg_ct_hoadonban,
            "pg_taikhoanadmin" => $pg_taikhoanadmin,
            "pg_nhanvien" => $pg_nhanvien,
            "pg_timkiem" => $pg_timkiem
        ];
        echo json_encode($data);
    }
}
function add_save_account_phanquyen()
{
    try {
        include('./model/dbconfig.php');
        include('./model/phanquyentableModel.php');
        include('./model/accountmodel.php');
        $acc = new AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $acc->max_maacc($conn);
        $maacc = 0;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $maacc = $row['MaAD'];
        }

        $quyen_sp = $_POST['quyen_sp'];
        $quyen_loaisanpham = $_POST['quyen_loaisanpham'];
        $quyen_danhmuc = $_POST['quyen_danhmuc'];
        $quyen_danhgia = $_POST['quyen_danhgia'];
        $quyen_baiviet = $_POST['quyen_baiviet'];
        $quyen_khuyenmai = $_POST['quyen_khuyenmai'];
        $quyen_thue = $_POST['quyen_thue'];
        $quyen_giaohang = $_POST['quyen_giaohang'];
        $quyen_nhacungcap = $_POST['quyen_nhacungcap'];
        $quyen_img_sanpham = $_POST['quyen_img_sanpham'];
        $quyen_khachhang = $_POST['quyen_khachhang'];
        $quyen_hoadonnhap = $_POST['quyen_hoadonnhap'];
        $quyen_ct_hoadonnhap = $_POST['quyen_ct_hoadonnhap'];
        $quyen_hoadonban = $_POST['quyen_hoadonban'];
        $quyen_ct_hoadonban = $_POST['quyen_ct_hoadonban'];
        $quyen_taikhoanadmin = $_POST['quyen_taikhoanadmin'];
        $quyen_nhanvien = $_POST['quyen_nhanvien'];
        $quyen_timkiem = $_POST['quyen_timkiem'];
        // add quyền bảng sản phẩm
        $acc1 = new PhanQuyenTableModel(0, 1, "Sản phẩm",  $maacc, $quyen_sp);
        $acc1->add_1($conn);
        // add quyền bảng sản phẩm
        $acc2 = new PhanQuyenTableModel(0, 2, "Loại Sản phẩm",  $maacc, $quyen_loaisanpham);
        $acc2->add_1($conn);
        // add quyền bảng sản phẩm
        $acc3 = new PhanQuyenTableModel(0, 3, "Danh Mục",  $maacc, $quyen_danhmuc);
        $acc3->add_1($conn);
        // add quyền bảng sản phẩm
        $acc4 = new PhanQuyenTableModel(0, 4, "Đánh giá",  $maacc, $quyen_danhgia);
        $acc4->add_1($conn);
        // add quyền bảng sản phẩm
        $acc5 = new PhanQuyenTableModel(0, 5, "Bài viết",  $maacc, $quyen_baiviet);
        $acc5->add_1($conn);
        // add quyền bảng sản phẩm
        $acc6 = new PhanQuyenTableModel(0, 6, "Khuyến mại",  $maacc, $quyen_khuyenmai);
        $acc6->add_1($conn);
        // add quyền bảng sản phẩm
        $acc7 = new PhanQuyenTableModel(0, 7, "Thuế",  $maacc, $quyen_thue);
        $acc7->add_1($conn);
        // add quyền bảng sản phẩm
        $acc8 = new PhanQuyenTableModel(0, 8, "Giao hàng",  $maacc, $quyen_giaohang);
        $acc8->add_1($conn);
        // add quyền bảng sản phẩm
        $acc9 = new PhanQuyenTableModel(0, 9, "Nhà cung cấp",  $maacc, $quyen_nhacungcap);
        $acc9->add_1($conn);
        // add quyền bảng sản phẩm
        $acc10 = new PhanQuyenTableModel(0, 10, "hình ảnh sản phẩm",  $maacc, $quyen_img_sanpham);
        $acc10->add_1($conn);
        // add quyền bảng sản phẩm
        $acc11 = new PhanQuyenTableModel(0, 11, "khách hàng",  $maacc, $quyen_khachhang);
        $acc11->add_1($conn);
        // add quyền bảng sản phẩm
        $acc12 = new PhanQuyenTableModel(0, 12, "hóa đơn nhập",  $maacc, $quyen_hoadonnhap);
        $acc12->add_1($conn);
        // add quyền bảng sản phẩmF
        $acc13 = new PhanQuyenTableModel(0, 13, "chi tiết hóa đơn nhập",  $maacc, $quyen_ct_hoadonnhap);
        $acc13->add_1($conn);
        // add quyền bảng sản phẩm
        $acc14 = new PhanQuyenTableModel(0, 14, "hóa đơn bán",  $maacc, $quyen_hoadonban);
        $acc14->add_1($conn);
        // add quyền bảng sản phẩm
        $acc15 = new PhanQuyenTableModel(0, 15, "chi tiết hóa đơn bán",  $maacc, $quyen_ct_hoadonban);
        $acc15->add_1($conn);
        // add quyền bảng sản phẩm
        $acc16 = new PhanQuyenTableModel(0, 16, "tài khoản admin",  $maacc, $quyen_taikhoanadmin);
        $acc16->add_1($conn);
        // add quyền bảng sản phẩm
        $acc17 = new PhanQuyenTableModel(0, 17, "nhân viên",  $maacc, $quyen_nhanvien);
        $acc17->add_1($conn);
        // add quyền bảng sản phẩm
        $acc18 = new PhanQuyenTableModel(0, 18, "tìm kiếm",  $maacc, $quyen_timkiem);
        $acc18->add_1($conn);
    } catch (Exception $e) {
    }
}
