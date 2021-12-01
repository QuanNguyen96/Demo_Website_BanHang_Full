<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "addncc_1": {
                addncc_1();
                break;
            }
        case "show": {
                show_load_ncc();
                break;
            }
        case "delete": {
                delete_load_ncc();
                break;
            }
        case "delete_nhieu": {
                delete_ncc_nhieu();
                break;
            }
        case "edit_show": {
                edit_show();
                break;
            }
        case "edit_save": {
                edit_save();
                break;
            }
    }
}
function edit_save()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/nhacungcapmodel.php');
        $MaNCC = $_POST['MaNCC'];
        $TenNCC = $_POST['TenNCC'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        $SDT = $_POST['SDT'];
        $lsp = new NhaCungCapModel($TenNCC,  $Address,  $Email,  $SDT);
        $lsp->update($conn, $MaNCC);
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
    include('./model/nhacungcapmodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $lsp = new NhaCungCapModel(0, 0, 0, 0);
        $result = $lsp->search_1dm($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaNCC" => $row['MaNCC'],
            "TenNCC" => $row['TenNCC'],
            "Address" => $row['Address'],
            "Email" => $row['Email'],
            "SDT" => $row['SDT']
        ];
        echo json_encode($data);
    }
}
function delete_ncc_nhieu()
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
            include('./model/nhacungcapmodel.php');
            foreach ($arrayid as $value) {
                $lsp = new NhaCungCapModel(0, 0, 0, 0);
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
function delete_load_ncc()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/nhacungcapmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new NhaCungCapModel(0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_load_ncc()
{
    include('./model/dbconfig.php');
    include('./model/nhacungcapmodel.php');
    $lsp = new NhaCungCapModel(0, 0, 0, 0);
    $result = $lsp->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-manccxoa=' . $row['MaNCC'] . ' type="checkbox">
            </td>
            <td>' . $dem . '</td>
            <td>' . $row['MaNCC'] . '</td>
            <td>' . $row['TenNCC'] . '</td>
            <td>' . $row['Address'] . '</td>
            <td>' . $row['Email'] . '</td>
            <td>' . $row['SDT'] . ' </td>
            <td class="ad_dms_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-mancc_edit=' . $row['MaNCC'] . ' toggle="tooltip"  title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-mancc_delete=' . $row['MaNCC'] . ' toggle="tooltip" title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="8">Không có nhà cung cấp nào</td>
    </tr>';
    }
    echo ($datarp);
}
function addncc_1()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/nhacungcapmodel.php');

        $tenncc = "";
        if (isset($_POST['tenncc'])) {
            $tenncc = $_POST['tenncc'];
        }
        $diachi = "";
        if (isset($_POST['tenncc'])) {
            $diachi = $_POST['diachi'];
        }
        $email = "";
        if (isset($_POST['tenncc'])) {
            $email = $_POST['email'];
        }
        $sdt = "";
        if (isset($_POST['tenncc'])) {
            $sdt = $_POST['sdt'];
        }
        $lsp = new NhaCungCapModel($tenncc, $diachi, $email, $sdt);
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
// add file excel
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
        $data = readfile_excel_json($filename);
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
        include('./model/nhacungcapmodel.php');
        foreach ($file as $value) {
            $tenncc = $value[0];
            $diachi = $value[1];
            $email = $value[2];
            $sdt = $value[3];
            $lsp = new NhaCungCapModel($tenncc, $diachi, $email, $sdt);
            $lsp->add_1($conn);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    return json_encode($data);
}
