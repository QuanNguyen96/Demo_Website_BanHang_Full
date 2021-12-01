$(document).ready(function() {
    $(".btn_login").on('click', function() {
        var username = $('.login_username').val();
        var password = $('.pswrd').val();
        if (username != '' && password != '') {
            $.ajax({
                url: "./ajax_accountadmin.php",
                method: "post",
                data: {
                    "action": "login_pageloginadmin",
                    "username": username,
                    "password": password
                },
                datatype: "json",
                success: function(datarp) {
                    var data = JSON.parse(datarp)
                    if (data['login'] == "successfull") {
                        window.location = "./adindex.php"
                    } else {
                        alert("tài khoản hoặc mật khẩu không đúng")
                    }
                }
            })
        } else {
            alert("chưa nhập thông tin");
        }

    })
    $(document).on('click', '.click_dangxuatadmin', function() {
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                "action": "logout_pageloginadmin",
            },
            success: function(data) {
                window.location = "./loginadmin.php"
            }
        })
    })
})