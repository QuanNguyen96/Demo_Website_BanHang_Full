<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- css index -->
    <link rel="stylesheet" href="./css/index.css">
    <!-- css header -->
    <link rel="stylesheet" href="./css/header.css">
    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- css shoppemail_silder -->
    <link rel="stylesheet" href="Css/shopeemail_slider.css">
    <style>
        .xacthuctaikhoan {
            max-width: var(--body-width);
            margin: 0 auto;
            background-color: #ffffff;
            position: relative;
            padding: 10px 20px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include_once("header.php") ?>
    <div class="xacthuctaikhoan">
        <div>
            <?php
            require_once('vendor\firebase\php-jwt\src\JWT.php');

            use Firebase\JWT\JWT;
            use JWT_Token as GlobalJWT_Token;

            class JWT_Token
            {
                private $data;
                private $secret_key;
                private $mahoa = "HS256";
                public function JWT_Token($_data, $_secret_key)
                {
                    $this->data = $_data;
                    $this->secret_key = $_secret_key;
                }
                public function token_encode()
                {
                    return JWT::encode($this->data, $this->secret_key, $this->mahoa);
                }
                public function token_decode($jwt_token, $sk)
                {
                    return JWT::decode($jwt_token, $sk, array($this->mahoa));
                }
            };
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $secret_key = "MAT_KHAU_XAC_THUC";
                $token_xacthuc = new JWT_Token(0, $secret_key);
                $token_decode = $token_xacthuc->token_decode($token, $secret_key);
                $taikhoan = $token_decode;
                include('./model/dbconfig.php');
                include('./model/khachhangmodel.php');
                // check tai khoarn ton tai
                $kh = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
                $result = $kh->check_account_register($conn, $taikhoan);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['TrangThaiTK'] == 1) {
                        echo "Tài khoản này đã được kích hoạt...";
                    } else {
                        $kh->kichhoat_account_register($conn, $taikhoan);
                        echo "Kích hoạt thành công tài khoản " . $taikhoan;
                    }
                } else {
                    die();
                }
                $_SESSION['username']=$taikhoan;
            } else {
                echo "Link xác thực không tồn tại, hoặc xảy ra lỗi ngoại lệ xin vui lòng kiểm tra lại....";
            }

            ?>
        </div>
        <div>
            <a href="./login.php" style="color:blue">Click để đăng nhập</a>   
        </div>
    </div>

</body>

</html>