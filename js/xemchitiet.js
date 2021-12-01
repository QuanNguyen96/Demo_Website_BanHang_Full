$(document).ready(function() {

    function hover_img() {
        var slider = $('#slider')
        var array_slider = $('#slider').children()
        var img0 = $($(array_slider).children()[0]).attr('src')
        $('.xctcl_top img').attr('src', img0)
        array_slider.each(function(index, element) {
            var img = $($(element).children()[0]).attr('src')
            $(element).on('click', function() {

                $('.xctcl_top img').attr('src', img)
            })
            $(element).on('hover', function() {
                $('.xctcl_top img').attr('src', img)
            })
        })
    }

    // script load slide img
    function load_slideimg_indexkh() {
        var MaSP = $('.xemchitiet_masp').html().replace(/\s+/g, '')
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "GET",
            data: {
                "action": "show_slideimg_index_kh",
                "MaSP": MaSP
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                    // chinh sua hinh anh
                var data_html_slider = ''
                var data_html_slider_show = ''
                if (data['HinhAnh'].length > 0) {
                    data_html_slider +=
                        '<div class="face one">' +
                        '<img src="./upload/image/hasp/' + data['HinhAnh'][0] + '" alt="">' +
                        '</div>' +
                        '<div class="face two">' +
                        '    <img src="./upload/image/hasp/' + data['HinhAnh'][1] + '" alt="">' +
                        '</div>' +
                        '<div class="face three">' +
                        '    <img src="./upload/image/hasp/' + data['HinhAnh'][2] + '" alt="">' +
                        '</div>' +
                        '<div class="face four">' +
                        '    <img src="./upload/image/hasp/' + data['HinhAnh'][3] + '" alt="">' +
                        '</div>' +
                        '<div class="face five">' +
                        '    <img src="./upload/image/hasp/' + data['HinhAnh'][4] + '" alt="">' +
                        '</div>' +
                        '<div class="face six">' +
                        '    <img src="./upload/image/hasp/' + data['HinhAnh'][5] + '" alt="">' +
                        '</div>';

                    data_html_slider_show +=
                        '<img src="./upload/image/hasp/' + data['HinhAnh'][0] + '" alt="">'
                    $('#slider').html(data_html_slider)
                    $('.xctcl_top').html(data_html_slider_show)
                }
                hover_img()

                // chirnh sua thong tin san pham
                $('.xemchitiet_title').html(' <p><strong>shopee</strong>/' + data['DM_LSP']['TenDM'] + '/' + data['DM_LSP']['TenLSP'] + '/' + data['SanPham'][0]['TenSP'] + '</p>')
                $('.xctcc-name').html(data['SanPham'][0]['TenSP'])
                $('.xctcc-name').attr("masp", data['SanPham'][0]['MaSP'])
                var sosao = data['PhanTramSao'] * 5 / 100;
                var html_danhgia1 = '<span>' + sosao + '</span>' +
                    ' <span class="score"><span style="width: ' + data['PhanTramSao'] + '%"></span></span>';
                $('.xctcc-danhgia1').html(html_danhgia1)

                $('.xctcc-danhgia2').html(data['SoNguoiDanhGia'] + " đánh giá")
                $('.xctcc-danhgia3').html(data['DaBan'] + " đã bán")
                var giaban = "" + data['SanPham'][0]['GiaBan'];
                giashow_format = giaban.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                if (data['KhuyenMai'] != 0) {
                    var giashow = "" + Math.floor(data['SanPham'][0]['GiaBan'] * (1 - data['KhuyenMai'] / 100))
                    giashow_format = giashow.substr(0, giashow.length - 3).concat("000").replace(/\B(?=(\d{3})+(?!\d))/g, ',')

                }

                $('.xctcc-giaban').html(giashow_format + " ₫")
                $('#xct_sp_cosan').html(data['SanPham'][0]['SoLuong'] + " Sản phẩm có sẵn")
                $('#xct_sp_cosan').attr("soluong", data['SanPham'][0]['SoLuong'])
                    // $('.xctcc-share2').html(data['SanPham']['TenSP'])
                if (data['Like'] == 1) {
                    $('.xctcc-share2').html('<i class="fas fa-heart" style="color:red"></i>đã thích (' + data['SoNguoiThich'] + ')')
                } else {
                    $('.xctcc-share2').html('<i class="fas fa-heart" style="color:#ccc"></i>đã thích (' + data['SoNguoiThich'] + ')')
                }
                $('#xct_ctsp_tendmsp').html(data['DM_LSP']['TenDM'])
                var html_xcv_dgsp_sao = '<div>' +
                    '    <span>' + sosao + '</span>' +
                    ' <span class="sao_xemct_dm"><span style="width: ' + data['PhanTramSao'] + '%"></span></span>' +
                    '</div>' +
                    '<div>' +
                    '    5*' +
                    '    <progress min="0" max="' + data['SoNguoiDanhGia'] + '" value="' + data['Sao']['5sao'] + '"></progress>' +
                    '    <span>' + data['Sao']['5sao'] + ' đánh giá</span>' +
                    '</div>' +
                    '<div>' +
                    '    4*' +
                    '    <progress min="0" max="' + data['SoNguoiDanhGia'] + '" value="' + data['Sao']['4sao'] + '"></progress>' +
                    '    <span>' + data['Sao']['4sao'] + ' đánh giá</span>' +
                    '</div>' +
                    '<div>' +
                    '    3*' +
                    '    <progress min="0" max="' + data['SoNguoiDanhGia'] + '" value="' + data['Sao']['3sao'] + '"></progress>' +
                    '    <span>' + data['Sao']['3sao'] + ' đánh giá</span>' +
                    '</div>' +
                    '<div>' +
                    '    2*' +
                    '    <progress min="0" max="' + data['SoNguoiDanhGia'] + '" value="' + data['Sao']['2sao'] + '"></progress>' +
                    '    <span>' + data['Sao']['2sao'] + ' đánh giá</span>' +
                    '</div>' +
                    '<div>' +
                    '    1*' +
                    '    <progress min="0" max="' + data['SoNguoiDanhGia'] + '" value="' + data['Sao']['1sao'] + '"></progress>' +
                    '    <span>' + data['Sao']['1sao'] + ' đánh giá</span>' +
                    '</div>';

                $('.xcv_dgsp_sao').html(html_xcv_dgsp_sao)
            }
        })
    }
    load_slideimg_indexkh()

    // script load bai viet
    function load_baiviet_xctkh() {
        var MaSP = $('.xemchitiet_masp').html().replace(/\s+/g, '')
        $.ajax({
            url: "./ajax_baivietadmin.php",
            method: "GET",
            data: {
                "action": "show_baiviet_xemct_kh",
                "MaSP": MaSP
            },
            success: function(datarp) {
                if (datarp != '') {
                    var data = JSON.parse(datarp)
                    $('.xct_sp_content').html(data)
                }
            }
        })
    }
    load_baiviet_xctkh()
        // script load top san pham ban chay
    function load_xemthem_xctkh() {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "GET",
            data: {
                "action": "show_SanPhamXemthem_xemct_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var html_xemthem = '';
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        html_xemthem += ' <div class="xct-ctsp-right_card">' +
                            '<a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '    <img src="./upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '    <div class="xct-ctsp-right_card_tengia">' +
                            '        <div>' + element['TenSP'] + '</div>' +
                            '        <div>' + element['GiaBan'] + ' đ</div>' +
                            '    </div>' +
                            '    </a>' +
                            '</div>';
                    })
                }
                $('.xct-ctsp-right_cards').html(html_xemthem)
            }
        })
    }
    load_xemthem_xctkh()

    //
    $('#add_quantity_product_cart').on('click', function() {
        var soluong = 1;
        soluong = (parseInt)($('#quantity_product_cart').val())
        var soluong_kho = $('#xct_sp_cosan').attr("soluong")
        if (soluong < soluong_kho) {
            $('#quantity_product_cart').val(soluong + 1)
        }
    })
    $('#reduce_quantity_product_cart').on('click', function() {
        var soluong = 1;
        soluong = (parseInt)($('#quantity_product_cart').val())
        if (soluong > 1) {
            $('#quantity_product_cart').val(soluong - 1)
        }

    })
    $('#quantity_product_cart').on('keyup', function() {
        var soluong_kho = $('#xct_sp_cosan').attr("soluong")
        var soluong = (parseInt)($('#quantity_product_cart').val())
        if (soluong < 1 || soluong > soluong_kho) {
            $('#quantity_product_cart').val(1)
        }
    })


})