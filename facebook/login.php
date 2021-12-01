<?php
include("./vendor/autoload.php");
session_start();
// $fb = new \Facebook\Facebook([
//     "app_id" => "579600703081104",
//     "app_secret" => "4ad56ee5486f2c672b7e1438a477755c",
//     "default_graph_version" => "v12.0",
// ]);
$fb = new \Facebook\Facebook([
    "app_id" => "484471736288380",
    "app_secret" => "cb6de36fb38ca2e45742fb813cbe07b6",
    "default_graph_version" => "v12.0",
]);
$helper = $fb->getRedirectLoginHelper();
try {
    if (isset($_GET['code'])) {
        if (isset($_SESSION['access_token'])) {
            $access_token = $_SESSION['access_token'];
        } else {
            $access_token = $helper->getAccessToken();

            $_SESSION['access_token'] = $access_token;
            $fb->setDefaultAccessToken($_SESSION['access_token']);
        }

        $graph_response = $fb->get("/me?fields=name,picture,short_name,email,id,first_name,last_name,middle_name", $access_token);
        $facebook_user_info = $graph_response->getGraphUser();
        $_SESSION['usernameDQ'] = $facebook_user_info['name'];
        $_SESSION['pthuc'] = "facebook";
        $_SESSION['emailDQ'] = $facebook_user_info['email'];
        $_SESSION['user_id'] = $facebook_user_info['id'];
        // $_SESSION['first_name'] = $facebook_user_info['first_name'];
        // $_SESSION['last_name'] = $facebook_user_info['last_name'];
        // $_SESSION['picture'] = $facebook_user_info['picture'];
        // $_SESSION['short_name'] = $facebook_user_info['short_name'];
        $request_picture = $fb->get("/me/picture?redirect=false", $access_token);
        $fbpic = $request_picture->getGraphUser();
        $_SESSION['user_pic'] = $fbpic;
        unset($_SESSION['login_facebook_url']);
        // thêm dữ liệu tài khoản vào csdl
        include('../model/dbconfig.php');
        include('../model/khachhangmodel.php');
        $taikhoan = "";
        $matkhau = "";
        $tenkh =  $_SESSION['usernameDQ'];
        $facebook = "https://www.facebook.com/profile.php?id=" . $_SESSION['user_id'];

        $email = $_SESSION['emailDQ'];
        $address = "";
        $sdt = "";
        $hienthi = 2;
        // check tai khoarn ton tai
        $kh = new KhachHangModel(0, $taikhoan, $matkhau, $tenkh, $facebook, $email, $address, $sdt, $hienthi);
        $result = $kh->check_account_facebook($conn, $email);
        if (mysqli_num_rows($result) > 0) {
        } else {
            $kh->add_1($conn);
        }
        // lấy mã kh
        $result_search = $kh->search_account_facebook_gmail($conn);
        if (mysqli_num_rows($result_search) > 0) {
            $row_search = mysqli_fetch_assoc($result_search);
            $_SESSION['MaKH'] = $row_search['MaKH'];
        }

        header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/');
    } else {

        $permissions = ['email'];
        $login_url = $helper->getLoginUrl('https://quannguyen.com/du%20an%20website%20ban%20hang/facebook/login.php', $permissions);
        $_SESSION['login_facebook_url'] = $login_url;
        header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/login.php');
    }
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "vao 3";
    unset($_SESSION['login_facebook_url']);
    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/login.php');
}
