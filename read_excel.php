<?php
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
    $imageFilePath = './uploads/imgs/'; //Path of picture local storage
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
    return json_encode($data);
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
if (isset($_POST['action']) && $_POST['action'] == 'add_filexecl') {
    if (isset($_FILES['dm_ad_them_content_excel_fileupload'])) {
        $filename = $_FILES['dm_ad_them_content_excel_fileupload']['tmp_name'];
        echo readfile_excel_json($filename);
    }
}
