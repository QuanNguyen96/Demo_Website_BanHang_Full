<?php
require_once './vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Google\Service\Firestore\Write;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include("../model/dbconfig.php");
include("../model/hoadonbanmodel.php");
include("../model/haspmodel.php");
$html = '';
$hoadonban = new   HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$result_data = $hoadonban->baocaoexcel($conn);
$demtang=0;
if (mysqli_num_rows($result_data) > 0) {
    //lay du lieu data
   
    $tongtien=0;
    while ($row_data = mysqli_fetch_assoc($result_data)) {
        $tongtien+=(int)($row_data['ThanhTien']);
        $demtang++;
        //lay hinh anh
        $hasp=new HASPModel(0,0,0);
        $result_hasp=$hasp->search_1_theo_masp($conn,$row_data['MaSP']);
        
        $hinhanh="";
        if(mysqli_num_rows($result_hasp)>0){
            $row_hasp=mysqli_fetch_assoc($result_hasp);
            $hinhanh=$row_hasp['HinhAnh'];
        }
        $html .= '
        <tr>
            <td>'.$demtang.'</td>
            <td>'.$row_data['TenSP'].'</td>
            <td><img src="../upload/image/hasp/'.$hinhanh.'"></td>
            <td>'.$row_data['date'].'</td>
            <td>'.number_format($row_data['SoLuong']).'</td>
            <td>'.number_format($row_data['DonGia']).'</td>
            <td>'.number_format($row_data['ThanhTien']).'</td>
            
        </tr>';
    }
    $html .= '<tr>
    <td colspan="3"></td>
    <td colspan="2">Tổng tiền</td>
    <td colspan="2"> '.number_format($tongtien).'</td>
    </tr>';
}

$page='<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{ font-family: DejaVu Sans !important;}
        .data_excel {
            border-collapse: collapse;
            text-align: center;
            width: 100%;
            font-size: 14px;
        }

        .data_excel th,
        td {
            border: 1px solid #ccc;
            padding: 3px 8px;
        }

        .data_excel img {
            width: 80px;
            height: 80px;
        }
      </style>
</head>

<body>';
$page.='
<div class="theheaderpdf">
            <img src="hinh1.jpg" width="50" height="50" alt="">
            <span>SHOP quần áo cao cấp thương hiệu D & Q</span>

        </div>
<h2>công ty TNHH 1 thành viên phiếu nhập hàng</h2>
<table class="data_excel">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Ngày Bán</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>';
        $page.=$html;
        $page.='</table></body></html>';
//$page = mb_convert_encoding($page, 'HTML-ENTITIES', 'UTF-8');  
// để xét được tiếng việt thì phải khai báo utf8 trên thẻ meta và dung $page = mb_convert_encoding($page, 'HTML-ENTITIES', 'UTF-8');  


$dulieu=file_get_contents("dltest.html");


$dompdf->loadHtml($page) ;

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream("my.pdf",["Attachment"=>false]);   //vừa xem vừa tải 
$dompdf->stream('my.pdf',array('Attachment'=>0));     // xem ko tải
// có array ["Attachment"=>false] thì sẽ view trực tiếp còn ko có thì chỉ có tải về luôn
