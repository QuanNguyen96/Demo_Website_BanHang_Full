<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save": {
                add_loaisanpham();
                break;
            }
        case "show": {
                show_loaisanpham();
                break;
            }
        case "datadm": {
                add_showdm();
                break;
            }
        case "delete": {
                delete_loaisanpham();
                break;
            }
        case "delete_nhieu": {
                delete_loaisanpham_nhieu();
                break;
            }
        case "edit_show": {
                edit_show();
                break;
            }
        case "edit_save_coupload": {
                edit_save_coupload();
                break;
            }
        case "edit_save_koupload": {
                edit_save_koupload();
                break;
            }
    }
}
function add_showdm()
{
    include('./model/dbconfig.php');
    include('./model/danhmucmodel.php');
    $dm = new DanhMucModel(0, 0, 0);
    $result = $dm->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value="' . $row['MaDM'] . '">' . $row['MaDM'] . '-' . $row['TenDM'] . '</option>';
        }
    } else {
        $datarp .= '<option value="null">không có danh mục nào</option>';
    }
    echo $datarp;
}
function edit_save_koupload()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/loaisanphammodel.php');
        $malsp = $_POST['malsp'];
        $tenlsp = $_POST['tenlsp'];
        $madm = $_POST['madm'];
        $lsp = new LoaiSanPhamModel(0, $tenlsp, 0, $madm);
        $lsp->update_noupload($conn, $malsp);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function edit_save_coupload()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/loaisanphammodel.php');
        $malsp = $_POST['malsp'];
        $tenlsp = $_POST['tenlsp'];
        $madm = $_POST['madm'];
        $file_HALSP = $_FILES['file_hadm_edit'];
        $lsp = new LoaiSanPhamModel(0, $tenlsp, $file_HALSP['name'],$madm);
        $lsp->update($conn, $malsp);
        // add file anh 
        $Path = "./upload/image/loaisanpham/";
        $Path = $Path . basename($file_HALSP['name']);
        move_uploaded_file($file_HALSP['tmp_name'], $Path);
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
    include('./model/loaisanphammodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $lsp = new LoaiSanPhamModel(0, 0, 0, 0);
        $result = $lsp->search_1dm($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaLSP" => $row['MaLSP'],
            "TenLSP" => $row['TenLSP'],
            "HALSP" => $row['HALSP'],
            "MaDM" => $row['MaDM'],
            "TenDM" => $row['TenDM']
        ];
        echo json_encode($data);
    }
}
function delete_loaisanpham_nhieu()
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
            include('./model/loaisanphammodel.php');
            foreach ($arrayid as $value) {
                $lsp = new LoaiSanPhamModel(0, 0, 0, 0);
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
function delete_loaisanpham()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {


        include('./model/dbconfig.php');
        include('./model/loaisanphammodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new LoaiSanPhamModel(0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_loaisanpham()
{
    include('./model/dbconfig.php');
    include('./model/loaisanphammodel.php');
    $lsp = new LoaiSanPhamModel(0, 0, 0, 0);
    $result = $lsp->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-malspxoa=' . $row['MaLSP'] . ' type="checkbox">
            </td>
            <td>' . $dem . '</td>
            <td><img src="./upload/image/loaisanpham/' . $row['HALSP'] . '" alt=""></td>
            <td>
                ' . $row['TenLSP'] . '
            </td>
            <td>
            ' . $row['TenDM'] . '
            </td>
            <td class="ad_dms_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-malsp_edit=' . $row['MaLSP'] . ' toggle="tooltip"  title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-malsp=' . $row['MaLSP'] . ' toggle="tooltip" title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="6">Không có loại sản phẩm nào</td>
    </tr>';
    }
    echo ($datarp);
}

function add_loaisanpham()
{

    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/loaisanphammodel.php');

        $file_hadm = [];
        if (isset($_FILES['file_hadm'])) {
            $file_hadm = $_FILES['file_hadm'];
        }
        $tenlsp = "";
        if (isset($_POST['tenlsp'])) {
            $tenlsp = $_POST['tenlsp'];
        }
        // validate ko chon file
        if (!isset($file_hadm['name'])) {
            $file_hadm['name'] = "";
        }
        $madm = $_POST['madm'];
        $lsp = new LoaiSanPhamModel(0, $tenlsp, $file_hadm['name'], $madm);
        if ($lsp->add_1($conn)) {
        } else {
            $data = [
                'add_messages' => 'error'
            ];
        }
        // add file anh 
        $Path = "./upload/image/loaisanpham/";
        $Path = $Path . basename($file_hadm['name']);
        move_uploaded_file($file_hadm['tmp_name'], $Path);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}

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
    $imageFilePath = './upload/image/loaisanpham/'; //Path of picture local storage
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
if (isset($_POST['action']) && $_POST['action'] == 'read_filexecl') {
    if (isset($_FILES['dm_ad_them_content_excel_fileupload'])) {
        $filename = $_FILES['dm_ad_them_content_excel_fileupload']['tmp_name'];
        echo json_encode(readfile_excel_json($filename));
    }
}
// end readfile excel
if (isset($_POST['action']) && $_POST['action'] == 'add_excel_save') {
    if (isset($_FILES['dm_ad_them_content_excel_fileupload'])) {
        $filename = $_FILES['dm_ad_them_content_excel_fileupload']['tmp_name'];
        $data = readsavefile_excel_json($filename);
        echo add_loaisanpham_excel($data, $filename);
    }
}

// function add danh muc excel
function add_loaisanpham_excel($file, $filegoc)
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/loaisanphammodel.php');
        foreach ($file as $value) {
            $tenlsp = $value[0];
            $madm=$value[1];
            $img = $value[2];
            $img_array = explode("/", $img);
            $file_HALSP = $img_array[count($img_array) - 1];
            $lsp = new LoaiSanPhamModel(0, $tenlsp, $file_HALSP,$madm);
            $lsp->add_1($conn);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
