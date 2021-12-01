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
        case "show_data_loaisanphm": {
                show_data_loaisanphm();
                break;
            }
        case "show_data_nhacungcap": {
                show_data_nhacungcap();
                break;
            }
        case "add_save": {
                add_save();
                break;
            }
        case "show_sanpham": {
                show_sanpham();
                break;
            }
        case "delete": {
                delete_sp();
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
        case "edit_sp_save": {
                edit_sp_save();
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
        case "edit_trangthaihienthi": {
                edit_trangthaihienthi();
                break;
            }
        case "show_data_sanphm_bv": {
                show_data_sanphm_bv();
                break;
            }
        case "show_data_sanphm_ha": {
                show_data_sanphm_ha();
                break;
            }
        case "show_data_hasp_ha": {
                show_data_hasp_ha();
                break;
            }

            // xu ly ben index khach
        case "show_sp_noaccount_index_kh": {
                show_sp_noaccount_index_kh();
                break;
            }
        case "show_spsearch_noaccount_index_kh": {
                show_spsearch_noaccount_index_kh();
                break;
            }
        case "show_phantrang_indexkh": {
                show_phantrang_indexkh();
                break;
            }
        case "xemthem_sp_noaccount_index_kh": {
                xemthem_sp_noaccount_index_kh();
                break;
            }
        case "get_data_sp_indexkh": {
                get_data_sp_indexkh();
                break;
            }
            // case "search_sp_indexkh": {
            //         search_sp_indexkh();
            //         break;
            //     }

        case "show_search_data_pagesearch": {
                show_search_data_pagesearch();
                break;
            }
        case "show_phantrang_searchsp_kh": {
                show_phantrang_searchsp_kh();
                break;
            }

            // 
        case "show_select_search_data_pagesearch": {
                show_select_search_data_pagesearch();
                break;
            }
        case "show_phantrang_select_searchsp_kh": {
                show_phantrang_select_searchsp_kh();
                break;
            }
        case "dataproduct_add_cart": {
                dataproduct_add_cart();
                break;
            }
        case "laysoluongsanphamtrongkho_pagegiohang": {
                laysoluongsanphamtrongkho_pagegiohang();
                break;
            }
    }
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
            // show img trang xem chi tiet khach hang
        case "show_SanPhamXemthem_xemct_kh": {
                show_SanPhamXemthem_xemct_kh();
                break;
            }
        case "search_sp_indexkh": {
                search_sp_indexkh();
                break;
            }

            // phuong thuc gui tu trang xem chi tiet sanng mac du muon la post nhung gui theo get
            // nen ta su dung chung 2 ham và tren ham post cung co
        case "dataproduct_add_cart": {
                dataproduct_add_cart();
                break;
            }
    }
}
// 
function laysoluongsanphamtrongkho_pagegiohang()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $masp = 0;
    if (isset($_POST['masp'])) {
        $masp = $_POST['masp'];
    }
    $soluong = 0;
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->search_1($conn, $masp);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $soluong = $row['SoLuong'];
    }
    echo $soluong;
}
function dataproduct_add_cart()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/khuyenmaimodel.php');
    $datarp = [];
    if (isset($_POST['masp'])) {
        $masp = $_POST['masp'];
    }
    if (isset($_GET['masp'])) {
        $masp = $_GET['masp'];
    }
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->search_1sp_addcart($conn, $masp);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // lay 1 ma khuyen mai
        $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
        $khuyenmai = 0;
        $result_km = $km->search_1km_theo_masp($conn, $masp);

        if (mysqli_num_rows($result_km) > 0) {
            $row_km = mysqli_fetch_assoc($result_km);
            $khuyenmai = $row_km['GiamGia'];
        }
        $datarp = [
            "MaSP" => $row['MaSP'],
            "TenSP" => $row['TenSP'],
            "GiaBan" => $row['GiaBan'],
            "KhuyenMai" => $khuyenmai,
            "SoLuong" => $row['SoLuong'],
            "HinhAnh" => $row['HinhAnh'],
        ];
    }
    echo json_encode($datarp);
}
function show_phantrang_select_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $text_search = "";
    if (isset($_POST['text_search'])) {
        $text_search = $_POST['text_search'];
    }
    $sqltk = '';
    if (isset($_POST['sqltimkiem'])) {
        $sqltk = $_POST['sqltimkiem'];
    }
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->phantrang_page_searchkh_loc($conn, $text_search, $sqltk);
    $sophantuhienthi = 8;
    $tongsotrang = ceil(mysqli_num_rows($result) / $sophantuhienthi);
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $datarp = "<span id='ketquatimkieman_daloc' style='display:none'>" . mysqli_num_rows($result) . "</span>";
    if ($tranghientai > 3) {
        $datarp .= '<div class="page" data-data_page=1>First</div>';
    }
    if ($tranghientai > 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai - 1) . '>&laquo;</div>';
    }
    if ($tranghientai > 3) {
        $datarp .= '<span> ... </span>';
    }
    for ($i = 1; $i <= $tongsotrang; $i++) {
        if ($i != $tranghientai) {
            if ($i > $tranghientai - 3 && $i < $tranghientai + 3) {
                $datarp .= '<div class="page" data-data_page=' . $i . '>' . $i . '</div>';
            }
        } else {
            $datarp .= '<div style="background-color:black;color:white" class="page" data-data_page=' . $i . '>' . $i . '</div>';
        }
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<span> ... </span>';
    }
    if ($tranghientai < $tongsotrang - 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai + 1) . '>&raquo;</div>';
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<div class="page" data-data_page=' . $tongsotrang . '>Last</div>';
    }
    echo $datarp;
}
function show_select_search_data_pagesearch()
{
    $text_search = "";
    if (isset($_POST['text_search'])) {
        $text_search = $_POST['text_search'];
    }
    $sql = $_POST['text_select'];
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/khuyenmaimodel.php');
    include('./model/danhgiamodel.php');
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $sophantuhienthi = 8;
    $ptubatdau = ($tranghientai - 1) * $sophantuhienthi;
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->search_page_searchkh_loc($conn, $text_search, $ptubatdau, $sophantuhienthi, $sql);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $masp = $row['MaSP'];
            // lay 1 hinh anh
            $hasp = new HASPModel(0, 0, 0);
            $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
            $row_hasp = mysqli_fetch_assoc($result_hasp);
            // lay 1 ma khuyen mai
            $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
            $khuyenmai = '0';
            $result_km = $km->search_1km_theo_masp($conn, $masp);

            if (mysqli_num_rows($result_km) > 0) {
                $row_km = mysqli_fetch_assoc($result_km);
                $khuyenmai = $row_km['GiamGia'];
            }
            // lay danh gia va yeu thich
            $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
            $like = 0;
            $phantramsao = 100;
            $result_dg = $dg->search_masp_indexkh($conn, $masp);
            $demlike = 0;
            $demsao = 0;
            $songuoi_danhgia = 0;
            if (mysqli_num_rows($result_dg) > 0) {
                while ($row_dg = mysqli_fetch_assoc($result_dg)) {
                    $songuoi_danhgia++;
                    if ($row_dg['Thich'] == 1) {
                        $demlike++;
                    }
                    $demsao += $row_dg['Sao'];
                }
            }
            if ($demlike >= 3) {
                $like = 1;
            }
            if ($songuoi_danhgia > 0) {
                $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
            }
            // // lay server;
            // $url=$_SERVER["REQUEST_URI"];
            $data_item = [
                "MaSP" => $row['MaSP'],
                "TenSP" => $row['TenSP'],
                "SoLuong" => $row['SoLuong'],
                "GiaBan" => $row['GiaBan'],
                "HinhAnh" => $row_hasp['HinhAnh'],
                "KhuyenMai" => $khuyenmai,
                "Like" => $like,
                "PhanTramSao" => $phantramsao
                // "url"=>$url
            ];
            array_push($datarp, $data_item);
        }
    }
    echo json_encode($datarp);
}
// 
function show_phantrang_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $text_search = "";
    if (isset($_POST['text_search'])) {
        $text_search = $_POST['text_search'];
    }
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->phantrang_page_searchkh($conn, $text_search);
    $sophantuhienthi = 8;
    $tongsotrang = ceil(mysqli_num_rows($result) / $sophantuhienthi);
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $datarp = "<span id='ketquatimkieman' style='display:none'>" . mysqli_num_rows($result) . "</span>";
    if ($tranghientai > 3) {
        $datarp .= '<div class="page" data-data_page=1>First</div>';
    }
    if ($tranghientai > 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai - 1) . '>&laquo;</div>';
    }
    if ($tranghientai > 3) {
        $datarp .= '<span> ... </span>';
    }
    for ($i = 1; $i <= $tongsotrang; $i++) {
        if ($i != $tranghientai) {
            if ($i > $tranghientai - 3 && $i < $tranghientai + 3) {
                $datarp .= '<div class="page" data-data_page=' . $i . '>' . $i . '</div>';
            }
        } else {
            $datarp .= '<div style="background-color:black;color:white" class="page" data-data_page=' . $i . '>' . $i . '</div>';
        }
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<span> ... </span>';
    }
    if ($tranghientai < $tongsotrang - 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai + 1) . '>&raquo;</div>';
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<div class="page" data-data_page=' . $tongsotrang . '>Last</div>';
    }
    echo $datarp;
}
function show_search_data_pagesearch()
{
    $text_search = "";
    if (isset($_POST['text_search'])) {
        $text_search = $_POST['text_search'];
    }
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/khuyenmaimodel.php');
    include('./model/danhgiamodel.php');
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $sophantuhienthi = 8;
    $ptubatdau = ($tranghientai - 1) * $sophantuhienthi;
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->search_page_searchkh($conn, $text_search, $ptubatdau, $sophantuhienthi);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $masp = $row['MaSP'];
            // lay 1 hinh anh
            $hasp = new HASPModel(0, 0, 0);
            $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
            $row_hasp = mysqli_fetch_assoc($result_hasp);
            // lay 1 ma khuyen mai
            $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
            $khuyenmai = '0';
            $result_km = $km->search_1km_theo_masp($conn, $masp);

            if (mysqli_num_rows($result_km) > 0) {
                $row_km = mysqli_fetch_assoc($result_km);
                $khuyenmai = $row_km['GiamGia'];
            }
            // lay danh gia va yeu thich
            $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
            $like = 0;
            $phantramsao = 100;
            $result_dg = $dg->search_masp_indexkh($conn, $masp);
            $demlike = 0;
            $demsao = 0;
            $songuoi_danhgia = 0;
            if (mysqli_num_rows($result_dg) > 0) {
                while ($row_dg = mysqli_fetch_assoc($result_dg)) {
                    $songuoi_danhgia++;
                    if ($row_dg['Thich'] == 1) {
                        $demlike++;
                    }
                    $demsao += $row_dg['Sao'];
                }
            }
            if ($demlike >= 3) {
                $like = 1;
            }
            if ($songuoi_danhgia > 0) {
                $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
            }
            // // lay server;
            // $url=$_SERVER["REQUEST_URI"];
            $data_item = [
                "MaSP" => $row['MaSP'],
                "TenSP" => $row['TenSP'],
                "SoLuong" => $row['SoLuong'],
                "GiaBan" => $row['GiaBan'],
                "HinhAnh" => $row_hasp['HinhAnh'],
                "KhuyenMai" => $khuyenmai,
                "Like" => $like,
                "PhanTramSao" => $phantramsao
                // "url"=>$url
            ];
            array_push($datarp, $data_item);
        }
    }
    echo json_encode($datarp);
}
function search_sp_indexkh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $text_search = $_GET['text_search'];
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->search_indexkh($conn, $text_search);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "MaSP" => $row['MaSP'],
                "TenSP" => $row['TenSP'],
                "HinhAnh" => $row['HinhAnh']
            ];
            array_push($datarp, $data_item);
        }
    }
    echo json_encode($datarp);
}
function get_data_sp_indexkh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show($conn);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "MaSP" => $row['MaSP'],
                "TenSP" => $row['TenSP'],
                "GiaBan" => $row['GiaBan'],
                "TenNCC" => $row['TenNCC'],
                "TenLSP" => $row['TenLSP'],
            ];
            $datarp[] = $data_item;
        }
    }
    echo json_encode($datarp);
}
function xemthem_sp_noaccount_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/khuyenmaimodel.php');
    include('./model/danhgiamodel.php');



    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_index_kh($conn);
    $count_sanpham = mysqli_num_rows($result);
    $datarp = [];
    if ($count_sanpham > 4) {
        $array_rand = [];
        while (count($array_rand) <= 4) {
            $rd = rand(1, $count_sanpham);
            if (in_array($rd, $array_rand)) {
            } else {
                array_push($array_rand, $rd);
            }
        }
        $dem_sp = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem_sp++;
            if (in_array($dem_sp, $array_rand)) {
                $masp = $row['MaSP'];
                // lay 1 hinh anh
                $hasp = new HASPModel(0, 0, 0);
                $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
                $row_hasp = mysqli_fetch_assoc($result_hasp);
                // lay 1 ma khuyen mai
                $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
                $khuyenmai = '0';
                $result_km = $km->search_1km_theo_masp($conn, $masp);

                if (mysqli_num_rows($result_km) > 0) {
                    $row_km = mysqli_fetch_assoc($result_km);
                    $khuyenmai = $row_km['GiamGia'];
                }
                // lay danh gia va yeu thich
                $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
                $like = 0;
                $phantramsao = 100;
                $result_dg = $dg->search_masp_indexkh($conn, $masp);
                $demlike = 0;
                $demsao = 0;
                $songuoi_danhgia = 0;
                if (mysqli_num_rows($result_dg) > 0) {
                    while ($row_dg = mysqli_fetch_assoc($result_dg)) {
                        $songuoi_danhgia++;
                        if ($row_dg['Thich'] == 1) {
                            $demlike++;
                        }
                        $demsao += $row_dg['Sao'];
                    }
                }
                if ($demlike >= 3) {
                    $like = 1;
                }
                if ($songuoi_danhgia > 0) {
                    $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
                }
                $data_item = [
                    "MaSP" => $row['MaSP'],
                    "TenSP" => $row['TenSP'],
                    "SoLuong" => $row['SoLuong'],
                    "GiaBan" => $row['GiaBan'],
                    "HinhAnh" => $row_hasp['HinhAnh'],
                    "KhuyenMai" => $khuyenmai,
                    "Like" => $like,
                    "PhanTramSao" => $phantramsao
                ];
                array_push($datarp, $data_item);
            }
        }
    }
    echo json_encode($datarp);
}
function show_phantrang_indexkh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_sp_hinhanh_search($conn);
    $sophantuhienthi = 30;
    $tongsotrang = ceil(mysqli_num_rows($result) / $sophantuhienthi);
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $datarp = "";
    if ($tranghientai > 3) {
        $datarp .= '<div class="page" data-data_page=1>First</div>';
    }
    if ($tranghientai > 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai - 1) . '>&laquo;</div>';
    }
    if ($tranghientai > 3) {
        $datarp .= '<span> ... </span>';
    }
    for ($i = 1; $i <= $tongsotrang; $i++) {
        if ($i != $tranghientai) {
            if ($i > $tranghientai - 3 && $i < $tranghientai + 3) {
                $datarp .= '<div class="page" data-data_page=' . $i . '>' . $i . '</div>';
            }
        } else {
            $datarp .= '<div style="background-color:black;color:white" class="page" data-data_page=' . $i . '>' . $i . '</div>';
        }
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<span> ... </span>';
    }
    if ($tranghientai < $tongsotrang - 1) {

        $datarp .= '<div class="page" data-data_page=' . ($tranghientai + 1) . '>&raquo;</div>';
    }
    if ($tranghientai < $tongsotrang - 2) {
        $datarp .= '<div class="page" data-data_page=' . $tongsotrang . '>Last</div>';
    }
    echo $datarp;
}

