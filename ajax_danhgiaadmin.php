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
        case "add_save_dg": {
                add_save_dg();
                break;
            }
        case "show_dg": {
                show_dg();
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
        case "update_danhgia_dg": {
                update_danhgia_dg();
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
    }
}
//
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
        include('./model/danhgiamodel.php');
        foreach ($file as $value) {
            $sao = $value[0];
            $thich=$value[1];
            $masp = $value[2];
            $makh = $value[3];
            $dg = new DanhGiaModel(0, $sao, $thich, $masp, $makh);
            $resultkt = $dg->search_masp_makh($conn, $masp, $makh);
            if (mysqli_num_rows($resultkt) > 0) {
                $row = mysqli_fetch_assoc($resultkt);
                $madg = $row['MaDG'];
                $dg->update($conn,  $madg);
            } else {
                $dg->add_1($conn);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
function update_danhgia_dg()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/danhgiamodel.php');
        $masp = $_POST['masp'];
        $makh = $_POST['makh'];
        $madg = $_POST['madg'];
        $sao = $_POST['sao'];
        $thich = $_POST['thich'];
        $dg = new DanhGiaModel(0, $sao,$thich, $masp, $makh);
        $dg->update($conn,  $madg);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
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
            include('./model/danhgiamodel.php');
            foreach ($arrayid as $value) {
                $lsp = new DanhGiaModel(0, 0, 0, 0, 0);
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
        include('./model/danhgiamodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new DanhGiaModel(0, 0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_dg()
{
    include('./model/dbconfig.php');
    include('./model/danhgiamodel.php');
    $dg = new DanhGiaModel(0, 0, 0, 0, 0);
    $result = $dg->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-mabvxoa=' . $row['MaDG'] . ' type="checkbox">
            </td>
            <td>
            ' . $row['MaDG'] . ' 
            </td> 
            <td>';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $row['Sao']) {
                    $datarp .= '<i class="fas fa-star" style="color:red"></i>';
                } else {
                    $datarp .= '<i class="fas fa-star" style="color:#d5bcbc"></i>';
                }
            }
            $datarp .= '</td>';
            if ($row['Thich'] == 1) {
                $datarp .= '<td>
                               1 - đã thích
                            </td> ';
            } else {
                $datarp .= '<td>
                                0 - chưa thích
                            </td> ';
            }
            $datarp .= '
            <td>  ' . $row['MaSP'] . '</td>
            <td>  ' . $row['MaKH'] . '</td>
            <td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-thich=' . $row['Thich'] . ' data-masp=' . $row['MaSP'] . ' data-makh=' . $row['MaKH'] . ' data-sao=' . $row['Sao'] . ' data-madg=' . $row['MaDG'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaDG'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="7">Không có đánh giá nào</td>
    </tr>';
    }
    echo ($datarp);
}
function add_save_dg()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/danhgiamodel.php');
        $masp = $_POST['masp'];
        $makh = $_POST['makh'];
        $sao = $_POST['sao'];
        $thich = $_POST['thich'];
        $dg = new DanhGiaModel(0, $sao, $thich , $masp, $makh);
        $resultkt = $dg->search_masp_makh($conn, $masp, $makh);
        if (mysqli_num_rows($resultkt) > 0) {
            $row = mysqli_fetch_assoc($resultkt);
            $madg = $row['MaDG'];
            $dg->update($conn,  $madg);
            $data['messages'] = 'update thành công ';
        } else {
            $dg->add_1($conn);
            $data['messages'] = 'thêm thành công ';
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
