<?php
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
$fileimg=[
    0=>["","","","","H11682.jpeg"],
    1=>["","","","","H11798.jpeg"],
];
$body='<img src="./uploads/2017/09/phan-biet-file-anh-jpg-va-png2.png" alt="">
<img src="./uploads/2017/09/phan-biet-file-anh-jpg-va-png2.png" alt="">';

echo $body;
send_mail("quannguyen9692@gmail.com", "khachhang", "test", $body, [], []);
?>




