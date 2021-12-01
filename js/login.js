$(document).ready(function() {
    $('.btn_login').on('click', function() {
            login()
        })
        // click enter thi cung login
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            login()
        }
    });

    function login() {
        var username = $('.login_username').val();
        var password = $('.pswrd').val();
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                "action": "login_acccountkh_login",
                "username": username,
                "password": password
            },
            dataType: "json",
            success: function(data) {
                if (data['add_messages'] == 'successfull') {
                    window.location = "./index.php"
                }
                if (data['add_messages'] == 'error') {
                    alert("tài khoản hoặc mật khẩu không đúng")
                    $('.pswrd').val("");
                }

            }
        })
    }
})