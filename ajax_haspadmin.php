<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save_sp": {
                add_save_sp();
                break;
            }
        case "edit_save_sp": {
                edit_save_sp();
                break;
            }
        case "show_hasp": {
                show_hasp();
                break;
            }
        case "delete": {
                delete();
                break;
            }
        case "delete_nhieu": {
                delete_nhieu();
                break;
            }
        case "truyen_masp_edithasp": {
                truyen_masp_edithasp();
                break;
            }
        case "update_hasp_coupload": {
                update_hasp_coupload();
                break;
            }
        case "update_hasp_koupload": {
                update_hasp_koupload();
                break;
            }
    }
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
            // show img trang xem chi tiet khach hang
        case "show_slideimg_index_kh": {
                show_slideimg_index_kh();
                break;
            }
    }
}
function show_slideimg_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/haspmodel.php');
    include('./model/sanphammodel.php');
    include('./model/khuyenmaimodel.php');
    include('./model/danhgiamodel.php');
    include('./model/chitiethoadonbanmodel.php');
    $MaSP = $_GET['MaSP'];
    // lay du lieu hasp
    $hasp = new HASPModel(0, 0, 0);
    $result = $hasp->search_hasp_xct_theo_masp($conn, $MaSP);
    $datahasp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "HinhAnh" => $row['HinhAnh']
            ];
            array_push($datahasp, $data_item);
        }
    }
    $data_ha = [];
    $dem_slide = 0;
    while ($dem_slide <= 6) {
        for ($i = 0; $i < count($datahasp); $i++) {
            $dem_slide++;
            if ($dem_slide > 6) {
                break;
            }
            array_push($data_ha, $datahasp[$i]['HinhAnh']);
        }
    }
    // lấy dữ liệu sản phẩm
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result_sp = $sanpham->search_1sp_index_kh($conn, $MaSP);
    $data_sp = [];
    if (mysqli_num_rows($result_sp) > 0) {
        $row_sp = mysqli_fetch_assoc($result_sp);
        $data_item = [
            "MaSP" => $row_sp['MaSP'],
            "TenSP" => $row_sp['TenSP'],
            "SoLuong" => $row_sp['SoLuong'],
            "GiaBan" => $row_sp['GiaBan'],
        ];
        array_push($data_sp, $data_item);
    }
    // lấy dữ loai san pham va danh muc
    $result_dm_lsp = $sanpham->search_lsp_dm_theo_masp($conn, $MaSP);
    if (mysqli_num_rows($result_dm_lsp) > 0) {
        $result_dm_lsp = mysqli_fetch_assoc($result_dm_lsp);
        $data_dm_lsp = [
            "MaDM" => $result_dm_lsp['MaDM'],
            "TenDM" => $result_dm_lsp['TenDM'],
            "MaLSP" => $result_dm_lsp['MaLSP'],
            "TenLSP" => $result_dm_lsp['TenLSP'],
        ];
    }
    // lay 1 ma khuyen mai
    $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $khuyenmai = 0;
    $result_km = $km->search_1km_theo_masp($conn, $MaSP);

    if (mysqli_num_rows($result_km) > 0) {
        $row_km = mysqli_fetch_assoc($result_km);
        $khuyenmai = $row_km['GiamGia'];
    }
    // lay danh gia va yeu thich
    $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
    $like = 0;
    $phantramsao = 100;
    $result_dg = $dg->search_masp_indexkh($conn, $MaSP);
    $demlike = 0;
    $demsao = 0;
    $songuoi_danhgia = 0;
    $songuoi_thich = 0;
    $people_5sao = 0;
    $people_4sao = 0;
    $people_3sao = 0;
    $people_2sao = 0;
    $people_1sao = 0;
    if (mysqli_num_rows($result_dg) > 0) {
        while ($row_dg = mysqli_fetch_assoc($result_dg)) {
            $songuoi_danhgia++;
            if ($row_dg['Thich'] == 1) {
                $demlike++;
                $songuoi_thich++;
            }
            $demsao += $row_dg['Sao'];
            if ($row_dg['Sao'] == 5) {
                $people_5sao++;
            }
            if ($row_dg['Sao'] == 4) {
                $people_4sao++;
            }
            if ($row_dg['Sao'] == 3) {
                $people_3sao++;
            }
            if ($row_dg['Sao'] == 2) {
                $people_2sao++;
            }
            if ($row_dg['Sao'] == 1) {
                $people_1sao++;
            }
        }
    }
    $data_sao = [
        "5sao" => $people_5sao,
        "4sao" =>  $people_4sao,
        "3sao" => $people_3sao,
        "2sao" => $people_2sao,
        "1sao" =>   $people_1sao
    ];
    if ($demlike >= 2) {
        $like = 1;
    }
    if ($songuoi_danhgia > 0) {
        $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
    }
    // lấy dữ liệu số lượng sản phẩm đã bán
    $daban = 0;
    $cthd = new ChiTietHoaDonBanModel(0, 0, 0, 0, 0);
    $result_cthd = $cthd->show_flashsale_indexkh($conn, $MaSP);
    if (mysqli_num_rows($result_km) > 0) {
        while ($row_cthd = mysqli_fetch_assoc($result_cthd)) {
            $daban += $row_cthd['SoLuong'];
        }
    }

    //tong hop du lieu gui di
    $datarp = [
        "SanPham" => $data_sp,
        "HinhAnh" => $data_ha,
        "KhuyenMai" => $khuyenmai,
        "SoNguoiDanhGia" => $songuoi_danhgia,
        "SoNguoiThich" => $songuoi_thich,
        "Like" => $like,
        "PhanTramSao" => $phantramsao,
        "DaBan" => $daban,
        "DM_LSP" => $data_dm_lsp,
        "Sao"=>$data_sao
    ];
    echo json_encode($datarp);
}
function update_hasp_koupload()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/haspmodel.php');
        $masp = $_POST['masp'];
        $mahasp = $_POST['mahasp'];
        $hasp = new HASPModel(0, $masp, 0);
        $hasp->updatekofull($conn, $mahasp);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function update_hasp_coupload()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/haspmodel.php');
        $masp = $_POST['masp'];
        $mahasp = $_POST['mahasp'];
        $file_hasp = $_FILES['file_upload_edit_hasp'];
        $hasp = new HASPModel(0, $masp, $file_hasp['name']);
        $hasp->updatefull($conn, $mahasp);
        // add file anh 
        $Path = "./upload/image/hasp/";
        $Path = $Path . basename($file_hasp['name']);
        move_uploaded_file($file_hasp['tmp_name'], $Path);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function truyen_masp_edithasp()
{
}
function delete_nhieu()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        if (isset($_POST['array_id'])) {
            $arrayid = $_POST['array_id'];
            $data = [
                'add_messages' => 'successfull'
            ];
            include('./model/dbconfig.php');
            include('./model/haspmodel.php');
            foreach ($arrayid as $value) {
                $lsp = new HASPModel(0, 0, 0);
                $lsp->delete($conn, $value);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function delete()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/haspmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new HASPModel(0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }

    echo json_encode($data);
}
function show_hasp()
{
    include('./model/dbconfig.php');
    include('./model/haspmodel.php');
    $ncc = new HASPModel(0, 0, 0);
    $result = $ncc->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-mabvxoa=' . $row['MaHASP'] . ' type="checkbox">
            </td>
            <td>
            ' . $row['MaHASP'] . ' 
            </td>         
            <td>  <img src="./upload/image/hasp/' . $row['HinhAnh'] . '"> </td>
            <td class="hasp_edit_datamasp">' . $row['MaSP'] . '</td>
            <td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-mabv_edit=' . $row['MaHASP'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaHASP'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="6">Không có hình ảnh nào</td>
    </tr>';
    }
    echo ($datarp);
}
function edit_save_sp()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/haspmodel.php');
        include('./model/sanphammodel.php');
        $masp = $_POST['masp'];
        $hasp = new HASPModel(0, 0, 0);
        $haspg = $hasp->hasp_theosp($conn, $masp);
        $count_haspg = 0;
        if (mysqli_num_rows($haspg) > 0) {
            $count_haspg = mysqli_num_rows($haspg);
            $array_mahasp = [];
            while ($row = mysqli_fetch_assoc($haspg)) {
                array_push($array_mahasp, $row['MaHASP']);
            }
        }
        $file = $_FILES['file_eidt_hasp'];
        $count_file = count($file['name']);
        if ($count_file <= $count_haspg) {
            for ($i = 0; $i < $count_file; $i++) {
                $hasp = new HASPModel(0, $masp, $file['name'][$i]);
                $hasp->update_hasp($conn, $array_mahasp[$i]);
                // add file anh
                $Path = "./upload/image/hasp/";
                $Path = $Path . basename($file['name'][$i]);
                move_uploaded_file($file['tmp_name'][$i], $Path);
            }
        } else {
            for ($i = 0; $i < $count_haspg; $i++) {
                $hasp = new HASPModel(0, $masp, $file['name'][$i]);
                $hasp->update_hasp($conn, $array_mahasp[$i]);
                // add file anh
                $Path = "./upload/image/hasp/";
                $Path = $Path . basename($file['name'][$i]);
                move_uploaded_file($file['tmp_name'][$i], $Path);
            }
            for ($k = $count_haspg; $k < $count_file; $k++) {
                $hasp = new HASPModel(0, $masp, $file['name'][$k]);
                $hasp->add_1($conn);
                // add file anh
                $Path = "./upload/image/hasp/";
                $Path = $Path . basename($file['name'][$k]);
                move_uploaded_file($file['tmp_name'][$k], $Path);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function add_save_sp()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/haspmodel.php');
        include('./model/sanphammodel.php');
        $sp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
        $result = $sp->max_masp($conn);
        $masp = 0;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $masp = $row['MaSP'];
        }
        $file_hasp = [];
        if (isset($_FILES['file_haaddsp'])) {
            $file_hasp = $_FILES['file_haaddsp'];
            for ($i = 0; $i < count($file_hasp['name']); $i++) {
                //echo $file_hasp['name'][$i];
                $hasp = new HASPModel(0, $masp, $file_hasp['name'][$i]);
                $hasp->add_1($conn);
                // add file anh 
                $Path = "./upload/image/hasp/";
                $Path = $Path . basename($file_hasp['name'][$i]);
                move_uploaded_file($file_hasp['tmp_name'][$i], $Path);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
