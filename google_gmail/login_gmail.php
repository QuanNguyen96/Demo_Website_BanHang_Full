<?php
session_start();
require_once("./vendor/autoload.php");

// init configuration
$google_client_ID = '745469578127-au6lmtusk99mr2dtp15q35g7rb9uvvqa.apps.googleusercontent.com';
$google_client_Secret = 'X9VqV6hNE7icK9EEvzYNO537';
$redirectUri = 'https://quannguyen.com/du%20an%20website%20ban%20hang/google_gmail/login_gmail.php';


// create Client Request to access Google API
$google_client = new Google_Client();
$google_client->setClientId($google_client_ID);
$google_client->setClientSecret($google_client_Secret);
$google_client->setRedirectUri($redirectUri);
$google_client->addScope("email");
$google_client->addScope("profile");

if (isset($_GET["code"])) {
  //It will Attempt to exchange a code for an valid authentication token.
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  if (!isset($token['error'])) {
    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);

    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];
    // get profile info
    $google_oauth = new Google_Service_Oauth2($google_client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $_SESSION['usernameDQ'] = $name;
    $_SESSION['emailDQ'] = $email;
    $_SESSION['pthuc'] = "gmail";
    if (isset($_SESSION['login_gmail_url'])) {
      unset($_SESSION['login_gmail_url']);
    }
    // thêm dữ liệu tài khoản vào csdl
    include('../model/dbconfig.php');
    include('../model/khachhangmodel.php');
    $taikhoan = "";
    $matkhau = "";
    $tenkh =  $_SESSION['usernameDQ'];
    $facebook = "";

    $email = $_SESSION['emailDQ'];
    $address = "";
    $sdt = "";
    $hienthi = 2;
    // check tai khoarn ton tai
    $kh = new KhachHangModel(0, $taikhoan, $matkhau, $tenkh, $facebook, $email, $address, $sdt, $hienthi);
    $result = $kh->check_account_facebook($conn, $email);
    if (mysqli_num_rows($result) > 0) {
      if (mysqli_num_rows($result) == 1) {
        $row_kt = mysqli_fetch_assoc($result);
        if ($row_kt["FaceBook"] != ''){
          $kh->add_1($conn);
        }
      }
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
  }
} else {
  $login_gmail_url = $google_client->createAuthUrl();
  $_SESSION['login_gmail_url'] = $login_gmail_url;
  header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/login.php');
}
