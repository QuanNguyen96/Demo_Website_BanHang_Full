<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;

// read file excel
require_once 'Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';

function readfile_excel_json($inputFileName)
{
    try {

        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch (\Exception $e) {
        die('Error loading file:"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }

    $sheet = $objPHPExcel->getSheet(0);
    $data = $sheet->toArray(); //This method can't read the picture, so the picture needs to be processed separately
    $imageFilePath = './upload/imagexcel/'; //Path of picture local storage
    if (!file_exists($imageFilePath)) {
        mkdir($imageFilePath, 0777, true);
    }

    //Processing pictures
    foreach ($sheet->getDrawingCollection() as $img) {
        list($startColumn, $startRow) = PHPExcel_Cell::coordinateFromString($img->getCoordinates()); //Get the row and column of the picture
        $imageFileName = $img->getCoordinates() . mt_rand(1000, 9999);
        switch ($img->getExtension()) {
            case 'jpg':
            case 'jpeg':
                $imageFileName .= '.jpeg';
                $source = imagecreatefromjpeg($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
            case 'gif':
                $imageFileName .= '.gif';
                $source = imagecreatefromgif($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
            case 'png':
                $imageFileName .= '.png';
                $source = imagecreatefrompng($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
        }
        $startColumn = ABC2decimal($startColumn);
        $data[$startRow - 1][$startColumn] = $imageFilePath . $imageFileName;
    }
    return $data;
}
// read and save file excel

function readsavefile_excel_json($inputFileName)
{
    try {

        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch (\Exception $e) {
        die('Error loading file:"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }

    $sheet = $objPHPExcel->getSheet(0);
    $data = $sheet->toArray(); //This method can't read the picture, so the picture needs to be processed separately
    $imageFilePath = './upload/image/hasp/'; //Path of picture local storage
    if (!file_exists($imageFilePath)) {
        mkdir($imageFilePath, 0777, true);
    }

    //Processing pictures
    foreach ($sheet->getDrawingCollection() as $img) {
        list($startColumn, $startRow) = PHPExcel_Cell::coordinateFromString($img->getCoordinates()); //Get the row and column of the picture
        $imageFileName = $img->getCoordinates() . mt_rand(1000, 9999);
        switch ($img->getExtension()) {
            case 'jpg':
            case 'jpeg':
                $imageFileName .= '.jpeg';
                $source = imagecreatefromjpeg($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
            case 'gif':
                $imageFileName .= '.gif';
                $source = imagecreatefromgif($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
            case 'png':
                $imageFileName .= '.png';
                $source = imagecreatefrompng($img->getPath());
                imagejpeg($source, $imageFilePath . $imageFileName);
                break;
        }
        $startColumn = ABC2decimal($startColumn);
        $data[$startRow - 1][$startColumn] = $imageFilePath . $imageFileName;
    }
    return $data;
}

function ABC2decimal($abc)
{
    $ten = 0;
    $len = strlen($abc);
    for ($i = 1; $i <= $len; $i++) {
        $char = substr($abc, 0 - $i, 1); //Get single character in reverse

        $int = ord($char);
        $ten += ($int - 65) * pow(26, $i - 1);
    }
    return $ten;
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save_km": {
                add_save_km();
                break;
            }
        case "show_km": {
                show_km();
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
        case "edit_show": {
                edit_show();
                break;
            }
        case "update_khuyenmai": {
                update_khuyenmai();
                break;
            }
        case "read_filexecl": {
                read_filexecl_ham();
                break;
            }
        case "add_excel_save": {
                add_excel_save();
                break;
            }
        case "show_shopeemail_index_kh": {
                show_shopeemail_index_kh();
                break;
            }
        case "show_flash_sale_index_kh": {
                show_flash_sale_index_kh();
                break;
            }
        case "show_makm_searchsp_kh": {
                show_makm_searchsp_kh();
                break;
            }
        case "show_addmakm_searchsp_kh": {
                show_addmakm_searchsp_kh();
                break;
            }
    }
}
//
function show_addmakm_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $result = $km->show_searchkh($conn);
    $dem = 0;
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            if ($dem > 3) {
                $data_item = [
                    "MaKM" => $row['MaKM'],
                    "TenKM" => $row['TenKM'],
                    "GiamGia" => $row['GiamGia']
                ];
                array_push($datarp, $data_item);
            }
        }
    }
    echo json_encode($datarp);
}
function show_makm_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $result = $km->show_searchkh($conn);
    $dem = 0;
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            if ($dem <= 3) {
                $data_item = [
                    "MaKM" => $row['MaKM'],
                    "TenKM" => $row['TenKM'],
                    "GiamGia" => $row['GiamGia']
                ];
                array_push($datarp, $data_item);
            } else {
                break;
            }
        }
    }
    echo json_encode($datarp);
}
function show_flash_sale_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/chitiethoadonbanmodel.php');
    $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $result_km = $km->show_flashsale_mail($conn);
    $datarp = [];
    if (mysqli_num_rows($result_km) > 0) {
        while ($row = mysqli_fetch_assoc($result_km)) {
            $masp = $row['MaSP'];
            // lấy dữ liệu số lượng sản phẩm đã bán
            $daban = 0;
            $cthd = new ChiTietHoaDonBanModel(0, 0, 0, 0, 0);
            $result_cthd = $cthd->show_flashsale_indexkh($conn, $masp);
            if (mysqli_num_rows($result_km) > 0) {
                while ($row_cthd = mysqli_fetch_assoc($result_cthd)) {
                    $daban += $row_cthd['SoLuong'];
                }
            }
            // lay 1 hinh anh
            $hasp = new HASPModel(0, 0, 0);
            $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
            $row_hasp = mysqli_fetch_assoc($result_hasp);
            // lấy dữ liệu sản phẩm
            $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
            $result_sp = $sanpham->search_1sp_index_kh($conn, $masp);
            if (mysqli_num_rows($result_sp) > 0) {
                $row_sp = mysqli_fetch_assoc($result_sp);
                $data_item = [
                    "MaSP" => $row_sp['MaSP'],
                    "TenSP" => $row_sp['TenSP'],
                    "SoLuong" => $row_sp['SoLuong'],
                    "GiaBan" => $row_sp['GiaBan'],
                    "HinhAnh" => $row_hasp['HinhAnh'],
                    "KhuyenMai" => $row['GiamGia'],
                    "DaBan" => $daban
                ];
                array_push($datarp, $data_item);
            }
        }
    }

    echo json_encode($datarp);
}
function show_shopeemail_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $result_km = $km->show_shopee_mail($conn);
    $datarp = [];
    if (mysqli_num_rows($result_km) > 0) {
        while ($row = mysqli_fetch_assoc($result_km)) {
            $masp = $row['MaSP'];
            // lay 1 hinh anh
            $hasp = new HASPModel(0, 0, 0);
            $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
            $row_hasp = mysqli_fetch_assoc($result_hasp);
            // lấy dữ liệu sản phẩm
            $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
            $result_sp = $sanpham->search_1sp_index_kh($conn, $masp);
            if (mysqli_num_rows($result_sp) > 0) {
                $row_sp = mysqli_fetch_assoc($result_sp);
                $data_item = [
                    "MaSP" => $row_sp['MaSP'],
                    "TenSP" => $row_sp['TenSP'],
                    "SoLuong" => $row_sp['SoLuong'],
                    "GiaBan" => $row_sp['GiaBan'],
                    "HinhAnh" => $row_hasp['HinhAnh'],
                    "KhuyenMai" => $row['GiamGia']
                ];
                array_push($datarp, $data_item);
            }
        }
    }

    echo json_encode($datarp);
}
function read_filexecl_ham()
{
    if (isset($_FILES['dm_ad_them_content_excel_fileupload'])) {
        $filename = $_FILES['dm_ad_them_content_excel_fileupload']['tmp_name'];
        echo json_encode(readfile_excel_json($filename));
    }
}
function add_excel_save()
{
    if (isset($_FILES['dm_ad_them_content_excel_fileupload'])) {
        $filename = $_FILES['dm_ad_them_content_excel_fileupload']['tmp_name'];
        $data = readsavefile_excel_json($filename);
        echo add_loaisanpham_excel($data, $filename);
    }
}
function add_loaisanpham_excel($file, $filegoc)
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khuyenmaimodel.php');
        foreach ($file as $value) {
            $tenkm = $value[0];
            $ngaybd = $value[1];
            $ngaykt = $value[2];
            $ngaybd = date_format(date_create($ngaybd), "Y/m/d H:i:s");
            $ngaykt = date_format(date_create($ngaykt), "Y/m/d H:i:s");
            $giamgia = $value[3];
            $masp = $value[4];

            $km = new KhuyenMaiModel(0, $tenkm, $ngaybd, $ngaykt, $giamgia, $masp);
            $km->add_1($conn);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
function update_khuyenmai()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khuyenmaimodel.php');
        $MaKM = $_POST['MaKM'];
        $TenKM = $_POST['TenKM'];
        $NgayBatDau = $_POST['NgayBatDau'];
        $NgayKetThuc = $_POST['NgayKetThuc'];
        $GiamGia = $_POST['GiamGia'];
        $MaSP = $_POST['MaSP'];
        $km = new KhuyenMaiModel($MaKM, $TenKM, $NgayBatDau, $NgayKetThuc, $GiamGia, $MaSP);
        $km->update($conn, $MaKM);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function edit_show()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $lsp = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
        $result = $lsp->search_1dm($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaKM" => $row['MaKM'],
            "TenKM" => $row['TenKM'],
            "NgayBatDau" => $row['NgayBatDau'],
            "NgayKetThuc" => $row['NgayKetThuc'],
            "GiamGia" => $row['GiamGia'],
            "MaSP" => $row['MaSP']
        ];
        echo json_encode($data);
    }
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
            include('./model/khuyenmaimodel.php');
            foreach ($arrayid as $value) {
                $lsp = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
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
        include('./model/khuyenmaimodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_km()
{
    include('./model/dbconfig.php');
    include('./model/khuyenmaimodel.php');
    $dg = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
    $result = $dg->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-mabvxoa=' . $row['MaKM'] . ' type="checkbox">
            </td>
            <td>
            ' . $row['MaKM'] . ' 
            </td>
            <td>
            ' . $row['TenKM'] . ' 
            </td>
            <td>
            ' . $row['NgayBatDau'] . ' 
            </td>
            <td>
            ' . $row['NgayKetThuc'] . ' 
            </td>
            <td>
            ' . $row['GiamGia'] . ' 
            </td>
            <td>
            ' . $row['MaSP'] . ' 
            </td>
            <td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-masp=' . $row['MaSP'] . ' data-makm=' . $row['MaKM'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaKM'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="8">Không có khuyến mại nào</td>
    </tr>';
    }
    echo ($datarp);
}
function add_save_km()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khuyenmaimodel.php');
        $tenkm = $_POST['tenkm'];
        $ngaybd = $_POST['ngaybd'];
        $ngaykt = $_POST['ngaykt'];
        $giamgia = $_POST['giamgia'];
        $masp = $_POST['masp'];
        $km = new KhuyenMaiModel(0, $tenkm, $ngaybd, $ngaykt, $giamgia, $masp);
        $km->add_1($conn);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
