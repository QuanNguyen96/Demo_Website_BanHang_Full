<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop D&Q</title>
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- css slider -->
    <link rel="stylesheet" href="./usecssjs/silder_xemchitiet/css/impulseslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./usecssjs/silder_xemchitiet/css/font-awesome.min.css" type="text/css" media="screen" />
    <!-- css index -->
    <link rel="stylesheet" href="./css/index.css">
    <!-- css header -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/css_giohang.css">

    <!-- script coment facebook nhúng -->
</head>

<body>
    <!-- header -->
    <?php include_once("./header.php"); ?>
    <!-- rederbody -->
    <div class="carts">
        <div class="cart">
            <div class="">giỏ hàng</div>
            <div class="table_gh">
                <table>
                    <tr>
                        <th>stt</th>
                        <th colspan="2">sản phẩm</th>
                        <th>đơn giá</th>
                        <th>số lượng</th>
                        <th>thành tiền</th>
                        <th>thao tác</th>
                    </tr>
                    <tbody class="noidung_giohang">
                        <tr>
                            <td>1</td>
                            <td> <img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""> </td>
                            <td>sản phẩm 1</td>
                            <td>120,000</td>
                            <td><button>-</button><input type="number" value="1"><button>+</button></td>
                            <td>120,000</td>
                            <td>xóa</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td> <img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""> </td>
                            <td>sản phẩm 1</td>
                            <td>120,000</td>
                            <td><button>-</button><input type="number" value="1"><button>+</button></td>
                            <td>120,000</td>
                            <td>xóa</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>tổng</td>
                            <td>120,000</td>
                            <td>xóa tất</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_free">
                <i class="fas fa-truck"></i>
                miến phí vận chuyển đơn hàng có giá trị từ 300,000 vnđ
            </div>
            <div class="cart_dathang">
                <button class="cart_dathang_button"> đặt hàng </button>
            </div>


        </div>
        <div class="cart_thanhtoans">
            <div class="thongtinkhachhang">
                <div class="thongtinkhachhang_titlte">Thông tin khách hàng</div>
                <div class="cart_user">
                    <div>
                        <label for="">khách hàng</label>
                        <input type="text" id="tenkh_dathang">
                    </div>
                    <div>
                        <label for="">địa chỉ nhận</label>
                        <input type="text" id="diachikh_dathang">
                    </div>
                    <div>
                        <label for="">email</label>
                        <input type="text" id="email_khdathang">
                    </div>
                    <div>
                        <label for="">sđt</label>
                        <input type="text" id="sdtkh_dathang">
                    </div>

                </div>
                <div>
                    <button class="click_Dathang"> Đặt hàng Tại Đây</button>
                </div>
            </div>
            <div class="thongtindonhang">
                <h3 class="thongtindonhang_titlte">Đơn hàng của bạn</h3>
                <div class="thongtindonhang_noidung">
                    <table>
                        <thead>
                            <tr class="tieude">
                                <th>
                                    Sản Phẩm
                                </th>
                                <th></th>
                                <th>
                                    Tổng
                                </th>
                            </tr>
                        </thead>
                        <tbody class="cart_thanhtoans_noidungchinh">
                            <tr>
                                <td>
                                    Sản Phẩm1
                                </td>
                                <td>
                                    <img src="https://quannguyen.com/du%20an%20website%20ban%20hang/upload/image/hasp/H103060.jpeg">
                                </td>
                                <td>
                                    200000
                                </td>
                            </tr>

                        </tbody>
                        <tr style="background: #ebe3e3;">
                            <td colspan="2" style="font-size:18px;color:#1b2adf;">
                                Tổng
                            </td>
                            <td class="tong_gia">
                                200000
                            </td>
                        </tr>
                        <tr style="background: #ebe3e3;">
                            <td colspan="2" style="font-size:18px;color:#1b2adf;">
                                Thuế(VAT:10%)
                            </td>
                            <td class="thue_gia">
                                200000
                            </td>
                        </tr>
                        <tr style="background: #ebe3e3;">
                            <td colspan="2" style="font-size:18px;color:#1b2adf;">
                                Phí giao hàng
                            </td>
                            <td class="phigiaohang_gia">
                                200000
                            </td>
                        </tr>
                        <tr style="background: #ebe3e3;">
                            <td colspan="2" style="font-size:18px;color:#1b2adf;">
                                Tổng
                            </td>
                            <td class="tong_thanhtoan">
                                200000
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- footer -->
    <?php include_once("./footer.php"); ?>
    <script>
        // tao gio hang
        var giohang = new Array();
        var gh = localStorage.getItem("giohang")
        if (gh) {
            giohang = JSON.parse(gh);
        }

        function raed_show_giohang_pagegiohang_thanhtoan() {
            html = '';
            if (giohang.length > 0) {
                var tongtien = 0;
                for (var i = 0; i < giohang.length; i++) {
                    tongtien += parseInt(giohang[i][2]) * parseInt(giohang[i][3]);
                    var tensp = giohang[i][1]
                    if (tensp.length > 75) {
                        tensp = tensp.slice(0, 75) + "...";
                    }
                    var giasp = giohang[i][2]
                    var tong1sp = ("" + giohang[i][2] * giohang[i][3]).replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                    html += '<tr>' +
                        '    <td>' +
                        '        ' + tensp + '' +
                        '    </td>' +
                        '    <td class="cangiua">' +
                        '        <img src="./upload/image/hasp/' + giohang[i][4] + '">' + 'X' + giohang[i][3] + '' +
                        '    </td>' +
                        '    <td>' +
                        '        ' + tong1sp + '' +
                        '    </td>' +
                        '</tr>';
                }
                var tienthue = tongtien * 0.1
                var tienthue_format = ("" + tienthue).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                tongtien_format = ("" + tongtien).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                const phigiaohang = 30000;
                var phigiaohang_format = ("" + phigiaohang).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                var tongthanhtoan = tongtien - tienthue - phigiaohang;
                var tongthanhtoan_format = ("" + tongthanhtoan).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                $('.tong_gia').html(tongtien_format);
                $('.thue_gia').html(tienthue_format);
                $('.phigiaohang_gia').html(phigiaohang_format);
                $('.tong_thanhtoan').html(tongthanhtoan_format);
                $('.cart_thanhtoans_noidungchinh').html(html)
            } else {
                $('.cart_thanhtoans').css("display", "none")
            }
        }
        // click
        $(document).on('click', '.cart_dathang_button', function() {
            $.ajax({
                url: "ajax_khachhangadmin.php",
                method: "post",
                data: {
                    "action": "kiemtralogin_page_giohang"
                },
                datatype: "json",
                success: function(datarp) {
                    var data = JSON.parse(datarp)
                    if (data["ktra"] == "tontai") {
                        if (giohang.length == 0) {
                            // alert("Giỏ hàng của bạn chưa có sản phẩm nào, vui lòng chọn sản phẩm để mua...")   
                        } else {
                            $('#tenkh_dathang').val(data["TenKH"])
                            $('#email_khdathang').val(data["Email"])
                            $('#sdtkh_dathang').val(data["SDT"])
                            $('.cart_thanhtoans').css("display", "flex")
                            raed_show_giohang_pagegiohang_thanhtoan();
                        }

                    } else {
                        window.location = "https://quannguyen.com/du%20an%20website%20ban%20hang/login.php"
                    }
                }
            })
        })
        $(document).on('click', '.Click_out_facebook', function() {
            $('.cart_thanhtoans').css("display", "none")
        })
        $(document).on('click', '.Click_out_gmail', function() {
            $('.cart_thanhtoans').css("display", "none")
        })
        $(document).on('click', '.Click_out_tk', function() {
            $('.cart_thanhtoans').css("display", "none")
        })

        // click dat hang
        $(document).on('click', '.click_Dathang', function() {
            if (confirm("bạn có chắc chắn muốn đặt đơn hàng này ?")) {


                html = '<head>' +
                    '    <style>' +
                    '        .thongtindonhang {' +
                    '    width: 1000px;' +
                    '    border: 1px solid rgb(241, 40, 40);' +
                    '    border-radius: 3px;' +
                    '    box-shadow: 1px 1px 2px 2px rgba(100, 100, 100, 0.3);' +
                    '    padding: 0 10px 10px 10px;' +
                    '}' +
                    '.thongtindonhang_titlte {' +
                    '    background: #ccc;' +
                    '    border-radius: 5px;' +
                    '    margin: 10px 0;' +
                    '    padding: 5px 10px;' +
                    '}' +
                    '.thongtindonhang_noidung img {' +
                    '    width: 50px;' +
                    '    height: 50px;' +
                    '    object-fit: cover;' +
                    '}' +
                    '.thongtindonhang_noidung table {' +
                    '    border-collapse: collapse;' +
                    '    width: 100%;' +
                    '    border: none;' +
                    '}' +
                    '.thongtindonhang_noidung table th,' +
                    'td {' +
                    '    border: none;' +
                    '}' +
                    '.thongtindonhang_noidung table tr {' +
                    '    box-shadow: 0px 0px 3px 0px rgba(100, 100, 100, 0.5);' +
                    '}' +
                    '.thongtindonhang_noidung table td:nth-child(1),' +
                    'th:nth-child(1) {' +
                    '    padding-left: 10px;' +
                    '    width: 50%;' +
                    '    text-align: left;' +
                    '    font-size: 14px;' +
                    '}' +
                    '.thongtindonhang_noidung table td:nth-child(2),' +
                    'th:nth-child(2) {' +
                    '    width: 20%;' +
                    '    text-align: center;' +
                    '}' +
                    '.thongtindonhang_noidung table td:nth-child(3),' +
                    'th:nth-child(3) {' +
                    '    text-align: right;' +
                    '    padding-right: 10px;' +
                    '    font-size: 14px;' +
                    '}' +
                    '.thue_gia,' +
                    '.phigiaohang_gia,' +
                    '.tong_gia,' +
                    '.tong_thanhtoan {' +
                    '    text-align: right !important;' +
                    '    padding-right: 10px;' +
                    '}' +
                    '.cangiua {' +
                    '    display: flex;' +
                    '    align-items: center;' +
                    '}' +
                    '    </style>' +
                    '</head>' +
                    '<body>' +
                    '<div class="thongtindonhang">' +
                    '                <h3 class="thongtindonhang_titlte">Đơn hàng của bạn</h3>' +
                    '                <div class="thongtindonhang_noidung">' +
                    '                    <table>' +
                    '                        <thead>' +
                    '                            <tr class="tieude">' +
                    '                                <th>' +
                    '                                    Sản Phẩm' +
                    '                                </th>' +
                    '                                <th></th>' +
                    '                                <th>' +
                    '                                    Tổng' +
                    '                                </th>' +
                    '                            </tr>' +
                    '                        </thead>' +
                    '                        <tbody class="cart_thanhtoans_noidungchinh">';
                if (giohang.length > 0) {
                    var tongtien = 0;
                    var tongsoluong = 0;
                    for (var i = 0; i < giohang.length; i++) {
                        tongtien += parseInt(giohang[i][2]) * parseInt(giohang[i][3]);
                        tongsoluong += parseInt(giohang[i][3]);
                        var tensp = giohang[i][1]
                        if (tensp.length > 75) {
                            tensp = tensp.slice(0, 75) + "...";
                        }
                        var giasp = giohang[i][2]
                        var tong1sp = ("" + giohang[i][2] * giohang[i][3]).replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        html += '<tr>' +
                            '    <td>' +
                            '        ' + tensp + '' +
                            '    </td>' +
                            '    <td class="cangiua" style="align-items: center;">' +
                            '        <img src="cid:' + giohang[i][4] + '">' + 'X' + giohang[i][3] + '' +
                            '    </td>' +
                            '    <td>' +
                            '        ' + tong1sp + '' +
                            '    </td>' +
                            '</tr>';
                    }
                    var tienthue = tongtien * 0.1
                    var tienthue_format = ("" + tienthue).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    tongtien_format = ("" + tongtien).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    const phigiaohang = 30000;
                    var phigiaohang_format = ("" + phigiaohang).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    var tongthanhtoan = tongtien - tienthue - phigiaohang;
                    var tongthanhtoan_format = ("" + tongthanhtoan).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    html += '                        </tbody>' +
                        '                        <tr style="background: #ebe3e3;">' +
                        '                            <td colspan="2" style="font-size:18px;color:#1b2adf;">' +
                        '                                Tổng' +
                        '                            </td>' +
                        '                            <td class="tong_gia">' +
                        '                                ' + tongtien_format + '' +
                        '                            </td>' +
                        '                        </tr>' +
                        '                        <tr style="background: #ebe3e3;">' +
                        '                            <td colspan="2" style="font-size:18px;color:#1b2adf;">' +
                        '                                Thuế(VAT:10%)' +
                        '                            </td>' +
                        '                            <td class="thue_gia">' +
                        '                                ' + tienthue_format + '' +
                        '                            </td>' +
                        '                        </tr>' +
                        '                        <tr style="background: #ebe3e3;">' +
                        '                            <td colspan="2" style="font-size:18px;color:#1b2adf;">' +
                        '                                Phí giao hàng' +
                        '                            </td>' +
                        '                            <td class="phigiaohang_gia">' +
                        '                                ' + phigiaohang_format + '' +
                        '                            </td>' +
                        '                        </tr>' +
                        '                        <tr style="background: #ebe3e3;">' +
                        '                            <td colspan="2" style="font-size:18px;color:#1b2adf;">' +
                        '                                Tổng' +
                        '                            </td>' +
                        '                            <td class="tong_thanhtoan">' +
                        '                                ' + tongthanhtoan_format + '' +
                        '                            </td>' +
                        '                        </tr>' +
                        '                    </table>' +
                        '                </div>' +
                        '                <br><br><div>Đơn hàng của bạn đang trong quá trình xác nhận từ shop.</div>' +
                        '                <div class="">Vui lòng xem lịch sử hoặc liên hệ với shop để cập nhật đơn hàng</div>' +
                        '                <div>Cảm ơn bạn đã đặt hàng tại D&Q...!</div>' +
                        '            </div>' +
                        '</body>';
                }
                var email = $('#email_khdathang').val()
                var tenkh = $('#tenkh_dathang').val()
                var diachinhan = $('#diachikh_dathang').val()
                var sdt = $('#sdtkh_dathang').val()
                $.ajax({
                    url: "ajax_sendmail.php",
                    method: "POST",
                    data: {
                        "action": "sendmail_pagegiohang",
                        "email": email,
                        "tenkh": tenkh,
                        "diachinhan": diachinhan,
                        "sdt": sdt,
                        "noidung": html,
                        "giohang": gh,
                        "tongsoluong": tongsoluong,
                        "tongtien": tongthanhtoan
                    },
                    datatype: "json",
                    success: function(datarp) {
                        var data = JSON.parse(datarp);
                        if (data['add_messages'] == "sucessfully") {
                            giohang = [];
                            localStorage.setItem("giohang", JSON.stringify(giohang));
                            window.location = "./dathangthanhcong.php"
                        } else {
                            alert("Có sự cố xin vui lòng thử lại")
                        }
                    }
                });
            }
        })
    </script>
    <!-- <script src="./js/giohang.js"></script> -->

</body>

</html>