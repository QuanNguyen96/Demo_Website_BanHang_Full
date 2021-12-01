<?php
define('localhost',"localhost");
define('username',"root");
define('password',"");
define('database',"dq_shop");

$conn=mysqli_connect(localhost,username,password,database);
if(!$conn){
    die();
}

mysqli_set_charset($conn,"utf8");
?>