function show_SanPhamXemthem_xemct_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_index_kh($conn);
    $count_sanpham = mysqli_num_rows($result);
    $datarp = [];
    if ($count_sanpham > 4) {
        $array_rand = [];
        while (count($array_rand) <= 4) {
            $rd = rand(1, $count_sanpham);
            if (in_array($rd, $array_rand)) {
            } else {
                array_push($array_rand, $rd);
            }
        }
        $dem_sp = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem_sp++;
            if (in_array($dem_sp, $array_rand)) {
                $masp = $row['MaSP'];
                // lay 1 hinh anh
                $hasp = new HASPModel(0, 0, 0);
                $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
                $row_hasp = mysqli_fetch_assoc($result_hasp);

                $data_item = [
                    "MaSP" => $row['MaSP'],
                    "TenSP" => $row['TenSP'],
                    "HinhAnh" => $row_hasp['HinhAnh'],
                    "GiaBan" => $row['GiaBan']
                ];
                array_push($datarp, $data_item);
            }
        }
    }
    echo json_encode($datarp);
}
function show_spsearch_noaccount_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/danhgiamodel.php');
    include('./model/chitiethoadonbanmodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_index_kh($conn);
    $count_sanpham = mysqli_num_rows($result);
    $datarp = [];
    if ($count_sanpham > 5) {
        $array_rand = [];
        while (count($array_rand) <= 5) {
            $rd = rand(1, $count_sanpham);
            if (in_array($rd, $array_rand)) {
            } else {
                array_push($array_rand, $rd);
            }
        }
        $dem_sp = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem_sp++;
            if (in_array($dem_sp, $array_rand)) {
                $masp = $row['MaSP'];
                // lấy dữ liệu số lượng sản phẩm đã bán
                $daban = 0;
                $cthd = new ChiTietHoaDonBanModel(0, 0, 0, 0, 0);
                $result_cthd = $cthd->show_flashsale_indexkh($conn, $masp);
                if (mysqli_num_rows($result_cthd) > 0) {
                    while ($row_cthd = mysqli_fetch_assoc($result_cthd)) {
                        $daban += $row_cthd['SoLuong'];
                    }
                }
                // lay 1 hinh anh
                $hasp = new HASPModel(0, 0, 0);
                $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
                $row_hasp = mysqli_fetch_assoc($result_hasp);
                // lay danh gia va yeu thich
                $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
                $phantramsao = 100;
                $result_dg = $dg->search_masp_indexkh($conn, $masp);
                $demsao = 0;
                $songuoi_danhgia = 0;
                if (mysqli_num_rows($result_dg) > 0) {
                    while ($row_dg = mysqli_fetch_assoc($result_dg)) {
                        $songuoi_danhgia++;
                        $demsao += $row_dg['Sao'];
                    }
                }
                if ($songuoi_danhgia > 0) {
                    $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
                }


                $data_item = [
                    "MaSP" => $row['MaSP'],
                    "TenSP" => $row['TenSP'],
                    "HinhAnh" => $row_hasp['HinhAnh'],
                    "PhanTramSao" => $phantramsao,
                    "DaBan" => $daban
                ];
                array_push($datarp, $data_item);
            }
        }
    }
    echo json_encode($datarp);
}
function show_sp_noaccount_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/haspmodel.php');
    include('./model/khuyenmaimodel.php');
    include('./model/danhgiamodel.php');
    $tranghientai = 1;
    if (isset($_POST['tranghientai'])) {
        $tranghientai = $_POST['tranghientai'];
    }
    $sophantuhienthi = 30;
    $ptubatdau = ($tranghientai - 1) * $sophantuhienthi;

    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_index_kh_phantrang($conn, $ptubatdau, $sophantuhienthi);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $masp = $row['MaSP'];
            // lay 1 hinh anh
            $hasp = new HASPModel(0, 0, 0);
            $result_hasp = $hasp->search_1_theo_masp($conn, $masp);
            $row_hasp = mysqli_fetch_assoc($result_hasp);
            // lay 1 ma khuyen mai
            $km = new KhuyenMaiModel(0, 0, 0, 0, 0, 0);
            $khuyenmai = '0';
            $result_km = $km->search_1km_theo_masp($conn, $masp);

            if (mysqli_num_rows($result_km) > 0) {
                $row_km = mysqli_fetch_assoc($result_km);
                $khuyenmai = $row_km['GiamGia'];
            }
            // lay danh gia va yeu thich
            $dg = new DanhGiaModel(0, 0, 0, 0, 0, 0);
            $like = 0;
            $phantramsao = 100;
            $result_dg = $dg->search_masp_indexkh($conn, $masp);
            $demlike = 0;
            $demsao = 0;
            $songuoi_danhgia = 0;
            if (mysqli_num_rows($result_dg) > 0) {
                while ($row_dg = mysqli_fetch_assoc($result_dg)) {
                    $songuoi_danhgia++;
                    if ($row_dg['Thich'] == 1) {
                        $demlike++;
                    }
                    $demsao += $row_dg['Sao'];
                }
            }
            if ($demlike >= 3) {
                $like = 1;
            }
            if ($songuoi_danhgia > 0) {
                $phantramsao = (int)($demsao / ($songuoi_danhgia * 5) * 100);
            }
            // // lay server;
            // $url=$_SERVER["REQUEST_URI"];
            $data_item = [
                "MaSP" => $row['MaSP'],
                "TenSP" => $row['TenSP'],
                "SoLuong" => $row['SoLuong'],
                "GiaBan" => $row['GiaBan'],
                "HinhAnh" => $row_hasp['HinhAnh'],
                "KhuyenMai" => $khuyenmai,
                "Like" => $like,
                "PhanTramSao" => $phantramsao
                // "url"=>$url
            ];
            array_push($datarp, $data_item);
        }
    }
    echo json_encode($datarp);
}
function show_data_hasp_ha()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show_sp_hinhanh_search($conn);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value=' . $row['MaSP'] . '>' . $row['MaSP'] . '-' . $row['TenSP'] . '</option>';
        }
    } else {
        $datarp .= '<option value=null>không có sản phẩm nào</option>';
    }
    echo $datarp;
}
function show_data_sanphm_ha()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    $sanpham = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sanpham->show($conn);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value="' . $row['MaSP'] . '">' . $row['MaSP'] . '-' . $row['TenSP'] . '</option>';
        }
    } else {
        $datarp .= '<option value="null">không có sản phẩm nào</option>';
    }
    echo $datarp;
}
function show_data_sanphm_bv()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/baivietmodel.php');
    $baiviet = new BaiVietModel(0, 0, 0);
    $resultbv = $baiviet->show($conn);
    $search = '';
    while ($rowbv = mysqli_fetch_assoc($resultbv)) {
        $search .= ' MaSP != ' . $rowbv['MaSP'] . ' and ';
    }
    $search_tk = substr($search, 0, strlen($search) - 4);
    $sp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $sp->show_sp_baiviet_search($conn, $search_tk);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value="' . $row['MaSP'] . '">' . $row['MaSP'] . '-' . $row['TenSP'] . '</option>';
        }
    } else {
        $datarp .= '<option value="null">không có sản phẩm nào</option>';
    }
    echo $datarp;
}
function edit_trangthaihienthi()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/sanphammodel.php');
        $masp = $_POST['masp'];
        $trangthai = $_POST['trangthai'];
        $trangthai = $trangthai == 1 ? 0 : 1;
        $sp = new SanPhamModel(0, 0, 0, 0, 0, $trangthai, 0, 0);
        $sp->update_trangthaihienthi($conn, $masp);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
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
        include('./model/sanphammodel.php');
        include('./model/haspmodel.php');
        foreach ($file as $value) {
            $tensp = $value[0];
            $soluong = $value[1];
            $giaban = $value[2];
            $gianhap = $value[3];
            $hienan = $value[4];
            $malsp = $value[5];
            $mancc = $value[6];

            // add file sản phẩm
            $sp = new SanPhamModel(0, $tensp, $soluong, $giaban, $gianhap, $hienan, $malsp, $mancc);
            $sp->add_1($conn);

            // add file hình ảnh
            $sp_max_ma = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
            $result = $sp_max_ma->max_masp($conn);
            $masp_save = 0;
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $masp_save = $row['MaSP'];
            }
            $img1 = $value[7];
            if ($img1 != null) {
                $img_url = explode("/", $img1);
                $img_sp = $img_url[count($img_url) - 1];
                $hasp = new HASPModel(0, $masp_save, $img_sp);
                $hasp->add_1($conn);
            }
            $img2 = $value[8];
            if ($img2 != null) {
                $img_url = explode("/", $img2);
                $img_sp = $img_url[count($img_url) - 1];
                $hasp = new HASPModel(0, $masp_save, $img_sp);
                $hasp->add_1($conn);
            }
            $img3 = $value[9];
            if ($img3 != null) {
                $img_url = explode("/", $img3);
                $img_sp = $img_url[count($img_url) - 1];
                $hasp = new HASPModel(0, $masp_save, $img_sp);
                $hasp->add_1($conn);
            }
            $img4 = $value[10];
            if ($img4 != null) {
                $img_url = explode("/", $img4);
                $img_sp = $img_url[count($img_url) - 1];
                $hasp = new HASPModel(0, $masp_save, $img_sp);
                $hasp->add_1($conn);
            }
            $img5 = $value[11];
            if ($img5 != null) {
                $img_url = explode("/", $img5);
                $img_sp = $img_url[count($img_url) - 1];
                $hasp = new HASPModel(0, $masp_save, $img_sp);
                $hasp->add_1($conn);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
// 
function edit_sp_save()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/sanphammodel.php');
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $soluong = $_POST['soluong'];
        $giaban = $_POST['giaban'];
        $gianhap = $_POST['gianhap'];
        $hienan = $_POST['hienan'];
        $malsp = $_POST['malsp'];
        $mancc = $_POST['mancc'];
        $lsp = new SanPhamModel($masp, $tensp, $soluong, $giaban, $gianhap, $hienan, $malsp, $mancc);
        $lsp->update($conn, $masp);
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
    include('./model/sanphammodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $lsp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
        $result = $lsp->search_1($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaSP" => $row['MaSP'],
            "TenSP" => $row['TenSP'],
            "SoLuong" => $row['SoLuong'],
            "GiaBan" => $row['GiaBan'],
            "GiaNhap" => $row['GiaNhap'],
            "TrangThaiShow" => $row['TrangThaiShow'],
            "MaLSP" => $row['MaLSP'],
            "MaNCC" => $row['MaNCC']
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
            include('./model/sanphammodel.php');
            foreach ($arrayid as $value) {
                $lsp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
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
function delete_sp()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {


        include('./model/dbconfig.php');
        include('./model/sanphammodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}

function show_sanpham()
{
    include('./model/dbconfig.php');
    include('./model/sanphammodel.php');
    include('./model/baivietmodel.php');
    $lsp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
    $result = $lsp->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $baiviet = new BaiVietModel(0, 0, 0);
            $resultbv = $baiviet->search_sp($conn, $row['MaSP']);
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-maspxoa=' . $row['MaSP'] . ' type="checkbox">
            </td>
            <td>' . $row['MaSP'] . '</td>
            <td><img src="./upload/image/hasp/' . $row['HinhAnh'] . '" alt=""></td>
            <td>
                ' . $row['TenSP'] . '
            </td>
            <td>
            ' . $row['SoLuong'] . '
            </td>
            <td>
            ' . $row['GiaBan'] . '
            </td>
            <td>
            ' . $row['GiaNhap'] . '
            </td>';
            if ($row['TrangThaiShow'] == 1) {
                $datarp .= '<td><i class="fas fa-eye i_sp_hienthi" showhidden=1 data-masphienthi=' . $row['MaSP'] . '></i></td>';
            } else {
                $datarp .= '<td><i class="fas fa-eye-slash i_sp_hienthi" showhidden=0  data-masphienthi=' . $row['MaSP'] . '></i></td>';
            }
            $datarp .=
                '<td>
            ' . $row['TenLSP'] . '
            </td>
            <td>
            ' . $row['TenNCC'] . '
            </td>';
            if (mysqli_num_rows($resultbv) > 0) {
                $row_baiviet = mysqli_fetch_assoc($resultbv);
                $datarp .= '<td>
                ' . $row_baiviet['MaBV'] . '
                - <span data-mabaiviet=' . $row_baiviet['MaBV'] . ' class="ad_dms_content_table_thaotac_xembv" style="padding:5px;cursor: pointer;text-decoration: underline;color: #5fd192">xem</span>
                </td>';
            } else {
                $datarp .= '<td> chưa có bài viết</td>';
            }

            $datarp .= '<td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-masp_edit=' . $row['MaSP'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaSP'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="13">Không có danh mục nào</td>
    </tr>';
    }
    echo ($datarp);
}
function show_data_loaisanphm()
{
    include('./model/dbconfig.php');
    include('./model/loaisanphammodel.php');
    $lsp = new LoaiSanPhamModel(0, 0, 0, 0);
    $result = $lsp->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value="' . $row['MaLSP'] . '">' . $row['MaLSP'] . '-' . $row['TenLSP'] . '</option>';
        }
    } else {
        $datarp .= '<option value="null">không có loại sản phẩm nào</option>';
    }
    echo $datarp;
}
function show_data_nhacungcap()
{
    include('./model/dbconfig.php');
    include('./model/nhacungcapmodel.php');
    $ncc = new NhaCungCapModel(0, 0, 0, 0);
    $result = $ncc->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value="' . $row['MaNCC'] . '">' . $row['MaNCC'] . '-' . $row['TenNCC'] . '</option>';
        }
    } else {
        $datarp .= '<option value="null">không có nhà cung cấp nào</option>';
    }
    echo $datarp;
}
function add_save()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/sanphammodel.php');
        $tensp = "";
        if (isset($_POST['tensp'])) {
            $tensp = $_POST['tensp'];
        }
        $soluong = "";
        if (isset($_POST['soluong'])) {
            $soluong = $_POST['soluong'];
        }
        $giaban = "";
        if (isset($_POST['giaban'])) {
            $giaban = $_POST['giaban'];
        }
        $gianhap = "";
        if (isset($_POST['gianhap'])) {
            $gianhap = $_POST['gianhap'];
        }
        $hienan = "";
        if (isset($_POST['hienan'])) {
            $hienan = $_POST['hienan'];
        }
        $malsp = "";
        if (isset($_POST['malsp'])) {
            $malsp = $_POST['malsp'];
        }
        $mancc = "";
        if (isset($_POST['mancc'])) {
            $mancc = $_POST['mancc'];
        }

        $lsp = new SanPhamModel(0, $tensp, $soluong, $giaban, $gianhap, $hienan, $malsp, $mancc);
        if ($lsp->add_1($conn)) {
        } else {
            $data = [
                'add_messages' => 'error'
            ];
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}


// 
