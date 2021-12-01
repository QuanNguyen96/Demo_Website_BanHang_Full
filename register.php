<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register D&Q</title>
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="./Css/register.css">
</head>


<body>

    <div class="container">
        <header>Sign Up Now</header>
        <div>đăng ký tài khoản</div>
        <form class="form_register">
            <div class="input-field">
                <input oninvalid="this.setCustomValidity('Không được để trống')" oninput="this.setCustomValidity('')" type="text" required class="register_username">
                <label>Email or Username</label>
            </div>
            <div class="input-field">
                <input oninvalid="this.setCustomValidity('Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt:')" oninput="this.setCustomValidity('')" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" class="pswrd register_password" type="password" required placeholder=" ">
                <span class="showpw show">SHOW</span>
                <label class="form_label">Password</label>
            </div>
            <div class="input-field">
                <input oninvalid="this.setCustomValidity('Password nhập không khớp')" oninput="check_password(this)" class="cfpswrd register_checkpassword" type="password" required placeholder=" ">
                <span class="showcfpw show">SHOW</span>
                <label class="form_label">Confirm Password</label>
            </div>
            <div class="input-field">
                <input oninvalid="this.setCustomValidity('Email sai định dạng(...@gmail.com), vui lòng thử lại')" oninput="this.setCustomValidity('')" type="email" required class="register_email" placeholder=" ">
                <label class="form_label">Email</label>
            </div>
            <div class="input-field">
                <input oninvalid="this.setCustomValidity('chỉ được phép nhập số')" maxlength="11" oninput="this.setCustomValidity('')" type="text" pattern="[0-9.]+" required class="register_sdt" placeholder=" ">
                <label class="form_label">SĐT</label>
            </div>
            <div class="button">
                <div class="inner">
                </div>
                <button type="submit" class="signup_kh">Sign Up</button>
            </div>
        </form>
        <div class="auth">
            quay trở về
            <a href="./login.php"> trang login</a>
            |<a href="./index.php">Trang chủ</a>
        </div>

    </div>

    <script>
        function check_password(input) {
            if (input.value != document.querySelector('.register_password').value) {
                input.setCustomValidity('Password Must be Matching.');
            } else {
                // input is valid -- reset the error message
                input.setCustomValidity('');
            }
        }
    </script>
    <script src="./js/register.js"></script>
</body>

</html>