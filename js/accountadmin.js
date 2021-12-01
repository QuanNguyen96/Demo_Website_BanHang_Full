$(document).ready(function() {
    // add thong bao
    var i = 0;

    function addthongbao($messages) {
        i++;
        setTimeout(() => {
            $('.danhmuc_thongbao').append('<button class="thongbao' + i + '">' + $messages + '</button>')
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(100%)',
                'visibility': 'hidden',
                'opacity': '0.5',
            })
        }, 0);
        setTimeout(() => {
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(0)',
                'visibility': 'visible',
                'opacity': '1'
            })

        }, 100);
        setTimeout(() => {
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(0)',
                'visibility': 'hidden',
                'opacity': '0.5'
            })

        }, 1500);
        setTimeout(() => {
            $('.danhmuc_thongbao button:nth-child(1)').remove()

        }, 4000);
    }








    //     $(document).on('click', '.sp_baiviets_hiden .fa-times', function() {
    //             $('.sp_baiviets').css('display', 'none')


    // })
    //load account
    function loadaccount() {
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                action: "show_acc"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadaccount();
    // // lấy sản phẩm
    // function data_sanpham(the) {
    //     $.ajax({
    //         url: "./ajax_sanphamadmin.php",
    //         method: "post",
    //         data: {
    //             action: "show_data_sanphm_bv",
    //         },
    //         success: function(datarp) {
    //             $(the).html(datarp)

    //         }
    //     })
    // }

    // function data_sanpham_full(the) {
    //     $.ajax({
    //         url: "./ajax_sanphamadmin.php",
    //         method: "post",
    //         data: {
    //             action: "show_data_hasp_ha",
    //         },
    //         success: function(datarp) {
    //             $(the).html(datarp)

    //         }
    //     })
    // }

    // function data_khachhang_full(the) {
    //     $.ajax({
    //         url: "./ajax_khachhangadmin.php",
    //         method: "post",
    //         data: {
    //             action: "show_data_hasp_ha",
    //         },
    //         success: function(datarp) {
    //             $(the).html(datarp)

    //         }
    //     })
    // }
    // thêm account
    var checkadd_acc = true;
    $('.ad_sps_right_add').on('click', function() {
        $('.sp_ad_thems').css('display', 'block')
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })
    $('#acc_ad_them_phanquyen').on('change', function() {
        var account_phanquyen_add_ip = $('.account_phanquyen_add input')
        if ($(this).val() == 1) {
            $.each(account_phanquyen_add_ip, function(index, element) {

                $(element).removeAttr("disabled")
            })
        } else {
            $.each(account_phanquyen_add_ip, function(index, element) {
                $(element).attr("disabled", "disabled")
                $(element).prop("checked", true);
            })
        }

    })
    $('.sp_ad_them_top_save').on("click", function() {
        if (valide_add_acc() == true) {


            if (confirm("bạn muốn thêm tài khoản này không ?")) {
                // du lieu bang account
                var taikhoan = $('#acc_ad_them_taikhoan').val()
                var matkhau = $('#acc_ad_them_matkhau').val()
                var ten = $('#acc_ad_them_ten').val()
                var ngaysinh = $('#acc_ad_them_ngaysinh').val()
                var email = $('#acc_ad_them_email').val()
                var diachi = $('#acc_ad_them_diachi').val()
                var sdt = $('#acc_ad_them_sdt').val()
                var img_account = ""
                var file_img_account = $('#ip_img_add_account')
                if (file_img_account[0].files.length > 0) {
                    img_account = file_img_account[0].files[0]['name']
                        // lưu hình ảnh khi tồn tại file hình ảnh
                    $(".formupload_img_account").submit()
                }
                $.ajax({
                        url: "./ajax_accountadmin.php",
                        method: "post",
                        data: {
                            'action': 'add_save_account',
                            'taikhoan': taikhoan,
                            'matkhau': matkhau,
                            'ten': ten,
                            'ngaysinh': ngaysinh,
                            'email': email,
                            'diachi': diachi,
                            'sdt': sdt,
                            'img_account': img_account
                        },
                        dataType: "json",
                        success: function(datarp) {
                            if (datarp['add_messages'] != 'successfull') {
                                checkadd_acc = false;
                            }

                        }
                    })
                    // du lieu bang phan quyen account
                var quyen_sp = 0
                if ($('#acc_ad_them_phanquyen_sanpham').is(":checked")) {
                    quyen_sp = 1;
                }
                var quyen_loaisanpham = 0
                if ($('#acc_ad_them_phanquyen_loaisanpham').is(":checked")) {
                    quyen_loaisanpham = 1;
                }
                var quyen_danhmuc = 0
                if ($('#acc_ad_them_phanquyen_danhmuc').is(":checked")) {
                    quyen_danhmuc = 1;
                }
                var quyen_danhgia = 0
                if ($('#acc_ad_them_phanquyen_danhgia').is(":checked")) {
                    quyen_danhgia = 1;
                }
                var quyen_baiviet = 0
                if ($('#acc_ad_them_phanquyen_baiviet').is(":checked")) {
                    quyen_baiviet = 1;
                }
                var quyen_khuyenmai = 0
                if ($('#acc_ad_them_phanquyen_khuyenmai').is(":checked")) {
                    quyen_khuyenmai = 1;
                }
                var quyen_thue = 0
                if ($('#acc_ad_them_phanquyen_thue').is(":checked")) {
                    quyen_thue = 1;
                }
                var quyen_giaohang = 0
                if ($('#acc_ad_them_phanquyen_giaohang').is(":checked")) {
                    quyen_giaohang = 1;
                }
                var quyen_nhacungcap = 0
                if ($('#acc_ad_them_phanquyen_nhacungcap').is(":checked")) {
                    quyen_nhacungcap = 1;
                }
                var quyen_img_sanpham = 0
                if ($('#acc_ad_them_phanquyen_img_sanpham').is(":checked")) {
                    quyen_img_sanpham = 1;
                }
                var quyen_khachhang = 0
                if ($('#acc_ad_them_phanquyen_khachhang').is(":checked")) {
                    quyen_khachhang = 1;
                }
                var quyen_hoadonnhap = 0
                if ($('#acc_ad_them_phanquyen_hoadonnhap').is(":checked")) {
                    quyen_hoadonnhap = 1;
                }
                var quyen_ct_hoadonnhap = 0
                if ($('#acc_ad_them_phanquyen_ct_hoadonnhap').is(":checked")) {
                    quyen_ct_hoadonnhap = 1;
                }
                var quyen_hoadonban = 0
                if ($('#acc_ad_them_phanquyen_hoadonban').is(":checked")) {
                    quyen_hoadonban = 1;
                }
                var quyen_ct_hoadonban = 0
                if ($('#acc_ad_them_phanquyen_ct_hoadonban').is(":checked")) {
                    quyen_ct_hoadonban = 1;
                }
                var quyen_taikhoanadmin = 0
                if ($('#acc_ad_them_phanquyen_taikhoanadmin').is(":checked")) {
                    quyen_taikhoanadmin = 1;
                }
                var quyen_nhanvien = 0
                if ($('#acc_ad_them_phanquyen_nhanvien').is(":checked")) {
                    quyen_nhanvien = 1;
                }
                var quyen_timkiem = 0
                if ($('#acc_ad_them_phanquyen_timkiem').is(":checked")) {
                    quyen_timkiem = 1;
                }
                $.ajax({
                    url: "./ajax_phanquyenadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save_account_phanquyen',
                        'quyen_sp': quyen_sp,
                        'quyen_loaisanpham': quyen_loaisanpham,
                        'quyen_danhmuc': quyen_danhmuc,
                        'quyen_danhgia': quyen_danhgia,
                        'quyen_baiviet': quyen_baiviet,
                        'quyen_khuyenmai': quyen_khuyenmai,
                        'quyen_thue': quyen_thue,
                        'quyen_giaohang': quyen_giaohang,
                        'quyen_nhacungcap': quyen_nhacungcap,
                        'quyen_img_sanpham': quyen_img_sanpham,
                        'quyen_khachhang': quyen_khachhang,
                        'quyen_hoadonnhap': quyen_hoadonnhap,
                        'quyen_ct_hoadonnhap': quyen_ct_hoadonnhap,
                        'quyen_hoadonban': quyen_hoadonban,
                        'quyen_ct_hoadonban': quyen_ct_hoadonban,
                        'quyen_taikhoanadmin': quyen_taikhoanadmin,
                        'quyen_nhanvien': quyen_nhanvien,
                        'quyen_timkiem': quyen_timkiem
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] != 'successfull') {
                            checkadd_acc = false;
                        }

                    }
                })
                if (checkadd_acc == true) {
                    var thongbao = "Thêm thành công tài khoản ";
                    addthongbao(thongbao)
                    loadaccount()
                }
            }
        }

    })
    $(document).on("submit", ".formupload_img_account", function(e) {
        e.preventDefault();
        var dulieu = new FormData(this)
        dulieu.append("action", "add_save_ha_account")
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] != 'successfull') {
                    checkadd_acc = false;
                }
            }
        })
    })

    function valide_add_acc() {
        var taikhoan = $('#acc_ad_them_taikhoan').val()
        var matkhau = $('#acc_ad_them_matkhau').val()
        var ten = $('#acc_ad_them_ten').val()
        if (taikhoan == "" || matkhau == "" || ten == "") {
            alert("Bạn cần nhập tối thiểu thông tin tài khoản, mật khẩu và tên")
            return false;
        }
        if (matkhau.length < 8) {
            alert("Mật khẩu cần tối thiểu 8 kí tự")
            return false;
        }
        return true;
    }

    // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                action: "delete",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "Delete thành công đánh giá  " + id;
                    addthongbao(thongbao)
                    loadaccount()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
        if (confirm("Bạn có chắc muốn xóa tài khoản")) {
            delete_sp($(this).data('malsp'))

        }
    })

    // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công  baiviet " + element;
                        addthongbao(thongbao)
                    })

                    loadaccount()
                }


            }
        })
    }
    $('.checkbox_dm_full input').on('change', function() {

        var array_checkbox_xoa = $('.checkbox_dm_xoa')
        if ($(this).is(":checked")) {
            array_checkbox_xoa.each(function(element) {
                $(this)[0].checked = true;
            });
        } else {
            array_checkbox_xoa.each(function(element) {
                $(this)[0].checked = false;
            });
        }

    })
    $('.ad_dms_right_ttc_option_xoavungchon').on('click', function() {
        if (confirm("Bạn có chắc muốn xóa những mục đã chọn")) {
            var array_checkbox_xoa = $('.checkbox_dm_xoa')
            var array_id = [];
            array_checkbox_xoa.each(function(element) {
                if ($(this).is(":checked")) {
                    array_id.push($(this).data('malspxoa'))
                }
            })
            delete_dm_chon(array_id)
        }
    })

    // phân quyền edit
    $(document).on('click', '.ad_dms_content_table_thaotac_phanquyen', function() {
        $('.acc_add_phanquyens').css('display', 'block')
        var maacc = $(this).data('maacc_pq')
        $('.dg_ad_edit_mapg').html(maacc)
        $.ajax({
            url: "./ajax_phanquyenadmin.php",
            method: "post",
            data: {
                action: "edit_quyen_show",
                maacc: maacc
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['pg_sanpham'] == 1) {
                    $("#acc_ad_edit_phanquyen_sanpham").prop("checked", true);
                }
                if (datarp['pg_loaisanpham'] == 1) {
                    $("#acc_ad_edit_phanquyen_loaisanpham").prop("checked", true);
                }
                if (datarp['pg_danhmuc'] == 1) {
                    $("#acc_ad_edit_phanquyen_danhmuc").prop("checked", true);
                }
                if (datarp['pg_danhgia'] == 1) {
                    $("#acc_ad_edit_phanquyen_danhgia").prop("checked", true);
                }
                if (datarp['pg_baiviet'] == 1) {
                    $("#acc_ad_edit_phanquyen_baiviet").prop("checked", true);
                }
                if (datarp['pg_khuyenmai'] == 1) {
                    $("#acc_ad_edit_phanquyen_khuyenmai").prop("checked", true);
                }
                if (datarp['pg_thue'] == 1) {
                    $("#acc_ad_edit_phanquyen_thue").prop("checked", true);
                }
                if (datarp['pg_giaohang'] == 1) {
                    $("#acc_ad_edit_phanquyen_giaohang").prop("checked", true);
                }
                if (datarp['pg_nhacungcap'] == 1) {
                    $("#acc_ad_edit_phanquyen_nhacungcap").prop("checked", true);
                }
                if (datarp['pg_sanpham'] == 1) {
                    $("#acc_ad_edit_phanquyen_img_sanpham").prop("checked", true);
                }
                if (datarp['pg_khachhang'] == 1) {
                    $("#acc_ad_edit_phanquyen_khachhang").prop("checked", true);
                }
                if (datarp['pg_hoadonnhap'] == 1) {
                    $("#acc_ad_edit_phanquyen_hoadonnhap").prop("checked", true);
                }
                if (datarp['pg_ct_hoadonnhap'] == 1) {
                    $("#acc_ad_edit_phanquyen_ct_hoadonnhap").prop("checked", true);
                }
                if (datarp['pg_hoadonban'] == 1) {
                    $("#acc_ad_edit_phanquyen_hoadonban").prop("checked", true);
                }
                if (datarp['pg_ct_hoadonban'] == 1) {
                    $("#acc_ad_edit_phanquyen_ct_hoadonban").prop("checked", true);
                }
                if (datarp['pg_taikhoanadmin'] == 1) {
                    $("#acc_ad_edit_phanquyen_taikhoanadmin").prop("checked", true);
                }
                if (datarp['pg_nhanvien'] == 1) {
                    $("#acc_ad_edit_phanquyen_nhanvien").prop("checked", true);
                }
                if (datarp['pg_timkiem'] == 1) {
                    $("#acc_ad_edit_phanquyen_timkiem").prop("checked", true);
                }

            }
        })

    })
    $(document).on('click', '.acc_add_phanquyen_hiden .fa-times', function() {
        $('.acc_add_phanquyens').css('display', 'none')

    })
    $(document).on("click", ".acc_add_phanquyen_top_save", function() {
        var maad = $(".dg_ad_edit_mapg").html()
        var quyen_sp = 0;
        if ($("#acc_ad_edit_phanquyen_sanpham").is(":checked")) {
            quyen_sp = 1;
        }
        var quyen_loaisanpham = 0;
        if ($("#acc_ad_edit_phanquyen_loaisanpham").is(":checked")) {
            quyen_loaisanpham = 1;
        }
        var quyen_danhmuc = 0;
        if ($("#acc_ad_edit_phanquyen_danhmuc").is(":checked")) {
            quyen_danhmuc = 1;
        }
        var quyen_danhgia = 0;
        if ($("#acc_ad_edit_phanquyen_danhgia").is(":checked")) {
            quyen_danhgia = 1;
        }
        var quyen_baiviet = 0;
        if ($("#acc_ad_edit_phanquyen_baiviet").is(":checked")) {
            quyen_baiviet = 1;
        }
        var quyen_khuyenmai = 0;
        if ($("#acc_ad_edit_phanquyen_khuyenmai").is(":checked")) {
            quyen_khuyenmai = 1;
        }
        var quyen_thue = 0;
        if ($("#acc_ad_edit_phanquyen_thue").is(":checked")) {
            quyen_thue = 1;
        }
        var quyen_giaohang = 0;
        if ($("#acc_ad_edit_phanquyen_giaohang").is(":checked")) {
            quyen_giaohang = 1;
        }
        var quyen_nhacungcap = 0;
        if ($("#acc_ad_edit_phanquyen_nhacungcap").is(":checked")) {
            quyen_nhacungcap = 1;
        }
        var quyen_img_sanpham = 0;
        if ($("#acc_ad_edit_phanquyen_img_sanpham").is(":checked")) {
            quyen_img_sanpham = 1;
        }
        var quyen_khachhang = 0;
        if ($("#acc_ad_edit_phanquyen_khachhang").is(":checked")) {
            quyen_khachhang = 1;
        }
        var quyen_hoadonnhap = 0;
        if ($("#acc_ad_edit_phanquyen_hoadonnhap").is(":checked")) {
            quyen_hoadonnhap = 1;
        }
        var quyen_ct_hoadonnhap = 0;
        if ($("#acc_ad_edit_phanquyen_ct_hoadonnhap").is(":checked")) {
            quyen_ct_hoadonnhap = 1;
        }
        var quyen_hoadonban = 0;
        if ($("#acc_ad_edit_phanquyen_hoadonban").is(":checked")) {
            quyen_hoadonban = 1;
        }
        var quyen_ct_hoadonban = 0;
        if ($("#acc_ad_edit_phanquyen_ct_hoadonban").is(":checked")) {
            quyen_ct_hoadonban = 1;
        }
        var quyen_taikhoanadmin = 0;
        if ($("#acc_ad_edit_phanquyen_taikhoanadmin").is(":checked")) {
            quyen_taikhoanadmin = 1;
        }
        var quyen_nhanvien = 0;
        if ($("#acc_ad_edit_phanquyen_nhanvien").is(":checked")) {
            quyen_nhanvien = 1;
        }
        var quyen_timkiem = 0;
        if ($("#acc_ad_edit_phanquyen_timkiem").is(":checked")) {
            quyen_timkiem = 1;
        }
        $.ajax({
            url: "./ajax_phanquyenadmin.php",
            method: "post",
            data: {
                'action': 'update_save_account_phanquyen',
                'maad': maad,
                'quyen_sp': quyen_sp,
                'quyen_loaisanpham': quyen_loaisanpham,
                'quyen_danhmuc': quyen_danhmuc,
                'quyen_danhgia': quyen_danhgia,
                'quyen_baiviet': quyen_baiviet,
                'quyen_khuyenmai': quyen_khuyenmai,
                'quyen_thue': quyen_thue,
                'quyen_giaohang': quyen_giaohang,
                'quyen_nhacungcap': quyen_nhacungcap,
                'quyen_img_sanpham': quyen_img_sanpham,
                'quyen_khachhang': quyen_khachhang,
                'quyen_hoadonnhap': quyen_hoadonnhap,
                'quyen_ct_hoadonnhap': quyen_ct_hoadonnhap,
                'quyen_hoadonban': quyen_hoadonban,
                'quyen_ct_hoadonban': quyen_ct_hoadonban,
                'quyen_taikhoanadmin': quyen_taikhoanadmin,
                'quyen_nhanvien': quyen_nhanvien,
                'quyen_timkiem': quyen_timkiem
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công "
                    addthongbao(thongbao)
                }

            }
        })
    })

    // edit danh muc
    var check_edit = true;
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        var maad = $(this).data('malsp_edit')
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                maad: maad
            },
            dataType: "json",
            success: function(datarp) {
                // alert(datarp['TKLogin'])
                $('.dg_ad_edit_maad').html(maad)
                $('#acc_ad_edits_taikhoan').val(datarp['TKLogin'])
                $('#acc_ad_edits_matkhau').val(datarp['MKLogin'])
                $('#acc_ad_edits_ten').val(datarp['TenAD'])
                var array_ngaysinh = datarp['NgaySinh'].split(" ")
                $('#acc_ad_edits_ngaysinh').val(array_ngaysinh[0])
                $('#acc_ad_edits_email').val(datarp['Email'])
                $('#acc_ad_edits_diachi').val(datarp['Address'])
                $('#acc_ad_edits_sdt').val(datarp['SDT'])
                $('.img_acc_show_edit').attr('src', "./upload/image/accountadmin/" + datarp['HinhAnh'])
            }
        })

    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })

    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        // du lieu bang account
        var maad = $('.dg_ad_edit_maad').html()
        var taikhoan = $('#acc_ad_edits_taikhoan').val()
        var matkhau = $('#acc_ad_edits_matkhau').val()
        var ten = $('#acc_ad_edits_ten').val()
        var ngaysinh = $('#acc_ad_edits_ngaysinh').val()
        var email = $('#acc_ad_edits_email').val()
        var diachi = $('#acc_ad_edits_diachi').val()
        var sdt = $('#acc_ad_edits_sdt').val()
        var hinhanh = $('.img_acc_show_edit').attr('src').split("/")
        var img_account = hinhanh[hinhanh.length - 1]
        var file_img_account = $('#ip_img_add_account_edits')
        if (file_img_account[0].files.length > 0) {
            img_account = file_img_account[0].files[0]['name']
                // lưu hình ảnh khi tồn tại file hình ảnh
            $(".formupload_img_account_edits").submit()
        }
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: {
                'action': 'edit_save_account',
                'maad': maad,
                'taikhoan': taikhoan,
                'matkhau': matkhau,
                'ten': ten,
                'ngaysinh': ngaysinh,
                'email': email,
                'diachi': diachi,
                'sdt': sdt,
                'img_account': img_account
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] != 'successfull') {
                    check_edit = false;
                }

            }
        })
        if (check_edit == true) {
            var thongbao = "update thành công "
            addthongbao(thongbao)
            loadaccount()
        }

    })
    $(document).on("submit", ".formupload_img_account_edits", function(e) {
        e.preventDefault();
        var dulieu = new FormData(this)
        dulieu.append("action", "edit_save_ha_account")
        $.ajax({
            url: "./ajax_accountadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] != 'successfull') {
                    check_edit = false;
                }
            }
        })
    })

    // doc file anh bang javascript
    $("#ip_img_add_account_edits").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img_acc_show_edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

})