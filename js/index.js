$(document).ready(function() {

    // script load danh muc
    function load_danhmuc_indexkh() {
        $.ajax({
            url: "./ajax_danhmucadmin.php",
            method: "post",
            data: {
                "action": "show_index_kh"
            },
            //datatype: "json",
            success: function(datarp) {
                var data = JSON.parse(datarp)
                const length_data = data.length / 2
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        if (index % length_data == 0) {
                            data_html += ' <div class="danhmucdong">'
                        }
                        data_html += ' <div class="danhmucdong_item">' +
                            '               <div class="danhmucdong_item-img">' +
                            '                    <img src="./upload/image/danhmuc/' + element['HADM'] + '" alt="">' +
                            '               </div>' +
                            '               <p>' + element['TenDM'] + '</p>' +
                            '          </div>';

                        if (index % length_data == length_data - 1) {
                            data_html += ' </div>'
                        }
                    })
                    $('.danhmuc .danhmucbao').html(data_html)
                }

            }
        })
    }
    load_danhmuc_indexkh()

    // script load sản phẩm chua co  tai khoan khach hang
    function load_sanpham_indexkh() {
        var tranghientai = 1;
        if ($('.phantrang_tranghientai').html() != "") {
            tranghientai = $('.phantrang_tranghientai').html();
        }
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_sp_noaccount_index_kh",
                "tranghientai": tranghientai
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        if (element['KhuyenMai'] != '0') {
                            var giashow = "" + Math.floor(element['GiaBan'] * (1 - element['KhuyenMai'] / 100))
                            var giashow_format = giashow.substr(0, giashow.length - 3).concat("000").replace(/\B(?=(\d{3})+(?!\d))/g, ',')

                        }
                        var giaban = "" + element['GiaBan'];
                        giaban_format = giaban.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        data_html +=
                            '    <div class="product_card">' +
                            '    <div class="product_card_img">' +
                            '        <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '            <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '        </a>' +
                            '    </div>' +
                            '    <div class="product_card_content">' +
                            '        <div class="product_card_ten">' +
                            '            ' + element['TenSP'] + '' +
                            '        </div>' +
                            '        <div class="product_card_content_bao">' +
                            '            <div class="product_card_gia">';
                        if (+element['KhuyenMai'] != '0') {
                            data_html +=
                                '                <div class="product_card_real">' +
                                '                      ' + giaban_format + ' đ' +
                                '                </div>' +
                                '                <div class="product_card_show">' +
                                '                    ' + giashow_format + ' đ' +
                                '                </div>';
                        } else {
                            data_html +=
                                '                <div class="product_card_real">' +
                                '                </div>' +
                                '                <div class="product_card_show">' +
                                '                    ' + giaban_format + ' đ' +
                                '                </div>';
                        }
                        data_html +=
                            '            </div>' +
                            '            <div class="product_card_review">' +
                            '                <div class="product_card_danhgia">' +
                            '                    <span class="score"><span style="width: ' + element['PhanTramSao'] + '%"></span></span>' +
                            '                </div>' +
                            '                <div class="product_card_daban">' +
                            '                    Đã bán 1.5k' +
                            '                </div>' +
                            '            </div>' +
                            '            <div class="product_card_dathang">' +
                            '               <i class="fas fa-cart-plus" data-soluong=' + element['SoLuong'] + ' data-masp=' + element['MaSP'] + ' style="color: rgb(36, 33, 224);"></i>' +
                            '               <i class="fas fa-heart" style="color: #ccc;"></i>' +
                            '                <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">xem chi tiết</a>' +
                            '            </div>' +
                            '        </div>' +
                            '    </div>';
                        if (element['Like'] != '0') {
                            data_html += '    <div class="product_card_like">yêu thích</div>';
                        }
                        if (element['KhuyenMai'] != '0') {
                            data_html += '<div class="product_card_sale">-' + element['KhuyenMai'] + '% giảm</div>';
                        }
                        data_html += '</div>';

                    })
                    $('.product_cards').html(data_html)
                    addtooltip_danhmuc()
                    addtooltip_product()
                    addtooltip_flashsale()
                    addtooltip_likeproduct()
                    addtooltip_addcart_product()

                    // thay the url
                    if (tranghientai != 1) {
                        var url = "du%20an%20website%20ban%20hang/index.php?page=" + tranghientai;
                        window.history.pushState('', 'New Page Title', '/' + url);
                    } else {
                        var url = "du%20an%20website%20ban%20hang/";
                        window.history.pushState('', 'New Page Title', '/' + url);
                    }

                }
            }
        })
    }
    load_sanpham_indexkh()

    // script load từ khóa tìm kiếm
    function load_search_indexkh() {
        $.ajax({
            url: "./ajax_timkiemadmin.php",
            method: "post",
            data: {
                "action": "show_search_index_kh"
            },
            //datatype: "json",
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        data_html +=
                            '<tr>' +
                            '    <td>' + (index + 1) + '</td>' +
                            '    <td><a href="./timkiem.php?search=' + element['ChuoiTK'] + '">' + element['ChuoiTK'] + '</a> </td>' +
                            '</tr>';

                    })
                    $('.data_search_idkh').html(data_html)
                }

            }
        })
    }
    load_search_indexkh()

    // script load shoppe mail
    function load_shopeemail_indexkh() {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                "action": "show_shopeemail_index_kh"
            },
            //datatype: "json",
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        data_html +=
                            '  <div class="shopeemail_noidung_card">' +
                            '<div class="shopeemail_card_img">' +
                            '    <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '       <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '    </a>' +
                            '</div>' +
                            '<div class="shopeemail_card_hang">' +
                            '    <img src="upload/image/shopee_mail/download.png" alt="">' +
                            '</div>' +
                            '<div class="shopeemail_card_uudai">' +
                            '    <p>ưu đãi đến ' + element['KhuyenMai'] + '%</p>' +
                            '</div>' +
                            '</div>';

                    })
                    $('.shopeemail_noidung_cards').html(data_html)
                }

            }
        })
    }
    load_shopeemail_indexkh()

    // script flash sale mail
    function load_flashsale_indexkh() {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                "action": "show_flash_sale_index_kh"
            },
            //datatype: "json",
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        var giashow = "" + Math.floor(element['GiaBan'] * (1 - element['KhuyenMai'] / 100))
                        var giashow_format = giashow.substr(0, giashow.length - 3).concat("000").replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        var giaban = "" + element['GiaBan'];
                        giaban_format = giaban.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        var width_processbar = Math.floor(element['DaBan'] / element['SoLuong'] * 100)
                        data_html +=
                            '<div class="flashsale-card">' +
                            '    <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '<div class="product_card_sale">-' + element['KhuyenMai'] + '% giảm</div>' +
                            '<div class="flashsale-card-img">' +
                            '   <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '</div>' +
                            '<div class="flashsale-content">' +
                            '   <p> ' + element['TenSP'] + '</p>' +
                            '   <div class="flashsale-content_bottom">' +
                            '       <div class="flashsale-cards__gia">' +
                            '           <p>' + giaban_format + ' đ</p>' +
                            '           <p>' + giashow_format + ' đ</p>' +
                            '       </div>' +
                            '       <div class="flashsale-cards__daban">' +
                            '           <div class="processs">' +
                            '               <div class="progress" style="width:' + width_processbar + '%"></div>';
                        if (element['DaBan'] != 0) {
                            data_html += '<p>đã bán ' + element['DaBan'] + '</p>';
                        } else {
                            data_html += '<p>sản phẩm mới</p>';
                        }
                        data_html +=
                            '           </div>' +
                            '       </div>' +
                            '   </div>' +
                            '</div>' +
                            '</a>' +
                            '</div>';

                    })
                    $('.flashsale-cards').html(data_html)
                }
                addtooltip_flashsale()
            }
        })
    }
    load_flashsale_indexkh()

    // script load sản phẩm tìm kiếm nhiều nhất
    function load_sanpham_search_indexkh() {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_spsearch_noaccount_index_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        data_html +=
                            '<div class="hotsearch-card">' +
                            '<div class="hotsearch-card_img">' +
                            '    <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '       <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '    </a>' +
                            '</div>' +
                            '<div class="hotsearch-card_name">' +
                            '    <p>' + element['TenSP'] + '</p>' +
                            '    <div class="hotsearch-card_danhgia">' +
                            '                    <span class="score"><span style="width: ' + element['PhanTramSao'] + '%"></span></span>' +
                            '    </div>' +
                            '    <progress min="0" max="100" value="' + element['DaBan'] + '"></progress>' +
                            '    <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">xem chi tiết</a>' +
                            '</div>' +
                            '</div>';

                    })
                    $('.hotsearch-cards').html(data_html)
                }

            }
        })
    }
    load_sanpham_search_indexkh()

    // script load phân trang
    function load_phantrangsp_indexkh() {
        var tranghientai = 1;
        if ($('.phantrang_tranghientai').html() != "") {
            tranghientai = $('.phantrang_tranghientai').html();
        }
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_phantrang_indexkh",
                "tranghientai": tranghientai

            },
            success: function(datarp) {
                $('.phantrang').html(datarp)
            }
        })
    }
    load_phantrangsp_indexkh()

    // click load trang 
    $(document).on('click', '.phantrang .page', function() {

        $('.phantrang_tranghientai').html($(this).data('data_page'))
        load_sanpham_indexkh();
        load_phantrangsp_indexkh()
    })


    // script tooltip
    // add tooltip danh muc
    function addtooltip_danhmuc() {
        var array_img_danhmuc = $('.danhmucbao img')
        array_img_danhmuc.each(function(index, element) {
            var html = $($(element).parent().parent().children()[1]).html();

            $(element).attr('toggle', "tooltip");
            $(element).attr('title', html);
        })
    }
    addtooltip_danhmuc()
        // add tooltip product
    function addtooltip_product() {
        var array_card = $('.product_card')
        array_card.each(function(index, element) {
            var html = $($($(element).children()[1]).children()[0]).html()
            $(element).attr('toggle', "tooltip");
            $(element).attr('title', $.trim(html));
        })
    }
    addtooltip_product()
        // add tooltip flashsale
    function addtooltip_flashsale() {
        var array_card = $('.flashsale-card-img')
        array_card.each(function(index, element) {
            var html = $($($(element).parent().children()[2]).children()[0]).html()
            $(element).attr('toggle', "tooltip");
            $(element).attr('title', $.trim(html));
        })
    }
    addtooltip_flashsale()
        // add tooltip like product
    function addtooltip_likeproduct() {
        var array_card = $('.fa-heart')
        array_card.each(function(index, element) {
            $(element).attr('toggle', "tooltip");
            $(element).attr('title', " chọn thích sản phẩm");
        })
    }
    addtooltip_likeproduct()
        // add tooltip like product
    function addtooltip_addcart_product() {
        var array_card = $('.fa-cart-plus')
        array_card.each(function(index, element) {
            $(element).attr('toggle', "tooltip");
            $(element).attr('title', "Thêm sản phẩm vào giỏ hàng");
        })
    }
    addtooltip_addcart_product()
    var danhmuc_ml = 0
    const count_array_imgdanhmuc = $($('.danhmucdong')[0]).children().length
    const hienthi_imgdanhmuc = 10;
    const width_imgdanhmuc = $($('.danhmucdong_item')[0]).css("width")
    var dodai = Number(width_imgdanhmuc.replace("px", ""))

    $('.danhmuc-action_next').on('click', () => {

        danhmuc_ml = danhmuc_ml - dodai
        if (danhmuc_ml < -(count_array_imgdanhmuc - hienthi_imgdanhmuc) * dodai) {
            danhmuc_ml = -(count_array_imgdanhmuc - hienthi_imgdanhmuc) * dodai
        } else {
            var array_danhmuc = $('.danhmucdong')
            array_danhmuc.each(function(index, element) {
                $(element).css('margin-left', danhmuc_ml + 'px')
            })

        }
        console.log(danhmuc_ml)
    })
    $('.danhmuc-action_prev').on('click', () => {

        danhmuc_ml = danhmuc_ml + dodai
        if (danhmuc_ml > 0) {
            danhmuc_ml = 0
        } else {
            var array_danhmuc = $('.danhmucdong')
            array_danhmuc.each(function(index, element) {
                $(element).css('margin-left', danhmuc_ml + 'px')
            })

        }
    })
    $('.product_cards_view_add button').on('click', () => {

        $('.product_cards_view_add button').css("display", "none")
            // var data = $('.product_cards').html();
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "xemthem_sp_noaccount_index_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var data_html = ''
                if (data.length > 0) {
                    $.each(data, function(index, element) {
                        if (element['KhuyenMai'] != '0') {
                            var giashow = "" + Math.floor(element['GiaBan'] * (1 - element['KhuyenMai'] / 100))
                            var giashow_format = giashow.substr(0, giashow.length - 3).concat("000").replace(/\B(?=(\d{3})+(?!\d))/g, ',')

                        }
                        var giaban = "" + element['GiaBan'];
                        giaban_format = giaban.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        data_html +=
                            '    <div class="product_card">' +
                            '    <div class="product_card_img">' +
                            '        <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '            <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '        </a>' +
                            '    </div>' +
                            '    <div class="product_card_content">' +
                            '        <div class="product_card_ten">' +
                            '            ' + element['TenSP'] + '' +
                            '        </div>' +
                            '        <div class="product_card_content_bao">' +
                            '            <div class="product_card_gia">';
                        if (+element['KhuyenMai'] != '0') {
                            data_html +=
                                '                <div class="product_card_real">' +
                                '                      ' + giaban_format + ' đ' +
                                '                </div>' +
                                '                <div class="product_card_show">' +
                                '                    ' + giashow_format + ' đ' +
                                '                </div>';
                        } else {
                            data_html +=
                                '                <div class="product_card_real">' +
                                '                </div>' +
                                '                <div class="product_card_show">' +
                                '                    ' + giaban_format + ' đ' +
                                '                </div>';
                        }
                        data_html +=
                            '            </div>' +
                            '            <div class="product_card_review">' +
                            '                <div class="product_card_danhgia">' +
                            '                    <span class="score"><span style="width: ' + element['PhanTramSao'] + '%"></span></span>' +
                            '                </div>' +
                            '                <div class="product_card_daban">' +
                            '                    Đã bán 1.5k' +
                            '                </div>' +
                            '            </div>' +
                            '            <div class="product_card_dathang">' +
                            '               <i class="fas fa-cart-plus" data-soluong=' + element['SoLuong'] + '   data-masp=' + element['MaSP'] + ' style="color: rgb(36, 33, 224);"></i>' +
                            '               <i class="fas fa-heart" style="color: #ccc;"></i>' +
                            '                <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">xem chi tiết</a>' +
                            '            </div>' +
                            '        </div>' +
                            '    </div>';
                        if (element['Like'] != '0') {
                            data_html += '    <div class="product_card_like">yêu thích</div>';
                        }
                        if (element['KhuyenMai'] != '0') {
                            data_html += '<div class="product_card_sale">-' + element['KhuyenMai'] + '% giảm</div>';
                        }
                        data_html += '</div>';

                    })
                    $('.product_cards').append(data_html)
                    addtooltip_product()

                }
            }
        })

    })





})