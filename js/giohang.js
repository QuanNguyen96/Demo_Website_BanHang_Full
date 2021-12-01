$(document).ready(function() {
    // tạo và load thông báo
    var demthongbao = 0;

    function addthongbao(messages) {
        demthongbao++;
        thongbao(messages, demthongbao)
    }

    function thongbao(messages, demthongbao) {

        $('.notification').append('<p class="notification_item' + demthongbao + '"><span id="timer_notification"></span>' + messages + '</p>')
        $('.notification .notification_item' + demthongbao + '').css({
            'transform': 'translateX(100%)',
            'opacity': '1',
            'visibility': 'visible',
            'transition': 'all linear 1s'
        })
        setTimeout(() => {
            $('.notification .notification_item' + demthongbao + '').css({
                'transform': 'translateX(0%)'
            })

        }, 0);
        setTimeout(() => {
            $('.notification_item' + demthongbao + ' #timer_notification').css({
                'width': '0%'
            })
        }, 1500);
        setTimeout(() => {
            $('.notification .notification_item' + demthongbao + '').css({
                'opacity': '0.3',
                'visibility': 'hidden',
            })

        }, 3200);
        setTimeout(() => {

            $('.notification_item' + demthongbao + '').remove()
        }, 4200);
    }

    // tao gio hang
    var giohang = new Array();

    // kiểm tra trong lịch sử browser có giỏ hàng chưa nếu có rồi thì
    // lấy về và add vào giỏ hàng
    var gh = localStorage.getItem("giohang")
    if (gh) {
        giohang = JSON.parse(gh);
        $('.carts_soluong').html(giohang.length)
    } else {
        $('.carts_soluong').html(0)
    }
    // document.querySelector('.icon-giohang p').innerHTML = giohang.length;

    function js_click_dathang(masp, soluongdat) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "dataproduct_add_cart",
                "masp": masp
            },

            success: function(datarp) {
                var data = JSON.parse(datarp)
                var MaSP = data['MaSP']
                var TenSP = data['TenSP']
                var GiaBan = data['GiaBan']
                var KhuyenMai = data['KhuyenMai']
                var HinhAnh = data['HinhAnh']
                var giasanpham = "" + Math.floor(GiaBan * (1 - KhuyenMai / 100))
                giasanpham = giasanpham.substr(0, giasanpham.length - 3).concat("000")

                var sp = new Array(MaSP, TenSP, giasanpham, soluongdat, HinhAnh);
                var kiemtratontai = false;
                var indexof_sptontai = 0;
                for (var i = 0; i < giohang.length; i++) {
                    if (giohang[i][0] == MaSP) {
                        kiemtratontai = true;
                        indexof_sptontai = i;
                        break;
                    }
                }
                if (kiemtratontai == true) {
                    giohang[indexof_sptontai][3] = parseInt(giohang[indexof_sptontai][3]) + soluongdat;
                } else {
                    giohang.push(sp);
                }
                $('.carts_soluong').html(giohang.length)
                saveupdate_localstorge(giohang)
                raed_show_giohang_indexkh()
            }
        })

        var messages = "Bạn vừa thêm sản phẩm " + masp + " vào giỏ hàng"
        addthongbao(messages)
    }


    function saveupdate_localstorge(gh) {
        localStorage.setItem("giohang", JSON.stringify(gh));
    }

    function raed_show_giohang_indexkh() {
        html = '';
        if (giohang.length > 0) {
            var tongtien = 0;
            for (var i = 0; i < giohang.length; i++) {
                tongtien += parseInt(giohang[i][2]) * parseInt(giohang[i][3]);
                html += '<tr>' +
                    '<td><img src="./upload/image/hasp/' + giohang[i][4] + '"></td>' +
                    '<td>' + giohang[i][1] + '</td>' +
                    '<td>' + giohang[i][2].replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '</td>' +
                    '<td><input type="number" min="1" data-stt=' + i + ' style="text-algin:center;width:50px" class="ip_soluong_sp_cart" value=' + giohang[i][3] + '></td>' +
                    '<td class="delete_item_cart" data-vitri=' + i + '>xóa</td>' +
                    '</tr>';
            }
            html += '<tr>' +
                '<td></td>' +
                '<td>Tổng tiền</td>' +
                '<td>' + ("" + tongtien).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '</td>' +
                '<td></td>' +
                '<td class="js_delete_cart" style="font-size:12px">Xóa tất</td>' +
                '</tr>';
        } else {
            html += '<tr><td colspan="5">Chưa có sản phẩm nào</td></tr>';
        }
        $('.body_giohang_indexkh').html(html)
        $('.carts_soluong').html(giohang.length)
    }
    raed_show_giohang_indexkh()

    //xóa tất cả giỏ hàng
    function js_delete_cart() {
        if (localStorage.getItem('giohang')) {
            localStorage.removeItem('giohang');
            giohang = new Array();
            raed_show_giohang_indexkh()
            raed_show_giohang_pagegiohang()
            raed_show_giohang_pagegiohang_thanhtoan()
        }
    }
    //xóa 1 item trong gio hang
    function js_delete_item_cart(vitrixoa) {
        giohang.splice(vitrixoa, 1);
        saveupdate_localstorge(giohang)
        raed_show_giohang_indexkh();
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    }
    // thay doi trong gio hang trang index khách hàng
    function js_change_cart_indexkh(vitriedit, soluong) {
        giohang[vitriedit][3] = soluong;
        saveupdate_localstorge(giohang)
        raed_show_giohang_indexkh();
    }


    // xử lý bên trang index
    $(document).on('click', '.js_delete_cart', function() {
        js_delete_cart()
    })
    $(document).on('click', '.delete_item_cart', function() {
        var vitrixoa = $(this).data('vitri')
        js_delete_item_cart(vitrixoa)
    })
    $(document).on('keyup', '.ip_soluong_sp_cart', function() {
        var soluong = $(this).val()
        var vitri = $(this).data('stt')
        js_change_cart_indexkh(vitri, soluong)
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    })
    $(document).on('change', '.ip_soluong_sp_cart', function() {
        var soluong = $(this).val()
        var vitri = $(this).data('stt')
        js_change_cart_indexkh(vitri, soluong)
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    })
    $(document).on('click', '.product_card_dathang .fa-cart-plus', function() {
        var masp = $(this).data('masp')
        var soluongkho = $(this).data('soluong')
        var soluongdat = 1;
        if (soluongdat > soluongkho) {
            alert("Bạn đã đặt quá số lượng sản phẩm trong kho, vui lòng đặt lại");
        }
        js_click_dathang(masp, soluongdat)
    })
    $(document).on('click', '.search_card_dathang .fa-cart-plus', function() {
        var masp = $(this).data('masp')
        var soluongkho = $(this).data('soluong')
        var soluongdat = 1;
        if (soluongdat > soluongkho) {
            alert("Bạn đã đặt quá số lượng sản phẩm trong kho, vui lòng đặt lại");
        }
        js_click_dathang(masp, soluongdat)
    })

    // xử lý bên trang xem chi tiết
    // thêm sản phẩm vào giỏ hàng
    $('.xctcc-dathang .add_cart_xct_add').on('click', function() {
        var soluong = (parseInt)($('#quantity_product_cart').val())
        var masp = $('.xctcc-name').attr("masp")
        js_click_dathang(masp, soluong)
    })

    function lay_soluong_sp_trong_kho(masp, the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "laysoluongsanphamtrongkho_pagegiohang",
                "masp": masp
            },
            success: function(datarp) {
                $(the).attr("soluong", datarp)
            }
        })
    }
    // read show gio hang ben trang gio hang
    function raed_show_giohang_pagegiohang() {
        // lấy so lượng  trong kho

        html = '';
        if (giohang.length > 0) {
            var tongtien = 0;
            for (var i = 0; i < giohang.length; i++) {
                var thanhtien = parseInt(giohang[i][2]) * parseInt(giohang[i][3]);
                tongtien += thanhtien
                html += '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><img src="./upload/image/hasp/' + giohang[i][4] + '"></td>' +
                    '<td>' + giohang[i][1] + '</td>' +
                    '<td>' + giohang[i][2].replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '</td>' +
                    '<td><button class="giam_soluong_pagegh">-</button><input vitriedit=' + i + ' data-vitri=' + i + '  id="soluong_sp_pagegh" class="ipsoluong' + i + '"  type="number" min="1" value="' + giohang[i][3] + '"><button  class="tang_soluong_pagegh">+</button></td>' +
                    '<td>' + ("" + thanhtien).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '</td>' +
                    '<td class="delete_item_cart" data-vitri=' + i + '>xóa</td>' +
                    '</tr>';
                lay_soluong_sp_trong_kho(giohang[i][0], ".ipsoluong" + i + "")
            }
            html += '<tr>' +
                '<td colspan="4"></td>' +
                '<td>Tổng tiền</td>' +
                '<td>' + ("" + tongtien).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '</td>' +
                '<td class="js_delete_cart">Xóa tất</td>' +
                '</tr>';

        } else {
            html += '<tr><td colspan="5">Chưa có sản phẩm nào</td></tr>';
        }
        $('.noidung_giohang').html(html)
        $('.carts_soluong').html(giohang.length)
    }
    raed_show_giohang_pagegiohang()

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
    //
    $(document).on('click', '.tang_soluong_pagegh', function() {
        var input = $(this).parent().children()[1];
        var soluong = 1;
        soluong = (parseInt)($(input).val())
        var soluong_kho = (parseInt)($(input).attr('soluong'))
        if (soluong < soluong_kho) {
            $(input).val(soluong + 1)
        }
        var vitri = $(input).attr('vitriedit')
        soluong = (parseInt)($(input).val())
        js_change_cart_indexkh(vitri, soluong)
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    })
    $(document).on('click', '.giam_soluong_pagegh', function() {
        var input = $(this).parent().children()[1];
        var soluong = 1;
        soluong = (parseInt)($(input).val())

        if (soluong > 1) {
            $(input).val(soluong - 1)
        }
        var vitri = $(input).attr('vitriedit')
        soluong = (parseInt)($(input).val())
        js_change_cart_indexkh(vitri, soluong)
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    })
    $(document).on('keyup', '#soluong_sp_pagegh', function() {
        var soluong_kho = (parseInt)($(this).attr('soluong'))
        if ($(this).val() == '') {
            $(this).val(1)
        }
        var soluong = (parseInt)($(this).val())
        if (soluong < 1 || soluong > soluong_kho) {
            $(this).val(1)
        }
        var vitri = $(this).data('vitri')
        soluong = (parseInt)($(this).val())
        js_change_cart_indexkh(vitri, soluong)
        raed_show_giohang_pagegiohang()
        raed_show_giohang_pagegiohang_thanhtoan()
    })


})