$(document).ready(function() {

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

    // script load tim kiếm dữ liệu
    //lay param search tu url
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    function show_search_data(page) {

        var tranghientai = 1;
        if (page != null && page != '') {
            tranghientai = page
        }
        var text_search = getUrlParameter('search');
        $('#text_search_color').html(text_search)
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_search_data_pagesearch",
                "text_search": text_search,
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
                            '    <div class="search_card">' +
                            '    <div class="search_card_img">' +
                            '        <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '            <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '        </a>' +
                            '    </div>' +
                            '    <div class="search_card_content">' +
                            '        <div class="search_card_ten">' +
                            '            ' + element['TenSP'] + '' +
                            '        </div>' +
                            '        <div class="search_card_content_bao">' +
                            '            <div class="search_card_gia">';
                        if (+element['KhuyenMai'] != '0') {
                            data_html +=
                                '                <div class="search_card_real">' +
                                '                      ' + giaban_format + ' đ' +
                                '                </div>' +
                                '                <div class="search_card_show">' +
                                '                    ' + giashow_format + ' đ' +
                                '                </div>';
                        } else {
                            data_html +=
                                '                <div class="search_card_real">' +
                                '                </div>' +
                                '                <div class="search_card_show">' +
                                '                    ' + giaban_format + ' đ' +
                                '                </div>';
                        }
                        data_html +=
                            '            </div>' +
                            '            <div class="search_card_review">' +
                            '                <div class="search_card_danhgia">' +
                            '                    <span class="score"><span style="width: ' + element['PhanTramSao'] + '%"></span></span>' +
                            '                </div>' +
                            '                <div class="search_card_daban">' +
                            '                    Đã bán 1.5k' +
                            '                </div>' +
                            '            </div>' +
                            '            <div class="search_card_dathang">' +
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
                    $('.search_cards').html(data_html)
                    addtooltip_product()

                    // thay the url
                    if (tranghientai != 1) {
                        var url = "du%20an%20website%20ban%20hang/timkiem.php?search=" + text_search + "&page=" + tranghientai;
                        window.history.pushState('', 'New Page Title', '/' + url);
                    } else {
                        var url = "du%20an%20website%20ban%20hang/timkiem.php?search=" + text_search;
                        window.history.pushState('', 'New Page Title', '/' + url);
                    }
                } else {
                    $('.search_cards').html("Ko tìm thấy sản phẩm nào...")
                }
                $('.phantrangs').css('display', 'block')
                $('.phantranglocs').css('display', 'none')
            }
        })
    }
    show_search_data(getUrlParameter('page'))

    // phan trang tim kiem neu co
    function show_phantrang_searchsp_kh(page) {
        var tranghientai = 1;
        if (page != null && page != '') {
            tranghientai = page
        }
        var text_search = getUrlParameter('search');
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_phantrang_searchsp_kh",
                "text_search": text_search,
                "tranghientai": tranghientai

            },
            success: function(datarp) {
                $('.phantrang').html(datarp)
                $('#tongso_ketqua').html($('#ketquatimkieman').html() + " kết quả")

            }
        })
    }
    show_phantrang_searchsp_kh()

    // click load trang 
    $(document).on('click', '.phantrang .page', function() {
        var page = $(this).data('data_page')
        show_search_data(page);
        show_phantrang_searchsp_kh(page)
    })

    // show danh mục
    function show_danhmuc_searchsp_kh() {
        $.ajax({
            url: "./ajax_danhmucadmin.php",
            method: "post",
            data: {
                "action": "show_danhmuc_searchsp_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var html = '';
                $.each(data, function(index, element) {
                    html += '  <div class="row">' +
                        '    <input type="checkbox" id="search_madm" data-madm=' + element['MaDM'] + '>' +
                        '    <p>' + element['TenDM'] + '</p>' +
                        '</div>';
                })
                $('.danhmuc_bao').html(html)
            }
        })
    }
    show_danhmuc_searchsp_kh()
    $(document).on('click', '.searchs_left_content_danhmuc_them', function() {
            $.ajax({
                url: "./ajax_danhmucadmin.php",
                method: "post",
                data: {
                    "action": "show_adddanhmuc_searchsp_kh"
                },
                success: function(datarp) {
                    var data = JSON.parse(datarp)
                    console.log(data)
                    var html = '';
                    $.each(data, function(index, element) {
                        html += '  <div class="row">' +
                            '    <input type="checkbox" id="search_madm" data-madm=' + element['MaDM'] + '>' +
                            '    <p>' + element['TenDM'] + '</p>' +
                            '</div>';
                    })
                    $('.danhmuc_bao').append(html)
                    $('.searchs_left_content_danhmuc_them').css('display', "none")
                }
            })
        })
        // show mã khuyến mại
    function show_makm_searchsp_kh() {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                "action": "show_makm_searchsp_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                var html = '';
                $.each(data, function(index, element) {
                    html += '<div class="row">' +
                        '    <input type="checkbox" id="search_makm" data-makm=' + element['MaKM'] + '>' +
                        '    <p id="tenmakm">' + element['TenKM'] + '</p>' +
                        '    <p id="makm_giamgia" style="color:red">(-' + element['GiamGia'] + '%)</p>' +
                        '</div>';
                })
                $('.khuyenmaibao').html(html)
            }
        })
    }
    show_makm_searchsp_kh()
    $(document).on('click', '.searchs_left_content_khuyenmai_them', function() {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                "action": "show_addmakm_searchsp_kh"
            },
            success: function(datarp) {
                var data = JSON.parse(datarp)
                console.log(data)
                var html = '';
                $.each(data, function(index, element) {
                    html += '<div class="row">' +
                        '    <input type="checkbox" id="search_makm" data-makm=' + element['MaKM'] + '>' +
                        '    <p id="tenmakm">' + element['TenKM'] + '</p>' +
                        '    <p id="makm_giamgia" style="color:red">(-' + element['GiamGia'] + '%)</p>' +
                        '</div>';
                })
                $('.khuyenmaibao').append(html)
                $('.searchs_left_content_khuyenmai_them').css('display', "none")
            }
        })
    })
    var sqltimkiem = '';

    function loaddata_search_loc_searchspkh(sql, page) {
        var tranghientai = 1;
        if (page != null && page != '') {
            tranghientai = page
        }
        var text_search = getUrlParameter('search');
        $('#text_search_color').html(text_search)
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_select_search_data_pagesearch",
                "text_search": text_search,
                "text_select": sql,
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
                            '    <div class="search_card">' +
                            '    <div class="search_card_img">' +
                            '        <a href="./xemchitiet.php?MaSP=' + element['MaSP'] + '">' +
                            '            <img src="upload/image/hasp/' + element['HinhAnh'] + '" alt="">' +
                            '        </a>' +
                            '    </div>' +
                            '    <div class="search_card_content">' +
                            '        <div class="search_card_ten">' +
                            '            ' + element['TenSP'] + '' +
                            '        </div>' +
                            '        <div class="search_card_content_bao">' +
                            '            <div class="search_card_gia">';
                        if (+element['KhuyenMai'] != '0') {
                            data_html +=
                                '                <div class="search_card_real">' +
                                '                      ' + giaban_format + ' đ' +
                                '                </div>' +
                                '                <div class="search_card_show">' +
                                '                    ' + giashow_format + ' đ' +
                                '                </div>';
                        } else {
                            data_html +=
                                '                <div class="search_card_real">' +
                                '                </div>' +
                                '                <div class="search_card_show">' +
                                '                    ' + giaban_format + ' đ' +
                                '                </div>';
                        }
                        data_html +=
                            '            </div>' +
                            '            <div class="search_card_review">' +
                            '                <div class="search_card_danhgia">' +
                            '                    <span class="score"><span style="width: ' + element['PhanTramSao'] + '%"></span></span>' +
                            '                </div>' +
                            '                <div class="search_card_daban">' +
                            '                    Đã bán 1.5k' +
                            '                </div>' +
                            '            </div>' +
                            '            <div class="search_card_dathang">' +
                            '               <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>' +
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
                    $('.search_cards').html(data_html)
                    addtooltip_product()
                } else {
                    $('.search_cards').html("Ko tìm thấy sản phẩm nào...")
                }

                // gan lai trang cho loc tim kiem
                show_phantrang_select_searchsp_kh(page)
                $('.phantrangs').css('display', 'none')
                $('.phantranglocs').css('display', 'block')
            }
        })
    }
    // phan trang loc tim kiem neu co
    function show_phantrang_select_searchsp_kh(page) {
        var tranghientai = 1;
        if (page != null && page != '') {
            tranghientai = page
        }
        var text_search = getUrlParameter('search');
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "show_phantrang_select_searchsp_kh",
                "text_search": text_search,
                "tranghientai": tranghientai,
                "sqltimkiem": sqltimkiem
            },
            success: function(datarp) {
                $('.phantrangloc').html(datarp)
                $('#tongso_ketqua').html($('#ketquatimkieman_daloc').html() + " kết quả")

            }
        })
    }


    // click load trang 
    $(document).on('click', '.phantrangloc .page', function() {
        var page = $(this).data('data_page')
        loaddata_search_loc_searchspkh(sqltimkiem, page);
        show_phantrang_select_searchsp_kh(page)
    })
    var array_cboxdm = $('.danhmuc_bao input')
    $.each(array_cboxdm, function(index, element) {
        $(document).on('change', element, function() {
            var demcheckbox = 0;
            var input = $('.danhmuc_bao input')
            var array_dm_check = []
            $.each(input, function(index, element) {
                    if ($(element).is(":checked")) {
                        demcheckbox++;
                        array_dm_check.push($(element).data('madm'))
                    }
                })
                // var input = $('.khuyenmaibao input')
                // var array_km_check = []
                // $.each(input, function(index, elementkm) {
                //     if ($(elementkm).is(":checked")) {
                //         array_km_check.push($(elementkm).data('makm'))
                //     }
                // })
            var gia = $('#search_select_gia').val()
            var sqldm = '';
            if (array_dm_check.length > 0) {
                for (var i = 0; i < array_dm_check.length; i++) {
                    sqldm += 'd.MaDM = ' + array_dm_check[i] + ' or ';
                }
            }
            var sqlgia = ''
            if (gia != 0) {
                demcheckbox++;
                if (gia == 1) {
                    sqlgia += '( s.GiaBan < 100000 )'
                }
                if (gia == 2) {
                    sqlgia += '( s.GiaBan >= 100000 and s.GiaBan <= 500000 )'
                }
                if (gia == 3) {
                    sqlgia += '( s.GiaBan > 500000 and s.GiaBan <= 1000000 )'
                }
                if (gia == 4) {
                    sqlgia += '( s.GiaBan > 1000000 )'
                }
            }
            if (sqldm != '') {
                sqldmnew = sqldm.slice(0, sqldm.length - 4)
            }
            // if (sqlkm != '') {
            //     sqlkmnew = sqlkm.slice(0, sqlkm.length - 4)
            // }
            var sql = sqlgia
            if (sqlgia != '') {
                sql = ' and ' + sqlgia
            }
            if (sqldm != '') {
                sql += " and ( " + sqldmnew + " ) ";
            } else {
                if (sqlgia == '') {
                    sql = ''
                }
            }
            sqltimkiem = sql;
            // if (sqldm != '') {
            //     sql += " and ( " + sqldmnew + " ) "
            //         if (sqlkm != '') {
            //             sql += " and ( " + sqlkmnew + " ) "
            //         }
            // } else {
            //     if (sqlkm != '') {
            //         sql += " and ( " + sqlkmnew + " ) "
            //     }
            // }
            // 
            if (demcheckbox > 0) {
                loaddata_search_loc_searchspkh(sql, 1)
            } else {
                show_search_data(getUrlParameter('page'))
            }
        })
    })
})