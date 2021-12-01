<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add": {
                add_danhmuc();
                break;
            }
        case "show": {
                show_danhmuc();
                break;
            }
        case "delete": {
                delete_danhmuc();
                break;
            }
        case "delete_nhieu": {
                delete_danhmuc_nhieu();
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

            // ben index khach hang - user
        case "show_index_kh": {
                show_index_kh();
                break;
            }
        case "show_danhmuc_searchsp_kh": {
                show_danhmuc_searchsp_kh();
                break;
            }
        case "show_adddanhmuc_searchsp_kh": {
                show_adddanhmuc_searchsp_kh();
                break;
            }
    }
}
function show_adddanhmuc_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/danhmucmodel.php');
    $dm = new DanhMucModel(0, 0, 0);
    $result = $dm->show($conn);
    $dem = 0;
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            if ($dem > 5) {
                $data_item = [
                    "MaDM" => $row['MaDM'],
                    "TenDM" => $row['TenDM']
                ];
                array_push($datarp, $data_item);
            }
        }
    }
    echo json_encode($datarp);
}
function show_danhmuc_searchsp_kh()
{
    include('./model/dbconfig.php');
    include('./model/danhmucmodel.php');
    $dm = new DanhMucModel(0, 0, 0);
    $result = $dm->show($conn);
    $dem = 0;
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            if ($dem <= 5) {
                $data_item = [
                    "MaDM" => $row['MaDM'],
                    "TenDM" => $row['TenDM']
                ];
                array_push($datarp, $data_item);
            } else {
                break;
            }
        }
    }
    echo json_encode($datarp);
}
function show_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/danhmucmodel.php');
    $dm = new DanhMucModel(0, 0, 0);
    $result = $dm->show($conn);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "MaDM" => $row['MaDM'],
                "HADM" => $row['HADM'],
                "TenDM" => $row['TenDM']
            ];
            array_push($datarp, $data_item);
        }
    }
    echo json_encode($datarp);
}
function edit_save_koupload()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/danhmucmodel.php');
        $madm = $_POST['madm'];
        $tendm = $_POST['tendm'];
        $dm = new DanhMucModel(0, $tendm, "");
        $dm->update_noupload($conn, $madm);
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
        include('./model/danhmucmodel.php');
        $madm = $_POST['madm'];
        $tendm = $_POST['tendm'];
        $file_hadm = $_FILES['file_hadm_edit'];
        $dm = new DanhMucModel(0, $tendm, $file_hadm['name']);
        $dm->update($conn, $madm);
        // add file anh 
        $Path = "./upload/image/danhmuc/";
        $Path = $Path . basename($file_hadm['name']);
        move_uploaded_file($file_hadm['tmp_name'], $Path);
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
    include('./model/danhmucmodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $dm = new DanhMucModel(0, 0, 0);
        $result = $dm->search_1dm($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaDM" => $row['MaDM'],
            "TenDM" => $row['TenDM'],
            "HADM" => $row['HADM']
        ];
        echo json_encode($data);
    }
}
function delete_danhmuc_nhieu()
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
            include('./model/danhmucmodel.php');
            foreach ($arrayid as $value) {
                $dm = new DanhMucModel(0, 0, 0);
                $dm->delete($conn, $value);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function delete_danhmuc()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {


        include('./model/dbconfig.php');
        include('./model/danhmucmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $dm = new DanhMucModel(0, 0, 0);
            $dm->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_danhmuc()
{
    include('./model/dbconfig.php');
    include('./model/danhmucmodel.php');
    $dm = new DanhMucModel(0, 0, 0);
    $result = $dm->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-madmxoa=' . $row['MaDM'] . ' type="checkbox">
            </td>
            <td>' . $dem . '</td>
            <td><img src="./upload/image/danhmuc/' . $row['HADM'] . '" alt=""></td>
            <td>
                ' . $row['TenDM'] . '
            </td>
            <td class="ad_dms_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-madmedit=' . $row['MaDM'] . ' toggle="tooltip"  title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-madm=' . $row['MaDM'] . ' toggle="tooltip" title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="5">Không có danh mục nào</td>
    </tr>';
    }
    echo ($datarp);
}

function add_danhmuc()
{

    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/danhmucmodel.php');

        $file_hadm = [];
        if (isset($_FILES['file_hadm'])) {
            $file_hadm = $_FILES['file_hadm'];
        }
        $tendm = "";
        if (isset($_POST['tendm'])) {
            $tendm = $_POST['tendm'];
        }
        // validate ko chon file
        if (!isset($file_hadm['name'])) {
            $file_hadm['name'] = "";
        }
        $dm = new DanhMucModel(0, $tendm, $file_hadm['name']);
        if ($dm->add_1($conn)) {
        } else {
            $data = [
                'add_messages' => 'error'
            ];
        }
        // add file anh 
        $Path = "./upload/image/danhmuc/";
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
    $imageFilePath = './upload/image/danhmuc/'; //Path of picture local storage
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
        echo add_danhmuc_excel($data, $filename);
    }
}

// function add danh muc excel
function add_danhmuc_excel($file, $filegoc)
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/danhmucmodel.php');
        $index = -1;
        foreach ($file as $value) {
            $index++;
            $tendm = $value[0];
            $img = $value[1];
            $img_array = explode("/", $img);
            $file_hadm = $img_array[count($img_array) - 1];
            $dm = new DanhMucModel(0, $tendm, $file_hadm);
            $dm->add_1($conn);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
