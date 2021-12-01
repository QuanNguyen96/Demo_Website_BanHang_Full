<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table,
    th,
    td {
      border-collapse: collapse;
      border: solid 1px black;
    }
  </style>
</head>

<body>
  <?php
session_start();
require_once ("./google_gmail/vendor/autoload.php");
require_once ("./google_gmail/gmailconfig.php");


if(isset($login_gmail_url)){
  echo "<a href='" . $google_client->createAuthUrl() . "'>Google Login</a>";
}
else{
  echo $_SESSION['usernameDQ'];
}
  ?>
</body>

</html>