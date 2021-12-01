<?php
session_start();
// session_destroy();
if(isset($_SESSION['usernameDQ'])){
    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login D&Q</title>
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="./Css/login.css">
</head>

<body>
    <div class="container">
        <header>Login Form</header>
        <form>
            <div class="input-field">
                <input type="text" required class="login_username" <?php if (isset($_SESSION['username'])) {
                                                                        echo 'value=' . $_SESSION['username'];
                                                                    } ?>>
                <label>Email or Username</label>
            </div>
            <div class="input-field">
                <input class="pswrd" type="password" required>
                <span class="show">SHOW</span>
                <label>Password</label>
            </div>
            <div class="button">
                <div class="inner">
                </div>
                <button type="button" class="btn_login">LOGIN</button>
            </div>
        </form>
        <div class="auth">
            Or login with</div>
        <div class="links">
            <div class="facebook">
               
                <?php
                if (isset($_SESSION['login_facebook_url'])) {
                    echo '<i class="fab fa-facebook-square"><span><a href="' . $_SESSION['login_facebook_url'] . '">Facebook</a></span></i> ';
                } 
                else{
                    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/facebook/login.php');
                }
                ?>
            </div>
            
            <div class="google">
            <?php
                if (isset($_SESSION['login_gmail_url'])) {
                    echo '<i class="fab fa-google-plus-square"><span><a href="' . $_SESSION['login_gmail_url'] . '">Google</a></span></i>';
                } 
                else{
                    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/google_gmail/login_gmail.php');
                }
                ?>
                <!-- <i class="fab fa-google-plus-square"><span>Google</span></i> -->
            </div>
        </div>
        <div class="signup">
            Not a member? <a href="./register.php">Signup now</a>
            /<a href="./index.php">Trang chủ</a>
        </div>
    </div>

    <script>
        var input = document.querySelector('.pswrd');
        var show = document.querySelector('.show');
        show.addEventListener('click', active);

        function active() {
            if (input.type === "password") {
                input.type = "text";
                show.style.color = "#1DA1F2";
                show.textContent = "HIDE";
            } else {
                input.type = "password";
                show.textContent = "SHOW";
                show.style.color = "#111";
            }
        }
        var username = sessionStorage.getItem("username")
        if (username) {
            $('.login_username').val(username)
            sessionStorage.removeItem("username")
        }
    </script>
    <script src="./js/login.js"></script>
</body>

</html>