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
      $_SESSION['usernameDQ']=$name;
      $_SESSION['emailDQ']=$email;
    //   echo '<h1>Thông tin Email</h1>';
    //   echo '<table>
    //   <tr>
    //     <th>Email</th>
    //     <td>' . $email . '</td>
    //   </tr>
    //   <tr>
    //     <th>Name</th>
    //     <td>' . $name . '</td>
    //   </tr>
    //   <tr>
    //     <th>picture</th>
    //     <td><img src="' . $google_account_info['picture'] . '"></td>
    //   </tr>
    //         </table>';
    //   echo '<a href="logout.php">Lougout</a>';
    //   echo '<pre>';
    //   var_dump($google_account_info);
    }
  } else {
      $login_gmail_url=$google_client->createAuthUrl();
    // echo "<a href='" . $google_client->createAuthUrl() . "'>Google Login</a>";
  }
  if(isset($login_gmail_url)){
    echo "<a href='" . $google_client->createAuthUrl() . "'>Google Login</a>";
  }
  else{
    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/');
  }
