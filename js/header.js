$(document).ready(function() {

    // // xự kiện tìm kiếm của khách hàng theo chuoi du lieu tai ban dau
    // var datasp = "du lieu san pham"

    // function laydulieu_sanpham() {
    //     $.ajax({
    //         url: "./ajax_sanphamadmin.php",
    //         method: "post",
    //         data: {
    //             "action": "get_data_sp_indexkh"
    //         },
    //         success: function(datarp) {
    //             data = JSON.parse(datarp)
    //         }
    //     })
    // }
    // laydulieu_sanpham()
    // $('.input_search_khtk').on('change', function() {
    //     console.log(datasp)
    // })
    // xự kiện tìm kiếm của khách hàng theo cách lấy dữ liệu (chọc) từ database mysql
    $('.input_search_khtk').on('keyup', function() {
        var text_search = $('.input_search_khtk').val()
        if (text_search != '') {
            $.ajax({
                url: "./ajax_sanphamadmin.php",
                method: "GET",
                data: {
                    "action": "search_sp_indexkh",
                    "text_search": text_search
                },
                success: function(datarp) {
                    var data = JSON.parse(datarp)
                    console.log(data)
                    var data_html = '';
                    if (data.length > 0) {
                        $.each(data, function(index, element) {
                            data_html += '<tr>' +
                                '    <td><a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '"><img src="./upload/image/hasp/' + element['HinhAnh'] + '" alt=""></a></td>' +
                                '    <td class="search_tensp"><a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' + element['TenSP'] + '</a></td>' +
                                '</tr>';
                        })
                    } else {
                        data_html += '<tr><td colspan="2">Không tìm thấy sản phẩm nào</td></tr>';
                    }
                    $('.header_seach_tag table').html(data_html)
                }
            })
            $('.header_seach_tag').attr("style", "display: block !important;")
        } else {
            $('.header_seach_tag').attr("style", "display: none !important;")
        }

    })
    $('.header_seach_tag').on('blur', function() {
        $('.header_seach_tag').attr("style", "display: none !important;")

    })

    //điều hướng sang trang search
    $('.header_seach .fa-search').on("click", function() {
        var text_search = $('.input_search_khtk').val()
        if (text_search != '') {
            window.location.href = "./timkiem.php?search=" + text_search
        }

    })

    // đăng xuất

    //facebook
    $(document).on('click', '.Click_out_facebook', function() {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                "action": "dangxuat_account_facebook_indexkh"
            },
            success: function() {
                html = ' <div><a href="./login.php">Đăng nhập</a></div>' +
                    '<div><a href="./register.php"> Đăng ký</a></div>';
                $('.header-top_right').html(html)

            }
        })
    })

    //gmail
    $(document).on('click', '.Click_out_gmail', function() {
            $.ajax({
                url: "./ajax_khachhangadmin.php",
                method: "post",
                data: {
                    "action": "dangxuat_account_gmail_indexkh"
                },
                success: function() {
                    html = ' <div><a href="./login.php">Đăng nhập</a></div>' +
                        '<div><a href="./register.php"> Đăng ký</a></div>';
                    $('.header-top_right').html(html)
                }
            })
        })
        //tài khoản
    $(document).on('click', '.Click_out_tk', function() {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                "action": "dangxuat_account_tk_indexkh"
            },
            success: function() {
                html = ' <div><a href="./login.php">Đăng nhập</a></div>' +
                    '<div><a href="./register.php"> Đăng ký</a></div>';
                $('.header-top_right').html(html)
            }
        })
    })
})