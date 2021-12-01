<?php
session_start();
include("PHPMailer-master/src/PHPMailer.php");
include("PHPMailer-master/src/SMTP.php");
include('PHPMailer-master/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function send_mail($nguoinhan, $tennguoinhan, $subject, $body, $file_Attachment, $fileimg)
{
    $mail = new PHPMailer(true);
    try {
        $nguoigui = 'quan96kun@gmail.com';
        $matkhau = 'zdhaidfqvzrvweqa';
        $tennguoigui = 'Shop D&Q';
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = $nguoigui;
        $mail->Password = $matkhau;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($nguoigui, $tennguoigui);

        $mail->addAddress($nguoinhan, $tennguoinhan);
        //  $mail->addAddress('quan96it.sami.hust.edu@gmail.com', 'tai khoan 2 cua quan');     // Add a recipient gui sang 1 email khac
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        //$read=$file_Attachment['tmp_name'];
        //  $soluongfile=count($file_Attachment['name']);
        //  if($soluongfile>0)
        //  {
        //     for ($i = 0; $i < $soluongfile; $i++) {
        //         $mail->addAttachment($file_Attachment['tmp_name'][$i], $file_Attachment['name'][$i]);
        //     }
        //  }

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $soluongimg = count($fileimg);
        if ($soluongimg > 0) {
            for ($j = 0; $j < $soluongimg; $j++) {
                $mail->addEmbeddedImage(dirname(__FILE__) . "./upload/image/hasp/" . $fileimg[$j][4] . "", $fileimg[$j][4]);
            }
        }
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
    } catch (Exception $e) {
    }
    return false;
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "sendmail_pagegiohang": {
                sendmail_pagegiohang();
                break;
            }
    }
}
function sendmail_pagegiohang()
{
    $datarp = [
        'add_messages' => 'sucessfully'
    ];
    if (isset($_SESSION['MaKH'])) {
        $makh = $_SESSION['MaKH'];
    }
    include('./model/dbconfig.php');
    include('./model/khachhangmodel.php');
    include('./model/hoadonbanmodel.php');
    include('./model/chitiethoadonbanmodel.php');
    include('./model/accountmodel.php');
    include('./model/thuemodel.php');
    include('./model/giaohangmodel.php');
    $khachhang = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $khachhang->search_1($conn, $makh);
    $row = mysqli_fetch_assoc($result);
    $to_email = $row['Email'];
    if ($_POST['email'] != '') {
        $to_email = $_POST['email'];
    }
    $tenkh = $row['TenKH'];
    if ($_POST['tenkh'] != '') {
        $tenkh = $_POST['tenkh'];
    }
    $diachinhan = "";
    if ($_POST['diachinhan'] != '') {
        $diachinhan = $_POST['diachinhan'];
    }
    $sdt = $row['SDT'];
    if ($_POST['sdt'] != '') {
        $sdt = $_POST['sdt'];
    }
    $body = $_POST['noidung'];
    $filegh = $_POST['giohang'];
    $filegh = json_decode($filegh);
    $file = [];
    $subject = "Thông tin đơn đặt hàng tại shop D&Q";
    if(send_mail($to_email,$tenkh,$subject,$body,$file,$filegh)==false){
        $datarp = [
            'add_messages' => 'error'
        ];
        exit();
        return 0;
    }

    try {

 
    // them csdl bang hoa don ban
        // để mặc định mã admin =1;
        $MaAD = 1;
        // lấy 1 mã admin
        $acc = new AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result_acc = $acc->search_MaAD_pagegiohang($conn);
        if (mysqli_num_rows($result_acc) > 0) {
            $row_acc = mysqli_fetch_assoc($result_acc);
            $MaAD = $row_acc['MaAD'];
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Date = date("Y/m/d H:i:s");
        $SoLuong = $_POST['tongsoluong'];
        $TongTien = $_POST['tongtien'];
        $MaThue = 1;
        // lấy 1 mã thue
        $thue = new ThueModel(0, 0, 0);
        $result_thue = $thue->search_MaT_pagegiohang($conn);
        if (mysqli_num_rows($result_thue) > 0) {
            $row_thue = mysqli_fetch_assoc($result_thue);
            $MaThue = $row_thue['MaT'];
        }
        $TrangThai = 1;
        $MaKH = $makh;
        $MaGH = 1;
        // lấy 1 mã giao hang
        $giaohang = new GiaoHangModel(0, 0, 0, 0, 0);
        $result_giaohang = $giaohang->search_MaGH_pagegiohang($conn);
        if (mysqli_num_rows($result_giaohang) > 0) {
            $row_giaohang = mysqli_fetch_assoc($result_giaohang);
            $MaGH = $row_giaohang['MaGH'];
        }
        $EmailDat = $to_email;
        $DiaChiDat = $diachinhan;
        $SDTDat = $sdt;
        $hoadonban = new HoaDonBanModel(0, $MaAD, $Date, $SoLuong, $TongTien, $MaThue, $TrangThai, $MaKH, $MaGH, $EmailDat, $DiaChiDat, $SDTDat);
        $hoadonban->add_1($conn);

        //them co so du lieu bang chi tiet hoa don
        //lay ma hoa don ban
        $result_hdb = $hoadonban->search_MaHDB_pagegiohang($conn);
        $row_hdb = mysqli_fetch_assoc($result_hdb);
        $MaHDB = $row_hdb['MaHDB'];
        for ($i = 0; $i < count($filegh); $i++) {
            $MaSP = $filegh[$i][0];
            $sluong_sp = $filegh[$i][3];
            $dongia_sp = $filegh[$i][2];
            $km_sp = "";
            $ct_hoadonban = new ChiTietHoaDonBanModel($MaHDB, $MaSP, $sluong_sp, $dongia_sp, $km_sp);
            $ct_hoadonban->add_1($conn);
        }
    }catch(Exception $ex){
        $datarp = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($datarp);
}

