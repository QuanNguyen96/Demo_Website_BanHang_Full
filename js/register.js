$(document).ready(function() {
    // script register form
    var ip_pw = document.querySelector('.pswrd');
    var ip_cf_pw = document.querySelector('.cfpswrd');
    var showpw = document.querySelector('.showpw');
    var showcfpw = document.querySelector('.showcfpw');
    showpw.addEventListener('click', active_pw);
    showcfpw.addEventListener('click', active_cfpw);

    function active_pw() {
        if (ip_pw.type === "password") {
            ip_pw.type = "text";
            showpw.style.color = "#1DA1F2";
            showpw.textContent = "HIDE";
        } else {
            ip_pw.type = "password";
            showpw.textContent = "SHOW";
            showpw.style.color = "#111";
        }
    }

    function active_cfpw() {
        if (ip_cf_pw.type === "password") {
            ip_cf_pw.type = "text";
            showcfpw.style.color = "#1DA1F2";
            showcfpw.textContent = "HIDE";
        } else {
            ip_cf_pw.type = "password";
            showcfpw.textContent = "SHOW";
            showcfpw.style.color = "#111";
        }
    }



    // end register form


    $('.form_register').on("submit", function(e) {
        e.preventDefault();
        var username = $('.register_username').val()
        var password = $('.register_password').val()
        var checkpassword = $('.register_checkpassword').val()
        var email = $('.register_email').val()
        var sdt = $('.register_sdt').val()
        if (password != checkpassword || username == '' || password == '' || email == '' || sdt == '') {
            alert("Thông tin nhập bị lỗi hoặc xảy ra lỗi ngoại lệ, xin vui lòng thử lại")
        } else {
            addtaikhoan(username, password, email, sdt)
        }
    })

    function addtaikhoan(username, password, email, sdt) {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                "action": "add_acccountkh_register",
                "username": username,
                "password": password,
                "email": email,
                "sdt": sdt
            },
            dataType: "json",
            success: function(data) {
                if (data['add_messages'] == 'successfull') {
                    alert("Bạn đã đăng ký thành công, chúng tôi đã gửi tới địa chỉ email " + email + " 1 link xác nhận, vui lòng xác nhận và đăng nhập tài khoản")
                    sessionStorage.setItem("username", username)
                    window.location = "./login.php"
                }
                if (data['add_messages'] == 'tontai') {
                    alert("tài khoản này đã tồn tại, vui lòng đăng ký tài khoản khác")
                }

            }
        })
    }
})