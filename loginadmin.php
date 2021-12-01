<?php
if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
    header("location:./adindex.php");
} else {
}
?>

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
                <input type="text" required class="login_username">
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
        <div class="signup">
            <a href="./index.php">Trang chủ</a>
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
    <script src="./js/loginadmin.js"></script>
</body>

</html>